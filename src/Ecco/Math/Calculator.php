<?php

namespace Ecco\Math;

class Calculator implements CalculatorInterface
{
    public function add(AddRequest $request): AddReply
    {
        $sum = $request->getX() + $request->getY();

        return (new AddReply())->setSum($sum);
    }

    public function substract(SubstractRequest $request): SubstractReply
    {
        $diff = $request->getX() - $request->getY();

        return (new SubstractReply())->setDiff($diff);
    }
}

