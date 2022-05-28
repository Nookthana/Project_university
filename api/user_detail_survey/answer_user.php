<?php

require '../config/conn.php';

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){


    $data = json_decode(file_get_contents("php://input"));


        $sql = $conn->query("SELECT t1.question, score =1 AS A, score =2 AS B, score =3 AS C, score =4 AS D
                             FROM tb_question t1, tb_answer t2
                             WHERE t2.id_question = t1.id_question
                             AND t2.id_person = '".$data->id_person."'");

        $row = $sql->rowCount();

    

        if ($row > 0) {

            while ($data = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                extract($data);
      
    
           // print_r($data);

            $res->status = 200;
            $res->message = "ok";
            $res->data = $data;
     

        }

        }else{

            $res->status = 404;
            $res->message = "Not Found";
            http_response_code(404);
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
