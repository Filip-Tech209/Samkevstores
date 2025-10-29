<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'country',
        'contact_number',
        'email',
        'total_amount',
        'tax_amount',
        'shipping_fee',
        'payment_status',
        'payment_method',
        'shipping_address',
        'delivery_date',
        'currency',
    ];

               

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
