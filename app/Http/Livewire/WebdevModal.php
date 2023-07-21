<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class WebdevModal extends Component
{
    public $webdevServ = false;
    public $moreInfo;

    public function servicesInfo($id)
    {
        $this->webdevServ = true;

        $service = Service::find($id);

        $this->moreInfo = $service;


    }

    public function render()
    {
        $services = Service::all();
        return view('livewire.webdev-modal', [
            'services' => $services,
        ]);
    }
}
