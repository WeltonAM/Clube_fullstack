<?php

require 'bootstrap.php';

try {

    $data = router();

    if(isAjax()){
        die();
    }

    if(!isset($data['data'])){
        throw new Exception("Index is missing");
    }

    if(!isset($data['data']['title'])){
        throw new Exception("Missing Title");
    }
    
    if(!isset($data['view'])){
        throw new Exception("View doesn't exist");
    }
    
    if(!file_exists(VIEWS.$data['view'].'.php')){
        throw new Exception("File {$data['view']} doesn't exist");
    }

    $arr = [
        "nomecompleto" => "Juliana",
        "cidade" => "FSA",
        "email" => "ju@hta.com",
        "senha" => "123",
    ];

    $templates = new League\Plates\Engine(VIEWS);

    // Render a template
    echo $templates->render($data['view'], $data['data']);
    
    // extract($data['data']);

    // $view = $data['view'];

    // require VIEWS.'master.php';
} catch (Exception $e ) {
    var_dump($e->getMessage());
}

