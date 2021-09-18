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
    'purchaseOrderId',
    'customerOrderId',
    'customerEmailId',
    'orderType',
    'originalCustomerOrderID',
    'orderDate',
    'shippingInfo',
    'phone',
    'estimatedDeliveryDate',
    'estimatedShipDate',
    'methodCode',
    'postalAddress',
    'name',
    'address1',
    'address2',
    'city',
    'state',
    'postalCode',
    'country',
    'addressType',
    'orderLines',
    'orderLine',
    'lineNumber',
    'item',
    'productName',
    'sku',
    'charges',
    'charge',
    'chargeType',
    'chargeName',
    'chargeAmount',
    'currency',
    'amount',
    'tax',
    'taxName',
    'taxAmount',
    'currency',
    'amount',
    'orderLineQuantity',
    'unitOfMeasurement',
    'amount',
    'statusDate',
    'orderLineStatuses',
    'orderLineStatus',
    'status',
    'statusQuantity',
    'unitOfMeasurement',
    'amount',
    'fulfillment',
    'fulfillmentOption',
    'shipMethod',
    'pickUpDateTime',
  ];
}
