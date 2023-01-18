<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;


class Invoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'Company_name', 'Data', 'invoice_no', 'total', 'discount', 'tax', 'ship', 'total_due', 'statue'


       ];

       public function Company()
       {
        return $this->belongsTo(Company::class, 'Company_id');

       }
}








