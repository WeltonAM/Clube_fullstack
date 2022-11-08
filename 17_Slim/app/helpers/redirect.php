<?php

function redirect($to, $response, $status = 200)
{
    return header("Location: {$to}");
    // return $response->withHeader('location', $to)->withStatus($status);
}