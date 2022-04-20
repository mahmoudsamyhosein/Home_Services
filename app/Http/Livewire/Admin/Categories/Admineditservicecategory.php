<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class Admineditservicecategory extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $newimage;

    public function mount($category_id){
        $scategory = ServiceCategory::find($category_id);
        $this->category_id = $scategory->id;
        $this->name = $scategory->name;
        $this->slug = $scategory->slug;
        $this->image = $scategory->image;
    }

    public function updated($fileds){
        $this->validateOnly($fileds,[
            'name' => 'required',
            'slug' => 'required',
        ]);
        if($this->newimage){
            $this->validateOnly($fileds,[
                'newimage' => 'required|mimes:jepg,png'
            ]);
        }
    }

    public function gernerateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function updateServiceCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',   
        ]);
        if($this->newimage){
            $this->validate([
                'newimage' => 'required|mimes:jepg,png'
            ]);
        }
        $scategory = ServiceCategory::find($this->category_id);
        $scategory->name = $this->name; 
        $scategory->slug = $this->slug;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->StoreAs('categories',$imageName);
            $scategory->image =  $imageName;
        }
        $scategory->save();
        session()->flash('message','Category Has Been Updated Successfully !'); 

    }
    public function render()
    {
        return view('livewire.admin.categories.admineditservicecategory')->layout('layouts.base');
    }
}
