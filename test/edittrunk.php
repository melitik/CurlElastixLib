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


//edit trunk 
$url_edittrunk = 'https://192.168.56.101/config.php';
$trunk_edit = [
    'display'   => 'trunks',
    'extdisplay'=> 'OUT_4',
    'action'    => 'edittrunk',
    'tech'      => 'sip',
    'provider'  => '',
////    'npanxx'    => '',
//    //general setting
    'trunk_name'=> 'testtrunk',
    'outcid'    => 'SIP',
    'keepcid'   => 'off',
    'maxchans'  => '',
    'disabletrunk'  => '',
    'failtrunk' => '',
    'failtrunk_enable'  => '1',
    'prepend_digit[0]'  => '',
    'pattern_prefix[0]' => '',
    'pattern_pass[0]'   => '',
    'autopop'           => '',
    'dialoutprefix'     => '',
    'channelid'         => 'voiptrunk',
    'peerdetails'       => '',
    'usercontext'       => 'voiptrunk',
    'userconfig'        => '',
    'register'          => 'meliti@aone',
    'Submit'            => 'Submit Changes',
];


$curl->post($url_edittrunk,$trunk_edit);

echo '<pre>';
var_dump($curl);
echo '</pre>';