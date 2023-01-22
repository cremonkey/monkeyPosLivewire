<?php

namespace App\Http\Livewire\Invoice;

use App\Models\InvoiceDetail;
use App\Models\Invoices;
use Livewire\Component;
use Livewire\Request;

class Invoice extends Component
{
    public $invoice ;
    public $name, $price, $qy, $sub_total;
    public $updateMode = false;
    public $items = [];
    public $i = 1;


    protected $rules = [
        // 'items.itemName'=> 'required',
        // 'items.price'=> 'required',
        // 'items.qy'=> 'required',
        // 'items.sub_total'=> 'required',
        'invoice.Company_id'=> 'required',
        'invoice.total'=> 'required',
        'invoice.Data'=> 'required',
        'invoice.invoice_no'=> 'required',
        'invoice.discount'=> 'nullable',
        'invoice.tax'=> 'nullable',
        'invoice.ship'=> 'nullable',
        'invoice.total_due'=> 'nullable',
    ];



    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->items ,$i);
    }
    public function remove($i)
    {
        unset($this->items[$i]);
        array_values($this->items);
    }

    // public function updatedItems($key, $value)
    // {

    //         $this->sub_total = $this->price * $this->qy;

    // }

    public function updated($key){

            # code...
dd($this->items);
            // $price = $itemp['price'];
            // $qy = $itemp['qy'];


        $this->invoice->Data = date('D d/m/20y');
        $no= Invoices::pluck('id')->last();
        $this->invoice->invoice_no = "000".$no+1;


        if(in_array($key, ['invoice.tax','invoice.ship','invoice.total','invoice.discount'])){
            $discount = ($this->invoice->total * ($this->invoice->discount/100) );
            $afterDiscount = ($this->invoice->total - $discount );
            $AfterTax = ($afterDiscount * ($this->invoice->tax/100) );
            $this->invoice->total_due=($afterDiscount) + $AfterTax + $this->invoice->ship;

        }

    }

    public function mount(){




        if(!$this->invoice){
        $this->invoice = new Invoices();
       }

    }


    public function save(Request $request)
    {


        $validate=$this->validate();
        $this->invoice->save();


        // foreach($this->items as $items){
        //     $this->Invoice->attach($items['Invoice_id']);
        //     InvoiceDetail::create([
        //         'Invoice_id' => $this->invoice['id'],
        //         'items' => $this->items['itemName'],
        //         'price' => $this->items['price'],
        //         'quantity' => $this->items['qy'],
        //         'row_Subtotal' => $this->items['sub_total'],
        //         ]);
        // }
        return redirect('invoice')->with('success','Invoice Updated successfully!');

        // foreach ($request->$this->items  as $key => $value) {

        //     $InvoiceDetail = new InvoiceDetail();
        //     $InvoiceDetail->price = $request->$this->items->name[$key];
        //     $InvoiceDetail->price = $request->$this->items->price[$key];
        //     $InvoiceDetail->quantity = $request->$this->items->qy[$key];

        //     $InvoiceDetail->row_Subtotal = $request->$this->items->sub_total[$key];




        //     $InvoiceDetail->save();

    // }

    }
    public function render()
    {
        return view('livewire.invoice.invoice');
    }
}
