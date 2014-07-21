<?php

require '../vendor/autoload.php';
use Curl\Curl;

# awan
//$curl = new Curl();
//$curl->get('http://localhost:8000/user/add');
//echo '<pre>';
//
//print_r($curl);
//
//

//$urlget = ('http://localhost:8000/user/add');
//echo $urlget;

//$get = new Curl();
//$get->get('http://localhost:8000/user/add');
//echo '<pre>';
//print_r($get);


$url = 'https://www.facebook.com/AoneMlelitik';
$data= array(
    'email'=> 'juliharri@gmail',
    'pass'=> 'a1o15n14e5',
    
    );
$curl = new Curl();
$curl->post($url, $data);

$cookiefile = tempnam("/tmp", "cookies");
$user_agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/36.0.1847.116 Chrome/34.0.1847.116 Safari/537.36';
$curl->setUserAgent($user_agent);
$curl->setBasicAuthentication('juliharri@gmail.com', 'a1o15n14e5');
$curl->setUserAgent('');
$curl->setReferrer('');
$curl->setopt(CURLOPT_COOKIEFILE, $cookiefile);
$curl->setopt(CURLOPT_COOKIEJAR, $cookiefile);
$curl->setOpt(CURLOPT_HEADER, false);
$curl->setOpt(CURLOPT_RETURNTRANSFER, true);
$curl->setOpt(CURLOPT_FOLLOWLOCATION, true);

//$curl->post($url, $data);

//echo $post->response;
echo '<pre>';
print_r($curl);


