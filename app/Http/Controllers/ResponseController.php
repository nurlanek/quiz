<?php

namespace App\Http\Controllers;

use App\Models\WReleasedOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ResponseController extends Controller
{
  /**
  * @method GET
  * @return json
  */
  public function index()
  {
    $tokenUrl     	= 'https://sandbox.walmartapis.com/v3/';
    $clientId 		  = '5a5ab9ee-58ec-4b01-821a-4220a336a968';
    $clientSecret 	= 'IriuP3RT5-oqYMi-lmpz33Hg6Xpv9rDcxGMnZ9WJ2Mhd_zpVZRmcviZcLswqTh9yfQ_IuTdlFETl_qmtDFGVNA';
    $authorization 	= base64_encode($clientId . ':' . $clientSecret);
    $authHeader     = 'Basic ' . $authorization;
    $access_token   = $this->GetToken($tokenUrl, $authHeader);
    $yesterday 	  	= Carbon::yesterday()->format('Y-m-d'); // have data yesterday tomorrow
    $tomorrow 	  	= Carbon::tomorrow()->format('Y-m-d'); // have data tomorrow
    $getData 		   	= $tokenUrl . 'orders?&createdStartDate=' . $yesterday . '&createdEndDate=' . $tomorrow . '&limit=100';

    //  GET request from API
    $response = Http::withHeaders([
      'WM_SEC.ACCESS_TOKEN'   => $access_token,
      'WM_QOS.CORRELATION_ID' => Str::random(5),
      'WM_SVC.NAME'           => 'Walmart Marketplace',
      'Authorization'         => $authHeader,
    ])
    ->withBody('grant_type=client_credentials','application/x-www-form-urlencoded')
    ->acceptJson()
    ->get($getData); // <<-Get Data

    $collection = json_decode(collect($response->json()),true);
    // dd($collection);
    foreach($collection['list']['elements'] as $key){
      for($i=0; $i<count($key); $i++){
        $Arr['purchaseOrderId']          = $key[$i]['purchaseOrderId'];
        $Arr['customerOrderId']          = $key[$i]['customerOrderId'];
        $Arr['customerEmailId']          = $key[$i]['customerEmailId'];
        $Arr['orderType']                 = $key[$i]['orderType'];
        $Arr['orderDate']                 = $key[$i]['orderDate'];
        $Arr['orderLines']                = json_encode($key[$i]['orderLines']);
        $Arr['shippingInfo']              = json_encode($key[$i]['shippingInfo']);
        $Arr['originalCustomerOrderID'] = isset($key[$i]['originalCustomerOrderID'])?$key[$i]['originalCustomerOrderID']:'';
         //dd($key) ;
        if (!WReleasedOrders::where('customerOrderId', '=', $key[$i]['customerOrderId'])->exists()) {
            WReleasedOrders::insert($Arr);
        }
      }
    }
    return $response->json();
  }
  /**
  * Save Controller to save data
  * @method POST
  * @return void
  */
  function GetToken($tokenUrl, $authHeader){
    $res = Http::withHeaders([
      'WM_QOS.CORRELATION_ID' => Str::random(9),
      'WM_SVC.NAME'           => 'Walmart Marketplace',
      'Authorization'         => $authHeader
    ])
    ->withBody('grant_type=client_credentials','application/x-www-form-urlencoded')
    ->acceptJson()
    ->post($tokenUrl.'token/');

    return $res->json('access_token');
  }
}
