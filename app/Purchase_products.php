<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_products extends Model
{
     protected $table = 'purchase_products' ;
    protected $fillable = ['invoice_id','description','material_id','hsn','size','total_sqrft_copies','qty','price','cgst','sgst','netvalue'];
}
