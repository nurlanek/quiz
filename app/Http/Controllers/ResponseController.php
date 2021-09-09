<?php

// namespace App\Http\Controllers;
//
// use App\Models\WReleasedOrders;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Str;
// use Carbon\Carbon;
//
// class ResponseController extends Controller
// {
//   /**
//   * @method GET
//   * @return json
//   */
//   public function index()
//   {
//     $tokenUrl     	= 'https://sandbox.walmartapis.com/v3/';
//     $clientId 		  = '5a5ab9ee-58ec-4b01-821a-4220a336a968';
//     $clientSecret 	= 'IriuP3RT5-oqYMi-lmpz33Hg6Xpv9rDcxGMnZ9WJ2Mhd_zpVZRmcviZcLswqTh9yfQ_IuTdlFETl_qmtDFGVNA';
//     $authorization 	= base64_encode($clientId . ':' . $clientSecret);
//     $authHeader     = 'Basic ' . $authorization;
//     $access_token   = $this->GetToken($tokenUrl, $authHeader);
//     $yesterday 	  	= Carbon::yesterday()->format('Y-m-d'); // have data yesterday tomorrow
//     $tomorrow 	  	= Carbon::tomorrow()->format('Y-m-d'); // have data tomorrow
//     $getData 		   	= $tokenUrl . 'orders?&createdStartDate=' . $yesterday . '&createdEndDate=' . $tomorrow . '&limit=100';
//
//     //  GET request from API
//     $response = Http::withHeaders([
//       'WM_SEC.ACCESS_TOKEN'   => $access_token,
//       'WM_QOS.CORRELATION_ID' => Str::random(5),
//       'WM_SVC.NAME'           => 'Walmart Marketplace',
//       'Authorization'         => $authHeader,
//     ])
//     ->withBody('grant_type=client_credentials','application/x-www-form-urlencoded')
//     ->acceptJson()
//     ->get($getData); // <<-Get Data
//
//     $collection = json_decode(collect($response->json()),true);
//     // dd($collection);
//     foreach($collection['list']['elements'] as $key){
//       for($i=0; $i<count($key); $i++){
//         $Arr['purchase_order_id']          = $key[$i]['purchaseOrderId'];
//         $Arr['customer_order_id']          = $key[$i]['customerOrderId'];
//         $Arr['customer_email_id']          = $key[$i]['customerEmailId'];
//         $Arr['order_type']                 = $key[$i]['orderType'];
//         $Arr['order_date']                 = $key[$i]['orderDate'];
//         $Arr['order_lines']                = json_encode($key[$i]['orderLines']);
//         $Arr['shipping_info']              = json_encode($key[$i]['shippingInfo']);
//         $Arr['original_customer_order_id'] = isset($key[$i]['originalCustomerOrderID'])?$key[$i]['originalCustomerOrderID']:'';
//         // dd($key) ;
//         if (!WReleasedOrders::where('customer_order_id', '=', $key[$i]['customerOrderId'])->exists()) {
//             WReleasedOrders::insert($Arr);
//         }
//       }
//     }
//     return $response->json();
//   }
//   /**
//   * Save Controller to save data
//   * @method POST
//   * @return void
//   */
//   function GetToken($tokenUrl, $authHeader){
//     $res = Http::withHeaders([
//       'WM_QOS.CORRELATION_ID' => Str::random(9),
//       'WM_SVC.NAME'           => 'Walmart Marketplace',
//       'Authorization'         => $authHeader
//     ])
//     ->withBody('grant_type=client_credentials','application/x-www-form-urlencoded')
//     ->acceptJson()
//     ->post($tokenUrl.'token/');
//
//     return $res->json('access_token');
//   }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{

  public function index()
  {
    $clientId 		= "5a5ab9ee-58ec-4b01-821a-4220a336a968";
		$clientSecret 	= "IriuP3RT5-oqYMi-lmpz33Hg6Xpv9rDcxGMnZ9WJ2Mhd_zpVZRmcviZcLswqTh9yfQ_IuTdlFETl_qmtDFGVNA";
		$tokenUrl     	= "https://sandbox.walmartapis.com/v3/token";

		$authorization 	= base64_encode($clientId . ":" . $clientSecret);

		$qos 			= uniqid();

		$ch  			= curl_init();

		$options 		= array(
										CURLOPT_URL => $tokenUrl,
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_TIMEOUT    => 60,
										CURLOPT_HEADER     => false,
										CURLOPT_POST       => 1,
										CURLOPT_POSTFIELDS => "grant_type=client_credentials",
										CURLOPT_HTTPHEADER => array(

																"WM_SVC.NAME: Walmart Marketplace",
																"WM_QOS.CORRELATION_ID: " . $qos,
																"Authorization: Basic " . $authorization,
																"Accept: application/json",
																"Content-Type: application/x-www-form-urlencoded",
																	)
								);
		curl_setopt_array($ch, $options);

		$response 		= json_decode(curl_exec($ch));

		$access_token	=	$response->access_token;


		$Yesterday 		= date("Y-m-d", strtotime('-1 day', strtotime(date("Y-m-d")))); // have data yesterday tomorrow

		$Tomorrow 		= date("Y-m-d", strtotime('+1 day', strtotime(date("Y-m-d")))); // have data tomorrow

		$qos 			= uniqid();

		$url 			= "https://sandbox.walmartapis.com/v3/orders?&createdStartDate=" . $Yesterday . "&createdEndDate=" . $Tomorrow . "&limit=100";
		$ch = curl_init();
		$options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 60,
		CURLOPT_HEADER => false,
		CURLOPT_HTTPGET => true,
		CURLOPT_HTTPHEADER => array(
		"WM_SVC.NAME: Walmart Marketplace",
		"WM_QOS.CORRELATION_ID: " . $qos,
		"Authorization: Basic " . $authorization,
		"WM_SEC.ACCESS_TOKEN: " . $access_token,
		"Accept: application/json",
		"Content-Type: application/x-www-form-urlencoded",
		)
		);
		curl_setopt_array($ch, $options);
		$response = json_decode(curl_exec($ch));

		$response_data	=	$response;


		$response	=	json_encode($response);
		//echo $response;

		echo "<pre>";

		print_r($response_data->list->elements->order);

	 	 die;
  }

}
