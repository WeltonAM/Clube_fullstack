<?php

function formatException(Throwable $th)
{
    var_dump("Erro no arquivo <i>{$th->getFile()}</i> na linha <b>{$th->getLine()}</b> com a mensagem: <b>{$th->getMessage()}</b>");
}