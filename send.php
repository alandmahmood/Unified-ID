<?php
// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once '/Applications/XAMPP/xamppfiles/htdocs/UID1//vendor/autoload.php';
use Twilio\Rest\Client;

$sid    = "AC8535cd02db3ba8dc8a47949427da31fa";
$token  = "20cc7761d0961b89957a2d42c28951ea";
$twilio = new Client($sid, $token);

$verification_check = $twilio->verify->v2->services("VAbd720238d1dafaca93619c403253a1d6")
                                   ->verificationChecks
                                   ->create([
                                                "to" => "+9647709757404",
                                                "code" => "[code]"
                                            ]
                                    );

print($verification_check->sid);
