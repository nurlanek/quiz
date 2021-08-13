$clientId =
$clientSecret =
$tokenUrl     = "https://marketplace.walmartapis.com/v3/token";



function GetToken($clientId,$clientSecret,$tokenUrl){


$authorization = base64_encode($clientId.":".$clientSecret);
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
"WM_QOS.CORRELATION_ID: ".$qos,
"Authorization: Basic ".$authorization,
"Accept: application/json",
"Content-Type: application/x-www-…
[12:38, 10/08/2021] Ikbal Bey Londra: $GetToken = GetToken($clientId,$clientSecret,$tokenUrl);



$Dun   = date("Y-m-d",strtotime('-1 day',strtotime(date("Y-m-d")))); // dünün tarihi elimizde

$Yarin = date("Y-m-d",strtotime('+1 day',strtotime(date("Y-m-d")))); // dünün tarihi elimizde


$authorization = base64_encode($clientId.":".$clientSecret);
$qos = uniqid();
$url = "https://marketplace.walmartapis.com/v3/orders?&createdStartDate=".$Dun."&createdEndDate=".$Yarin."";
$ch  = curl_init();
$options = array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_TIMEOUT => 60,
CURLOPT_HEADER => false,
CURLOPT_HTTPGET => true,
CURLOPT_HTTPHEADER => array
(
"WM_SVC.NAME: Walmart Marketplace",
"WM_QOS.CORRELATION_ID: ".$qos,

"Authorization: Basic ".$authorization,
"WM_SEC.ACCESS_TOKEN: ".$GetToken,
"Accept: application/json",
"Content-Type: application/x-www-form-urlencoded",
)
);
curl_setopt_array($ch, $options);

$response = curl_exec ($ch);


print_r( $response)  ;
