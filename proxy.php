<?php
$request=$_SERVER['REQUEST_URI'];
//var_dump($_SERVER);
preg_match_all('/^\/proxy\/(.*)\/(.*)/',$request,$parse); 
//var_dump($parse);
//$request=substr($request,7);
//$method=str_replace('http://httpbin.org/','',$request);//fixed domain here, can be improved to any domain
$request=$parse[1][0];
$method=$parse[2][0];

if($request=='http://httpbin.org') $request=$request.'/'.$method;

if($method=='get')
$content=file_get_contents($request);
elseif($method=='post')
{

$data = $_POST;
$data = http_build_query($data);

$context_options = array (
        'http' => array (
            'method' => 'POST',
            'header'=> "Content-type: application/x-www-form-urlencoded\r\n"
                . "Content-Length: " . strlen($data) . "\r\n",
            'content' => $data
            )
        );

$context = stream_context_create($context_options);
//var_dump($context);
//echo $request;
$content = file_get_contents($request, false, $context);
}
else{
$content=['Method get/post missed'];
}
var_dump($content);
