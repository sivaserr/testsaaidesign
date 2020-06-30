<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_products extends Model
{
    protected $table = 'invoice_products' ;
    protected $fillable = ['invoice_id','description','material_id','sqrft_copies','total_sqrft_copies','qty','price','netvalue'];
}
