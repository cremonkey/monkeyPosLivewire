<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;

class Form extends Component
{
    public $company ;
    protected $rules = [
        'company.name'=> 'required|min:4',
        'company.address'=> 'nullable|min:4',
        'company.phone'=> 'nullable|numeric',
        'company.tax'=> 'nullable|numeric'
    ];

    public function mount(){
       if(!$this->company){
        $this->company = new Company;
       }
    }

    public function save()
    {

        $validate=$this->validate();

        $this->company->save();
        return redirect('company')->with('success','Company Updated successfully!');

    }


    public function render()
    {

        return view('livewire.company.form');
    }
}
