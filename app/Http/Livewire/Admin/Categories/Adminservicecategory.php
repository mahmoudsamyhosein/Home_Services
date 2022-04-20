<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\ServiceCategory;
use Livewire\Component;
class Adminservicecategory extends Component
{
    public function deleteservicecategory($id){
        $scategory = ServiceCategory::find($id);
        if($scategory->image){
            unlink('images/categories' . '/' . $scategory->image);
        }
        $scategory->delete();
        session()->flash('message','Service Category Has Been Deleted !');
    }
    
    public function render()
    {
        $scategories = ServiceCategory::paginate(12);
        return view('livewire.admin.categories.adminservicecategory',[ 'scategories' => $scategories ])->layout('layouts.base');
    }
}