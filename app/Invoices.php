<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = 'invoices';

    protected $fillable = ['invoice_no','date','customer_id','sub_total','tax','tax_amount','total_amount'];
}
