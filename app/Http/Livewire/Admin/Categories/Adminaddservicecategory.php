<?php

namespace App\Http\Livewire\Admin\Categories;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class Adminaddservicecategory extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    
    public function generatslug(){
        $this->slug = Str::slug($this->name , '-');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,png',
        ]);
    }
    
    public function createnewcategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,png',
        ]);
        $scategory = new ServiceCategory();
        $scategory->name = $this->name;
        $scategory->slug = $this->slug;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('categories',$imageName);
        $scategory->image = $imageName;
        $scategory->save();
        session()->flash('message','Category Has Been Saved Successfully !');
    }
    public function render()
    {
        return view('livewire.admin.categories.adminaddservicecategory')->layout('layouts.base');
    }
}
