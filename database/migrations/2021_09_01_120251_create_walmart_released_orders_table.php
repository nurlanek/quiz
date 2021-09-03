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
                $table->string('customer_email_id')->nullable();
                $table->string('customer_order_id')->default('');
                $table->string('order_date')->default('');
                $table->longText('order_lines')->nullable();
                $table->string('order_type')->default('');
                $table->string('original_customer_order_id')->default('');
                $table->string('purchase_order_id')->default('');
                $table->longText('shipping_info')->nullable();
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
