<?php

require '../vendor/autoload.php';

use Curl\Curl;

$urlget = 'https://192.168.56.101/config.php/';


$username = 'admin';
$password = 'admin`';



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



//Add Extension form1
$url_ext = 'https://192.168.56.101/config.php';
$ext_sip = [
    'display' => 'extensions',
    'type' => 'setup',
    'tech_hardware' => 'sip_generic',
    'Submit' => 'Submit',
];
$curl->post($url_ext, $ext_sip);

//Add SIP ext form2
$url_addext = 'https://192.168.56.101/config.php?type=setup&display=extensions';
$url_sipexten = [
    'action' => 'add',
    'extdisplay' => '',
//    'action' => 'add',
//    'extdisplay' => '',
    //add extension
    'extension' => '2005',
    'name' => 'iqbal',
    'cid_masquerade' => '',
    'sipname' => '2005',
    //Extension Option
    'outboundcid' => '',
    'ringtimer' => '0',
    'callwaiting' => 'disabled',
    'call_screen' => '0',
    'pinless' => 'disabled',
    'emergency_cid' => '',
    'tech' => 'sip',
    'hardware' => 'generic',
    //Assigned DID/CID  
    'newdid_name' => '',
    'newdid' => '',
    'newdidcid' => '',
    //Device Option
    'devinfo_secret_origional' => '',
    'devinfo_secret' => 'iqbal2005',
    'devinfo_dtmfmode' => 'rfc2833',
    'devinfo_canreinvite' => 'no',
    'devinfo_context' => 'from-internal',
    'devinfo_host' => 'dynamic',
    'devinfo_type' => 'friend',
    'devinfo_nat' => 'yes',
    'devinfo_port' => '5060',
    'devinfo_qualify' => 'yes',
    'devinfo_callgroup' => '',
    'devinfo_pickupgroup' => '',
    'devinfo_disallow' => '',
    'devinfo_allow' => '',
    'devinfo_dial' => '',
    'devinfo_accountcode' => '',
    'devinfo_mailbox' => '',
    'devinfo_vmexten' => '',
    'devinfo_deny' => '0.0.0.0/0.0.0.0',
    'devinfo_permit' => '0.0.0.0/0.0.0.0',
    //Dictation Services
//    'dictenabled'   => 'disabled',
//    'dictformat'    => 'ogg',
//    'dictemail'     => '',
    //Language
    'langcode' => '',
    //Recording Option
    'record_in' => 'Never',
    'record_out' => 'Never',
    //Voicemail & Directory
    'vm' => 'disabled',
    'vmpwd' => '',
    'email' => '',
    'pager' => '',
    'imapuser' => '',
    //Submit
    'Submit' => 'Submit',
];
$curl->post($url_addext, $url_sipexten);

echo '<pre>';
var_dump($curl);
echo "</pre>";


