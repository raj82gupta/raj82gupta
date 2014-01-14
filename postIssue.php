<?php
// Create a curl handle to a non-existing location
$data = array("title" => "testmyskills3", "body"=>"Perfact and tested.");  

$data_string = json_encode($data);
$ch = curl_init('https://api.github.com/repos/raj82gupta/raj82gupta/issues');
curl_setopt($ch, CURLOPT_USERAGENT, 'http://developer.github.com/v3/#user-agent-required');
curl_setopt($ch, CURLOPT_USERPWD, "raj82gupta:raj82@Gupta");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
); 

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_PROXY, '10.15.66.2:80');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

if(curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}
else
{
	echo "<pre>";
	print_r(curl_exec($ch));
}

// Close handle
curl_close($ch);
?>
