<?php

namespace App\Http\Livewire\Invoice;

use App\Models\InvoiceDetail;
use App\Models\Invoices;
use Livewire\Component;
use Livewire\Request;

class Invoice extends Component
{
    public $item  =[]   ;
    public $invoice ;
    protected $rules = [
        // 'item.itemName'=> 'required',
        // 'item.price'=> 'required',
        // 'item.qy'=> 'required',
        // 'item.sub_total'=> 'required',
        'invoice.Company_id'=> 'required',
        'invoice.total'=> 'required',
        'invoice.Data'=> 'required',
        'invoice.invoice_no'=> 'required',
        'invoice.discount'=> 'nullable',
        'invoice.tax'=> 'nullable',
        'invoice.ship'=> 'nullable',
        'invoice.total_due'=> 'nullable',
    ];



    public function newItem()
    {
        $this->item []= ['itemName'=>'Amir', 'price'=>0, 'qy'=>1, 'sub_total'=>0];
    }
    public function remove($index)
    {
        unset($this->item[$index]);
        array_values($this->item);
    }

    public function updated($key){

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

        $this->item= [
            ['itemName'=>'Amir', 'price'=>0, 'qy'=>1, 'sub_total'=>0]
        ];

        if(!$this->invoice){
        $this->invoice = new Invoices();
       }

    }


    public function save(Request $request)
    {


        $validate=$this->validate();
        $this->invoice->save();


        foreach($this->item as $items){
            $this->Invoice->attach($items['Invoice_id']);
            InvoiceDetail::create([
                'Invoice_id' => $this->invoice['id'],
                'Item' => $this->item['itemName'],
                'price' => $this->item['price'],
                'quantity' => $this->item['qy'],
                'row_Subtotal' => $this->item['sub_total'],
                ]);
        }
        return redirect('invoice')->with('success','Invoice Updated successfully!');

        // foreach ($request->$this->item  as $key => $value) {

        //     $InvoiceDetail = new InvoiceDetail();
        //     $InvoiceDetail->price = $request->$this->item->name[$key];
        //     $InvoiceDetail->price = $request->$this->item->price[$key];
        //     $InvoiceDetail->quantity = $request->$this->item->qy[$key];

        //     $InvoiceDetail->row_Subtotal = $request->$this->item->sub_total[$key];




        //     $InvoiceDetail->save();

    // }

    }
    public function render()
    {
        return view('livewire.invoice.invoice');
    }
}
