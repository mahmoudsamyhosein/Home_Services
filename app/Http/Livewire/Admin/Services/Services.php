<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
class Services extends Component
{
    use WithPagination;
    
    public function deleteService($service_id)
    {
        $service = Service::find($service_id);
        if($service->thumnail)
        {
            unlink('images/services/thubnails'. '/' . $service->thumbnail);
        }
        if($service->image)
        {
            unlink('images/services'. '/' . $service->image);
        }
        $service->delete();
        session()->flash('message','Service has been deleted successfully!');
    }

    public function render()
    {
        $services = Service::paginate(10);
        return view('livewire.admin.services.services',[ 'services' => $services ])->layout('layouts.base');
    }
}
