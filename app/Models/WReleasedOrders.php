<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Walmart Released Orders Model
class WReleasedOrders extends Model
{
  use HasFactory;
  protected $table = 'walmart_released_orders';

  /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
  protected $casts = [
      'items' => 'array',
  ];

  protected $fillable = [
    'customer_email_id',
    'customer_order_id',
    'order_date',
    'order_lines',
    'order_type',
    'original_customer_order_id',
    'purchase_order_id',
    'shipping_info',
  ];
}
