<?php


function execute($isFatchAll = true, $rowCount = false)
{
    global $query;

    try {
        $connect = connect();

        if(!isset($query['sql'])){
            throw new Exception("Precisa ter o SQL para executar a Query");
        }
    
        $prepare = $connect->prepare($query['sql']);
        $prepare->execute($query['execute'] ?? []);

        if($rowCount){
            return $prepare->rowCount();
        }

        return $isFatchAll ? $prepare->fetchAll() : $prepare->fetch();

    } catch (Exception $e) {
        $error = [
          'file' => $e->getFile(),  
          'line' => $e->getLine(),  
          'message' => $e->getMessage(),  
          'sql' => $query['sql'],  
        ];
        ddd($error);
    }

}