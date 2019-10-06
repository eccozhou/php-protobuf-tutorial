<?php

use Ecco\Math\AddRequest;
use Ecco\Math\Calculator;
use Ecco\Math\SubstractRequest;

require(__DIR__ . "/../vendor/autoload.php");

$method = isset($_GET['m']) ? $_GET['m'] : 'add';

switch ($method) {
    case 'add':
        $request = new AddRequest();
        $request->mergeFromString(file_get_contents('php://input'));
        $reply = (new Calculator())->add($request);
        echo $reply->serializeToString();
        break;
    case 'substract':
        $request = new SubstractRequest();
        $request->mergeFromString(file_get_contents('php://input'));
        $reply = (new Calculator())->substract($request);
        echo $reply->serializeToString();
        break;
    default:
	    echo "hello111";
	    break;
}

