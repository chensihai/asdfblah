<?php
$request=$_SERVER['REQUEST_URI'];
//var_dump($_SERVER);
//var_dump($_POST);
$request=substr($request,7);
$method=str_replace('http://httpbin.org/','',$request);
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
$content = file_get_contents($request, false, $context);
}
var_dump($content);
