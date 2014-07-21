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

//urlget inbound route
$url_addinbound = 'https://192.168.56.101/?menu=pbxconfig&type=setup&display=did';
$add_inbound = [
    'display'       => 'did',
    'action'        => 'addIncoming',
    'extdisplay'    => '',
    'didfilter'     => '',
    'rnavsort'      => 'description',
   // Add Incoming Route
    'description'   => 'tessinbound',
    'extension'     => ' <2003> arif',
    'cidnum'        => '',
    'pricid'        => 'CHECKED',
    'alertinfo'     => '',
    'grppre'        => '',
    'mohclass'      => 'default',
    'ringing'       => 'CHECKED',
    'delay_answer'  => '',
    'privacyman'    => '0',
    'pmmaxretries'  => '3',
    'pmminlength'   => '10',
    'cidlookup_id'  => '0',
    //    'faxenabled'    => 'false',
    //    'faxenabled'    => 'true',
    //    'faxdetection'  => 'dahdi',
    //    'faxdetectionwait' => '4',
    // fax destination 
    //    'gotoFAX'   => '',
  // Languange
    'language'      => '',
    'Extensions0'   => 'from-did-direct,2002,1',
    //Submit
    'Submit'        => 'Submit',
    'submitclear'   => 'Clear Destination & Submit',
    
];


$curl->post($url_addinbound,$add_inbound);

echo '<pre>';
print_r($curl);
echo "</pre>";
