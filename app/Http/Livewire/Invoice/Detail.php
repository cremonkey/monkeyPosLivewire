<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;

class Detail extends Component
{

    public $item  =[] ;
    public $newItem ;
    protected $rules = [
        'item.name'=> 'required',
        'item.price'=> 'required',
        'item.qy'=> 'required',
        'item.sub_total'=> 'required',

    ];

    public function newItem()
    {
        $this->item []= count($this->item)+1;
    }
    public function remove($index)
    {
        unset($this->item[$index]);
        array_values($this->item);
    }

    public function render()
    {
        return view('livewire.invoice.detail');
    }
}
