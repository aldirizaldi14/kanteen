<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TotalDagingListener implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $jaging;

  public function __construct($jaging)
  {
      $this->jaging = $jaging;
  }

  public function broadcastOn()
  {
      return ['my-channel'];
  }

  public function broadcastAs()
  {
      return 'jaging';
  }
}
