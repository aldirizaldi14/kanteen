<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class IkanListener implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $image;
    public $nama;
    public $nik;
    public $departement;
    public $status;

  public function __construct($image, $nama, $nik, $departement, $status)
  {
      $this->image = $image;
      $this->nama = $nama;
      $this->nik = $nik;
      $this->departement = $departement;
      $this->status = $status;
  }

  public function broadcastOn()
  {
      return ['my-channel'];
  }

  public function broadcastAs()
  {
      return 'ikan';
  }
}
