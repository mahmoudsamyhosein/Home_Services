<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;

class Servicesbycategory extends Component
{
    public $category_slug;
    public function mount($category_slug){
        $this->category_slug = $category_slug;
    }
    public function render()
    {
        $scategory = ServiceCategory::where('slug',$this->category_slug)->first();
        return view('livewire.servicesbycategory',['scategory' => $scategory ])->layout('layouts.base');
    }
}
