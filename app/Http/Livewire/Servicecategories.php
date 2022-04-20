<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;

class Servicecategories extends Component
{
    public function render()
    {
        $service_categories = ServiceCategory::all();
        return view('livewire.servicecategories',['service_categories' => $service_categories ])->layout('layouts.base');
    }
}
