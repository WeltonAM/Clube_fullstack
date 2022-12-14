<?php

namespace Database\Query\Interfaces;

interface IBuilder
{
    public function execute(array $queries);
}
