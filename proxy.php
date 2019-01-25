<?php
$requests=$_SERVER['REQUEST_URI'];
preg_match_all('/^\/proxy\/(.*)/',$requests,$parse); 
$request=$parse[1][0];

//if($request=='http://httpbin.org') $request=$request.'/'.$method;
if(isset($_POST)&&empty($_POST))
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
else
  $content=file_get_contents($request);
  
var_dump($content);
