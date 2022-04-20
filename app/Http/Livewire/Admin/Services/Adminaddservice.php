<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class Adminaddservice extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $price;
    public $discount;
    public $discount_type;
    public $description;
    public $inclusion;
    public $exclusion;
    public $image;
    public $thumbnail;

    public function generateslug(){
         $this->slug = Str::slug($this->name ,'-');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'thumbnail' => 'required|mimes:jpeg,png',
        ]);
    }
    public function createservice(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'thumbnail' => 'required|mimes:jpeg,png',
        ]);
        $service = new Service();
        $service->name = $this->name;
        $service->slug = $this->slug; 
        $service->tagline = $this->tagline; 
        $service->price = $this->price; 
        $service->discount = $this->discount; 
        $service->discount_type = $this->discount_type; 
        $service->service_category_id = $this->service_category_id; 
        $service->description = $this->description; 
        $service->inclusion = str_replace("\n" ,"|" ,trim($this->inclusion)); 
        $service->exclusion = str_replace("\n" ,"|" ,trim($this->exclusion));

        $ImageName = Carbon::now()->timestamp. '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('services/thumbnails',$ImageName);
        $service->thumbnail = $ImageName;

        $ImageName2 = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('services',$ImageName2);
        $service->image = $ImageName2;

        $service->save();
        session()->flash('message' ,'Service Has Been Created Successfully !'); 
    }
    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.services.adminaddservice' ,[ 'categories' => $categories ])->layout('layouts.base');
    }
}
