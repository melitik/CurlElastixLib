<?php 
require '../vendor/autoload.php';
use Curl\Curl;


$urlget = 'https://192.168.1.240/config.php/';


$username = 'admin';
$password = 'admin';



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
$curl->post($url_login, $login);


//Form3 edit
$url_editext = 'https://192.168.1.240/config.php?type=setup&display=extensions&extdisplay=2003';
$url_sipedit = [
    'action' => 'edit',
    'extdisplay' => '2003',
    'action' => 'edit',
    'extdisplay' => '2003',
    //edit extension
    'extension' => '2006',
    'name' => 'sadam',
    'cid_masquerade' => '',
    'sipname' => '2006',
    //Extension Option
    'outboundcid' => '',
    'ringtimer' => '0',
    'callwaiting' => 'disabled',
    'call_screen' => '0',
    'pinless' => 'disabled',
    'emergency_cid' => '',
    'tech' => 'sip',
    'hardware' => '',
    //Assigned DID/CID  
    'newdid_name' => '',
    'newdid' => '',
    'newdidcid' => '',
    
    //Device Option
    'devinfo_secret_origional' =>'sadam2006',
    'devinfo_secret' => 'sadam2006',
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
    'devinfo_dial' => 'SIP2006',
    'devinfo_accountcode' => '',
    'devinfo_mailbox' => '2006@device',
    'devinfo_vmexten' => '',
    'devinfo_deny' => '0.0.0.0/0.0.0.0',
    'devinfo_permit' => '0.0.0.0/0.0.0.0',
    
    //Dictation Service
    'dictenabled' => 'disabled',
    'dictformat' => 'ogg',
    'dictemail'  => '',
    'faxemail'   => '',
    
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
    'attach'=> 'attach=no',
    'saycid'=> 'saycid=no',
    'envelope' => 'envelope=no',
    'delete'   => 'delete=no',
    'imapuser' => '',
    'imappassword' => '',
    'options'   => '',
    'vmcontext' => 'default',
    'vmx_state' => 'Disabled',
    'vmx_option_0_number'=> '',
    'vmx_option_0_system_default' => 'checked',
    'vmx_option_1_number'   => '',
    'vmx_option_2_number'   => '',
    
    //Submit
    'Submit' => 'Submit',
];
$curl->post($url_editext, $url_sipedit);

echo '<pre>';
var_dump($curl);
echo "</pre>";