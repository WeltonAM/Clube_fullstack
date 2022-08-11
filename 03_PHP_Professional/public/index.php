<?php

require 'bootstrap.php';

try {
    $data = router();

    extract($data['data']);

    if(!isset($data['view'])){
        throw new Exception("View doesn't exist");
    }
    
    if(!file_exists(VIEWS.$data['view'])){
        throw new Exception("File {$data['view']} doesn't exist");
    }

    $view = $data['view'];

    require VIEWS.'master.php';
} catch (\Exception $e ) {
    var_dump($e->getMessage());
}

