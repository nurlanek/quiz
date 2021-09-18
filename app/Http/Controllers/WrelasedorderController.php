<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WReleasedOrders;

class WRelasedOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index(WReleasedOrders $WRorders)
    {
        $GetOrders = $WRorders->paginate(10);
        $order = $WRorders->select('shipping_info')->get();
        $GetShipDetails = json_decode($order);
        $GetShipDetails = [];

        // $collection = json_encode(collect($w_relased_order),true);
        // $returnj = json_decode($collection);
        //krsort($w_relased_order);
        // print_r($w_relased_order);
        // return response($w_relased_order);
        // dd($w_relased_order);
        return view('wro_list', compact('GetOrders','GetShipDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function detail($id)
     {
        $orderdetail = WReleasedOrders::where('id', $id)->first();
        return view('detail', compact('orderdetail'));      
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
