<?php

namespace Gfarishyan\VideosdkLivePhp\DataTypes;

class Room extends BaseData
{

  const ALLOW_JOIN = 'allow_join';
  const ASK_JOIN = 'ask_join';
  CONST ALLOW_MOD = 'allow_mod';

  protected string $roomId;
  protected string $customRoomId;

  protected string $disabled;

  protected \DateTime $createdAt;

  protected \DateTime $updatedAt;

  protected mixed $user;

  protected $id;

  protected $links;

  protected $roles;

  protected $permissions;

  protected $webhook;

  protected $closeConfig;

  protected $startConfig;

  protected $mapping = [
    'roomId' => 'roomId',
    'customRoomId' => 'customRoomId',
    'links' => 'links',
    'roles' => 'roles',
    'user' => 'user',
    'id' => 'id',
    'updatedAt' => 'updatedAt',
    'createdAt' => 'createdAt',
    'disabled' => 'disabled',
    'webhook' => 'webhook',
    'closeConfig' => 'autoCloseConfig',
    'startConfig' => 'autoStartConfig',
  ];

  public function getRoomId(): string
  {
    return $this->roomId;
  }

  public function setRoomId(string $roomId): Room
  {
    $this->roomId = $roomId;
    return $this;
  }

  public function getCustomRoomId(): string
  {
    return $this->customRoomId;
  }

  public function setCustomRoomId(string $customRoomId): Room
  {
    $this->customRoomId = $customRoomId;
    return $this;
  }

  public function isDisabled(): bool
  {
    return $this->disabled;
  }

  public function setDisabled(bool $disabled): Room
  {
    $this->disabled = $disabled;
    return $this;
  }

  public function setPermissions(array $permissions)
  {
    $this->permissions = $permissions;
    return $this;
  }

  public function getPermissions(): array {
    return $this->permissions;
  }

  public function addPermission(string $permission)
  {
    $this->permissions[$permission] = $permission;
    return $this;
  }

  public function removePermission(string $permission) {
    unset($this->permissions[$permission]);
    return $this;
  }

  public function isEnabled(): bool
  {
    return !$this->isDisabled();
  }

  public function getUser(): User
  {
    return $this->user;
  }

  public function setUser(User $user): Room
  {
    $this->user = $user;
    return $this;
  }

  public function getId(): string
  {
    return $this->id;
  }

  public function setId(string $id): Room
  {
    $this->id = $id;
    return $this;
  }

  public function getLinks(): array
  {
    return $this->links;
  }

  public static function fromResponse($response)
  {
      //let's convert cratedAt and updatedAt to php date strings
     $response['createdAt'] = new \DateTime('Y-m-d\TH:i:s\Z', $response['createdAt']);
     $response['updatedAt'] = new \DateTime('Y-m-d\TH:i:s\Z', $response['updatedAt']);
     $response['autoCloseConfig'] = AutocloseConfig::fromResponse($response);
     //$response['autoCloseConfig'] = AutocloseConfig::fromResponse($response);
     return new static($response);
  }
}
