<?php

require '../config/conn.php';
session_start();

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){


        // select cont form row question
        $sql = $conn->query("select count(*) as count_q from tb_question");
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
      

        //looop insert
        for ($i=1; $i <=$row; $i++) { 
            
            $sql = "INSERT INTO `tb_answer`(`id_person`, `id_question`, `score`) VALUES ('?','?','?')";
            $sql= $conn->prepare($sql);
            $sql->execute([$_SESSION['id_user'],$i,$_POST['question'.$i]]);
               
            
        }

        
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
