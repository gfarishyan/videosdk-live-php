<?php

namespace Gfarishyan\VideosdkLivePhp;

use Gfarishyan\VideosdkLivePhp\DataTypes\WebhookInterface;

class Webhook implements WebhookInterface {

  protected string $webhookType;

  protected array $data;

  public function __construct(string $type, array $data = []) {
    $this->webhookType = $type;
    $this->data = $data;
  }

  public function getType() : string {
    return $this->webhookType;
  }

  public function getData() :array {
    return $this->data;
  }

  public function setData(array $data) :Webhook {
    $this->data = $data;
    return $this;
  }

  public function setType(string $type) :Webhook {
    $this->webhookType = $type;
    return $this;
  }

  public function validate() : bool {
    return false;
  }

  public static function isVerified($body) :bool {
    $all_headers = [];
    foreach ($_SERVER as $name => $value) {
      $all_headers[mb_strtolower($name)] = $value;
    }

    if (empty($all_headers['videosdk-signature'])) {
      return false;
    }

    $public_key = 'https://api.videosdk.live/v2/public/rsa-public-key';
    return openssl_verify($body, $all_headers['videosdk-signature'], $public_key, 'RSA-SHA256');
  }
}
