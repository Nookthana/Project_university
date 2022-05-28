<?php

require '../config/conn.php';

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){

            session_start();
            session_destroy(); 
          
    
    
            $res->status = 200;
            $res->message = "ok";
        


        }else{
            $res->status = 400;
            $res->message = "Bad Request";
            http_response_code(400);
            exit();
        }

        echo json_encode($res);
        http_response_code(200);
        exit();


    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>