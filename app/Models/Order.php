<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function Customer ()
    {
        return  $this->belongsTo(Customer::class,'cus_id');
    }
    public function Shipping ()
    {
        return  $this->belongsTo(Shipping::class,'shipping_id');
    }
    public function Payment ()
    {
        return  $this->belongsTo(Payment::class,'pay_id');
    }
}
