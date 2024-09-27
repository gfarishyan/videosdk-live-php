<?php

namespace Gfarishyan\VideosdkLivePhp\Request;


use Gfarishyan\VideosdkLivePhp\Config;
use Gfarishyan\VideosdkLivePhp\DataTypes\BaseData;
use GuzzleHttp\Client;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GuzzleHttp\Exception\RequestException;

class BaseRequest {

  protected Client $httpClient;

  protected Config $config;

  protected $path;

  protected $baseUrl = 'https://api.videosdk.live';

  protected $token;

  public function __construct(Config $config, Client $httpClient) {
    $this->httpClient = $httpClient;
    $this->config = $config;
  }

  public function addData(BaseData $data) {

  }

  public function getToken()
  {
    $issuedAt = new \DateTimeImmutable();
    $expire = $issuedAt->modify('+2 hours')->getTimestamp();
    if (!isset($this->token)) {
      $payload = [
        'apikey' => $this->config->getApiKey(),
        //'version' => $this->config->getVersion(),
        'iat' => $issuedAt->getTimestamp(),
        'exp' => $expire,
        'permissions' => ['allow_join'],
        'roles' => ['crawler', 'rtc']
      ];
      $this->token = JWT::encode($payload, $this->config->getApiSecret(), 'HS256');
    }

    return $this->token;
  }

  public function execute(string $path, mixed $body, string $method='POST') {
    $base_url = sprintf('%s/v%s/%s', $this->baseUrl , $this->config->getVersion() , $path);

    $token = $this->getToken();

     $headers = [
       'Authorization' => $token,
       'Content-Type' => 'application/json',
     ];

    $options = [
      'headers' => $headers,
      'debug' => true
    ];

    if (!empty($body)) {
      $options['json'] = $body;
    }

     try {
      $response = $this->httpClient->request(strtoupper($method), $base_url, $options);
     } catch (RequestException $e) {
       throw new RequestException($e->getMessage(), $e->getCode(), $e);
     }

    $content = $response->getBody()->getContents();

    if ($content) {
      return json_decode($content, true);
    }
    return [];
  }
}
