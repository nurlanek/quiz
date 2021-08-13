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
            $table->string('customerEmailId')->nullable();
            $table->string('customerOrderId')->default('');
            $table->string('orderDate')->default('');
            $table->longText('orderLines')->nullable();
            $table->string('orderType')->default('');
            $table->string('originalCustomerOrderID')->default('');
            $table->string('purchaseOrderId')->default('');
            $table->longText('shippingInfo')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
