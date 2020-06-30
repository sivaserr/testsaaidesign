<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    protected $fillable = ['customer_name','phone_no','address','company_name','gst_no','state','code'];
}
