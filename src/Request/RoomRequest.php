<?php

namespace Gfarishyan\VideosdkLivePhp\Request;

use Gfarishyan\VideosdkLivePhp\DataTypes\BaseData;
use Gfarishyan\VideosdkLivePhp\DataTypes\Room;

class RoomRequest extends BaseRequest {

  protected string $room_id;

  protected array $webhook;

  public function create(BaseData $data) :Room  {
    $path = 'rooms';
    $method = 'POST';
    $response = $this->execute($path, $data->toRequest(), $method);
    return Room::fromResponse($response);
  }

  public function validate($room_id) {

  }

  public function fetch($room_id=null) {
    $path = 'rooms';
    $method = 'GET';

    if (!is_null($room_id)) {
      $path .= '/' . $room_id;
    }

    return $this->execute($path, [], $method);
  }

  public function deactivate($room_id=null) {

  }


}
