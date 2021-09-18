<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalmartReleasedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

      {
            Schema::create('walmart_released_orders', function (Blueprint $table) {
                  $table->id();
                  $table->string('purchaseOrderId')->nullable();
                  $table->string('customerOrderId')->nullable();
                  $table->string('customerEmailId')->nullable();
                  $table->string('orderType')->nullable();
                  $table->string('originalCustomerOrderID')->nullable();
                  $table->string('orderDate')->nullable();
                  $table->string('shippingInfo')->nullable();
                  $table->string('phone')->nullable();
                  $table->string('estimatedDeliveryDate')->nullable();
                  $table->string('estimatedShipDate')->nullable();
                  $table->string('methodCode')->nullable();
                  $table->string('postalAddress')->nullable();
                  $table->string('name')->nullable();
                  $table->string('address1')->nullable();
                  $table->string('address2')->nullable();
                  $table->string('city')->nullable();
                  $table->string('state')->nullable();
                  $table->string('postalCode')->nullable();
                  $table->string('country')->nullable();
                  $table->string('addressType')->nullable();
                  $table->string('orderLines')->nullable();
                  $table->string('orderLine')->nullable();
                  $table->string('lineNumber')->nullable();
                  $table->string('item')->nullable();
                  $table->string('productName')->nullable();
                  $table->string('sku')->nullable();
                  $table->string('charges')->nullable();
                  $table->string('charge')->nullable();
                  $table->string('chargeType')->nullable();
                  $table->string('chargeName')->nullable();
                  $table->string('chargeAmount')->nullable();
                  $table->string('currency')->nullable();
                  $table->string('amount')->nullable();
                  $table->string('tax')->nullable();
                  $table->string('taxName')->nullable();
                  $table->string('taxAmount')->nullable();
                  $table->string('currency')->nullable();
                  $table->string('amount')->nullable();
                  $table->string('orderLineQuantity')->nullable();
                  $table->string('unitOfMeasurement')->nullable();
                  $table->string('amount')->nullable();
                  $table->string('statusDate')->nullable();
                  $table->string('orderLineStatuses')->nullable();
                  $table->string('orderLineStatus')->nullable();
                  $table->string('status')->nullable();
                  $table->string('statusQuantity')->nullable();
                  $table->string('unitOfMeasurement')->nullable();
                  $table->string('amount')->nullable();
                  $table->string('fulfillment')->nullable();
                  $table->string('fulfillmentOption')->nullable();
                  $table->string('shipMethod')->nullable();
                  $table->string('pickUpDateTime')->nullable();


            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('walmart_released_orders');
    }
}
