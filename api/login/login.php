<?php

require '../config/conn.php';
session_start();

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){

   
        $data = json_decode(file_get_contents("php://input"));

        //print_r($data->userName);

        $sql = $conn->prepare("SELECT * FROM `member` WHERE `Username`=? AND `Password`=?");
        $sql->execute([$data->userName,$data->passWord]); 
        $row = $sql->rowCount();

    

        if ($row > 0) {

     

            while ($data = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                extract($data);
      
       

                   
            
            $_SESSION['id'] = $data[0]['id'];
            $_SESSION['Firstname'] = $data[0]['Firstname'];
            $_SESSION['LastName'] = $data[0]['LastName'];
            $_SESSION['Avatar'] = $data[0]['Avatar'];
            $_SESSION['Update'] = $data[0]['update'];
  

            $res->status = 200;
            $res->message = "ok";
            $res->data = $data;

            }

            $date = date("Y-m-d H:i:s");
            $id_admin_row =  $_SESSION['id'];

            $sql = "UPDATE `member` SET `update`=? WHERE id=?";
            $sql= $conn->prepare($sql);
            $sql->execute([$date,$id_admin_row]);
       
     

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

?>