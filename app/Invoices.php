<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = 'invoices';

    protected $fillable = ['invoice_no','date','supplier_id','sub_total','total_cgst','total_sgst','total_tax','tax_amount','grand_total'];
}
