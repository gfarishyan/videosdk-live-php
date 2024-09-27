<?php

class AutocloseConfig extends BaseData
{

  public const SESSION_ENDS = 'session-ends';
  public const SESSION_END_DEACTIVATE = 'session-end-and-deactivate';

  protected string $type;
  protected int $duration;

   protected $mapping = [
     'type' => 'type',
     'duration' => 'duration',
   ];

   public function setType(string $type): AutocloseConfig {
     $this->type = $type;
     return $this;
   }

   public function setDuration(int $duration): AutocloseConfig {
     $this->duration = $duration;
     return $this;
   }

   public function getType(): string {
     return $this->type;
   }

   public function getDuration(): int {
      return $this->duration;
   }

   public function toRequest(): \stdClass {
     return (object) [
       'type' => $this->type,
       'duration' => $this->duration,
     ];
   }

}
