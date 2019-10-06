<?php

use Ecco\Math\AddRequest;
use Ecco\Math\SubstractRequest;
use Ecco\Math\CalculatorClient;

require(__DIR__ . "/../vendor/autoload.php");

$calculator = new CalculatorClient();

$req = (new AddRequest())->setX(2)->setY(4);
$reply = $calculator->add($req);

echo '2 + 4 = ' . $reply->getSum() . PHP_EOL;

$req = (new SubstractRequest())->setX(5)->setY(3);
$reply = $calculator->substract($req);

echo '5 - 3 = ' . $reply->getDiff() . PHP_EOL;

