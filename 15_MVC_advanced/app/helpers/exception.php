<?php

function formatException(Throwable $throw)
{
    var_dump("Error in the file <i>{$throw->getFile()}<\i>, in the line: <b>{$throw->getLine()}<\b>, with message: <b>{$throw->getMessage()}<\b>");
}