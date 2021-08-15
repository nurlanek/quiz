<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Walmart_released_orders;

class SaveController extends Controller
{
  /**
 * Save Controller to save data
 *
 * @return void
 */


function GetToken($clientId, $clientSecret, $tokenUrl)
{


    $authorization = base64_encode($clientId . ":" . $clientSecret);
    $qos = uniqid();
    $ch  = curl_init();
    $options = array(
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
    $response = json_decode(curl_exec($ch));
    print_r($options);
    exit();
    $this->GetData($response->access_token, $authorization);
}

function GetData($token, $authorization)
{

    $Yesterday   = date("Y-m-d", strtotime('-1 day', strtotime(date("Y-m-d")))); // have data yesterday tomorrow
    $Tomorrow = date("Y-m-d", strtotime('+1 day', strtotime(date("Y-m-d")))); // have data tomorrow

    $qos = uniqid();
    $url = "https://sandbox.walmartapis.com/v3/orders?&createdStartDate=" . $Yesterday . "&createdEndDate=" . $Tomorrow . "&limit=100";
    $ch  = curl_init();
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
            "WM_SEC.ACCESS_TOKEN: " . $token,
            "Accept: application/json",
            "Content-Type: application/x-www-form-urlencoded",
        )
    );
    curl_setopt_array($ch, $options);
    $response = json_decode(curl_exec($ch));
    print_r($response);
    for ($i = 0; $i < count($response->list->elements->order); $i++) {
        $arr = array();
        $arr['customerEmailId'] =  $response->list->elements->order[$i]->customerEmailId;
        $arr['customerOrderId'] =  $response->list->elements->order[$i]->customerOrderId;
        $arr['orderDate'] =  $response->list->elements->order[$i]->orderDate;
        $arr['orderLines'] = json_encode($response->list->elements->order[$i]->orderLines);
        $arr['orderType'] =  $response->list->elements->order[$i]->orderType;
        if (property_exists($response->list->elements->order[$i], "originalCustomerOrderID")) {
            $arr['originalCustomerOrderID'] =  $response->list->elements->order[$i]->originalCustomerOrderID;
        } else {
            $arr['originalCustomerOrderID'] =  '';
        }
        $arr['purchaseOrderId'] =  $response->list->elements->order[$i]->purchaseOrderId;
        $arr['shippingInfo'] = json_encode($response->list->elements->order[$i]->shippingInfo);
        if (!Walmart_released_orders::where('customerOrderId', '=', $response->list->elements->order[$i]->customerOrderId)->exists()) {
            Walmart_released_orders::insert($arr);
        }
    }
}

public function handledata()
{
    $clientId = "5a5ab9ee-58ec-4b01-821a-4220a336a968";
    $clientSecret = "IriuP3RT5-oqYMi-lmpz33Hg6Xpv9rDcxGMnZ9WJ2Mhd_zpVZRmcviZcLswqTh9yfQ_IuTdlFETl_qmtDFGVNA";
    $tokenUrl     = "https://sandbox.walmartapis.com/v3/token";
    $this->GetToken($clientId, $clientSecret, $tokenUrl);
}s
}
