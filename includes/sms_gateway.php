<?php
session_start();
//include sms class
require_once('../lib/Sms.php');
/*

short message peer-to-peer protocol (SMPP)

host        : Host server IP Address, eg : 121.241.242.114
port        : Server Port, eg : 8080
username    : User name of the SMPP
password    : Password of the SMPP
sender      : sender name
message     : message you want to send
mobile      : mobile number who will receive the message
msgtype     : Indicates the type of message. Values for "type":-
                0: Plain Text (GSM 3.38 Character encoding)
                1: Flash Message (GSM 3.38 Character encoding)
                2: Unicode
                3: Reserved
                4: WAP Push
                5: Plain Text (ISO-8859-1 Character encoding)
                6: Unicode Flash
                7: Flash Message (ISO-8859-1 Character encoding)

dlr         : Indicates whether the client wants delivery report for this message
                Range of values for "dlr":-
                0: No Delivery report required
                1: Delivery report required

*/

$host       = '121.241.242.114';
$port       = '8080';
$username   = 'yoteyote';
$password   = 'jQueryMaster7';
$sender     = 'Yoteyote';//'Tester';
$message    = 'Welcome to Yoteyote';//'Test Message';
$mobile     = '255787487333';//'255655487333';
$msgtype    = '0';
$dlr        = '1';

$obj        = new Sender($host, $port, $username, $password, $sender, $message, $mobile, $msgtype, $dlr);
$result     = $obj->Submit();

echo '<pre>';
print_r($result);
echo '</pre>';
?>