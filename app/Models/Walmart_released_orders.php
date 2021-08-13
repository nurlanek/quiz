<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walmart_released_orders extends Model
{
    use HasFactory;
    protected $table = 'Walmart_released_orders';

    protected $fillable = [
        'customerEmailId',
        'customerOrderId',
        'orderDate',
        'orderLines',
        'orderType',
        'originalCustomerOrderID',
        'purchaseOrderId',
        'shippingInfo',
    ];
}
