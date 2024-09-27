<?php

namespace Gfarishyan\VideosdkLivePhp;

class Config {

  protected string $apiKey;

  protected string $apiSecret;

  protected string $version;

  public function __construct(string $api_key, string $api_secret, $version=2) {
    $this->apiKey = $api_key;
    $this->apiSecret = $api_secret;
    $this->version = $version;
  }

  public function getVersion() : string {
    return $this->version;
  }

  public function getApiKey() : string {
    return $this->apiKey;
  }

  public function getApiSecret() : string {
    return $this->apiSecret;
  }


}
