<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoices;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
     'name', 'address', 'phone', 'tax'


    ];
    public function invoice()
       {
        return $this->hasMany(Invoices::class, 'Company_id');

       }

}
