<?php

namespace Database\Query;

use Database\Query\Interfaces\IBuilder;

class Select implements IBuilder
{
    public function execute($queries)
    {
        dd($queries);
    }
}
