<?php declare(strict_types=1);

use App\Factory\NotifierFactory;

require_once __DIR__.'/vendor/autoload.php';

$sms = NotifierFactory::notify("SMS", "07111111111");
echo $sms->send();

$email = NotifierFactory::notify("Email", "rj.iosum@gmail.com");
echo $email->send();


