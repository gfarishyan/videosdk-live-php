<?php

namespace Gfarishyan\VideosdkLivePhp\DataTypes;

class WebhookConfig extends BaseData {

  protected string $endPoint;

  protected array $events;

  protected $mapping = [
    'endPoint' => 'endPoint',
    'events' => 'events',
  ];

  public function setEndPoint(string $endPoint) :WebhookConfig
  {
    $this->endPoint = $endPoint;
    return $this;
  }

  public function setEvents(array $events) :WebhookConfig {
    $this->events = $events;
    return $this;
  }

  public function getEvents() :array {
    return $this->events;
  }

  public function toRequest(): \stdClass
  {
    return (object) [
      'endPoint' => $this->endPoint,
      'events' => $this->events,
    ];
  }

}
