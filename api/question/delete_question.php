<?php

require '../config/conn.php';

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){

        $data = json_decode(file_get_contents("php://input"));

 

        $sql = "DELETE FROM `tb_question` WHERE `id_question`=?";
        $sql= $conn->prepare($sql);
  

    

       if ($sql->execute([$data->id])) {

         
      



            $res->status = 200;
            $res->message = "ok";
        

        

        }else{

            $res->status = 400;
            $res->message = "Bad Request";
            http_response_code(400);
            exit();

        }

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