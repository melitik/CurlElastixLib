<?php

require '../vendor/autoload.php';

use Curl\Curl;

$host = "192.168.56.101";
$username = 'admin';
$password = 'admin';
$urlget = 'https://' . $host . '/config.php/';



$cookiefile = tempnam("/tmp", "cookies");
$user_agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/34.0.1847.116 Chrome/34.0.1847.116 Safari/537.36';

$curl = new Curl();
$curl->get('https://' . $host . '/index.php');
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
$url_login = 'https://' . $host . '/index.php';
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

//TRUNK
//trunk form1 
$urltrunk = 'https://' . $host . '/config.php?display=trunks';
$curl->post($urltrunk);

//Add Trunk Form2 
$url_addtrunk_get = 'https://' . $host . '/config.php?display=trunks&tech=SIP';
$curl->get($url_addtrunk_get);

$url_addtrunk = 'https://' . $host . '/config.php';
$add_siptrunk = [
    'display' => 'trunks',
    'tech' => 'sip',
    'extdisplay' => '',
    'action' => 'addtrunk',
    'provider' => '',
    'npanxx' => '',
//general setting
    'trunk_name' => 'voiptrunk',
    'outcid' => 'SIP',
    'keepcid' => 'off',
    'maxchans' => '',
    'disabletrunk' => '',
        //    'failtrunk' => '',
        //    'failtrunk_enable' => '1',
        //    'prepend_digit[0]' => '',
        //    'pattern_prefix[0]' => '',
        //    'pattern_pass[0]' => '',
//dial rules wizard
    'autopop' => '',
//outbound dial prefix 
    'dialoutprefix' => '',
//outgoing setting 
    'channelid' => 'voiptrunk',
//peer details 
     'peerdetails' => 'host=voiprakyat.or.id,username=140749:secret=VURRN1,type=peer,qualify=yes,context=from-trunk,insecure=port,invite',
//user context 
    'usercontext' => 'voiptrunk',
    'userconfig' => '',
    'register' => 'asdasdas@asdasd',
    'Submit' => 'Submit Changes',
];

$curl->post($url_addtrunk, $add_siptrunk);

echo '<pre>';
print_r($curl);
echo '</pre>';
