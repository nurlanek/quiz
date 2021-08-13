<?php

namespace Database\Factories;

use App\Models\Walmart_released_orders;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Walmart_released_ordersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Walmart_released_orders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customerEmailId'  => $this->faker->unique()->safeEmail(),
            'customerOrderId' => $this->faker->creditCardNumber(),
            'orderDate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'orderLines' => $this->faker->creditCardNumber(),
            'orderType' => $this->faker->sentence(rand(2,4)),
            'originalCustomerOrderID' => $this->faker->creditCardNumber(),
            'purchaseOrderId' => $this->faker->creditCardNumber(),
            'shippingInfo' => $this->faker->text(8),
        ];
    }
}
