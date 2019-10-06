<?php

namespace Ecco\Math;

use Google\Protobuf\Internal\Message;

class CalculatorClient implements CalculatorInterface
{
    public function add(AddRequest $request): AddReply
    {
        $reply = new AddReply();
        $reply->mergeFromString($this->makeRequest($request, 'add'));

        return $reply;
    }

    public function substract(SubstractRequest $request): SubstractReply
    {
        $reply = new SubstractReply();
        $reply->mergeFromString($this->makeRequest($request, 'substract'));

        return $reply;
    }

    private function makeRequest(Message $message, string $method): string
    {
        $body = $message->serializeToString();
        echo strlen($body) . PHP_EOL;

        $ch = curl_init("http://localhost/api.php?m=" . $method);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $body,
        ]);

        $response = curl_exec($ch);

        curl_close($ch);
        
        return $response;
    }

}
