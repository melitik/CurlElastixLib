<?php

require '../vendor/autoload.php';

use Curl\Curl;

$urlget = 'https://192.168.1.240/config.php/';


$username = 'admin';
$password = '123456';



$cookiefile = tempnam("/tmp", "cookies");
$user_agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/34.0.1847.116 Chrome/34.0.1847.116 Safari/537.36';

$curl = new Curl();
$curl->get('https://192.168.1.240/index.php');
$curl->setUserAgent($user_agent);
$curl->setOpt(CURLOPT_HEADER, 1);
$curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
$curl->setopt(CURLOPT_FOLLOWLOCATION, TRUE);
$curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
$curl->setopt(CURLOPT_SSL_VERIFYHOST, FALSE);
$curl->setopt(CURLOPT_COOKIEFILE, $cookiefile);
$curl->setopt(CURLOPT_COOKIEJAR, $cookiefile);
//
//
//
$url_login = 'https://192.168.1.240/index.php';
$login = [
    'input_user' => urldecode($username),
    'input_pass' => urldecode($password),
    'submit_login' => 'Submit'
];

///form login
//wajib dijalankan diawal 
//setiap melakukan eksekusi
//pemanggilan curl pada elastix
$curl->post($url_login, $login);


//menghapus
$url_ext_delete = "https://192.168.1.240/config.php";
$param_ext_delete = [
    'type' => 'setup',
    'display' => 'extensions',
    'extdisplay' => '2005',
    'action' => 'del',
];
$curl->get($url_ext_delete, $param_ext_delete);

echo '<pre>';
var_dump($curl);
echo "</pre>";
