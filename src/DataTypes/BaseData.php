<?php

namespace Gfarishyan\VideosdkLivePhp\DataTypes;

class BaseData {
  protected mixed $name;
  protected mixed $value;

  protected $mapping;

  public function __construct(array $params = [])
  {
    if (isset($this->mapping)) {
      foreach ($this->mapping as $local => $remote) {
        if (isset($params[$remote])) {
          $this->$local = $params[$remote];
        }
      }

      foreach (array_keys($this->mapping) as $local) {
        if (isset($params[$local])) {
          $this->$local = $params[$local];
        }
      }
    }
  }

  public function toArray(): array {
    $return = [];
    foreach ($this->mapping as $key => $value) {
      if (isset($this->$key)) {
        $return[$value] = $this->$key;
      }
    }
    return $return;
  }

  public function toRequest() :mixed {
    $data = [];
    foreach ($this->mapping as $key => $value) {
      if (isset($this->$key)) {
        if ($this->$key instanceof BaseData) {
          $data[$value] = $this->$key->toRequest();
        } else {
          $data[$value] = $this->$key;
        }
      }
    }

    return $data;
  }

}
