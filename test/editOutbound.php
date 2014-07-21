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
//wajib dijalankan diawal 
//setiap melakukan eksekusi
//pemanggilan curl pada elastix
$curl->post($url_login, $login);

//edit Outbound
$url_editOutbound = 'https://192.168.56.101/config.php';
$Oubound_edit = [
    'display'   => 'routing',
    'extdisplay'=> '4',
    'action'    => 'editroute',
    'repotrunkdirection'    => '',
    'repotrunkkey'          => '',
    'reporoutedirection'    => '',
    'reporoutekey'          => '',
  
  // Route Setting
    'routename'         => 'melitik',
    'outcid'            => '',
    'outcid_mode'       => 'override_extension',
    'routepass'         => '',
    'emergency'         => 'YES',
    'intracompany'      => 'YES',
    'mohsilence'        => 'default',
    'time_group_id'     => '',
    'route_seq'         => '2',
    'pinsets'           => '',
    'prepend_digit[0]'  => '',
    'pattern_prefix[0]' => '',
    'pattern_pass[0]'   => '',
    'match_cid[0]'      => '',
    'npanxx'            => '',
    
    'trunkpriority[0]'  => '',
    'trunk0'            => '4',
    'trunkpriority[1]'  => '',
    
    'Submit'            => 'Submit Changes',
       
    
];

$curl->post($url_editOutbound, $Oubound_edit);

echo '<pre>';
print_r($curl);
echo '</pre>';