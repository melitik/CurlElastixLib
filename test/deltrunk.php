<?php

require '../vendor/autoload.php';

use Curl\Curl;

$urlget = 'https://192.168.56.101/config.php/';


$username = 'admin';
$password = 'admin';



$cookiefile = tempnam("/tmp", "cookies");
$user_agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/34.0.1847.116 Chrome/34.0.1847.116 Safari/537.36';

$curl = new Curl();
$curl->get('https://192.168.56.101/index.php');
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
$url_login = 'https://192.168.56.101/index.php';
$login = [
    'input_user' => urldecode($username),
    'input_pass' => urldecode($password),
    'submit_login' => 'Submit'
];

///form login
$curl->post($url_login, $login);

//menghapus trunk
$url_trunk_del = "https://192.168.56.101/config.php";
$param_trunk_del = [
    'type' => 'setup',
    'display' => 'trunks',
    'extdisplay' => 'OUT_3',
    'action' => 'deltrunk',
];
$curl->get($url_trunk_del, $param_trunk_del);

echo '<pre>';
var_dump($curl);
echo "</pre>";
