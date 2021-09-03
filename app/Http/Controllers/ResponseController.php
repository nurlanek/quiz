<?php

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
