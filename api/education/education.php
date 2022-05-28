<?php

require '../config/conn.php';

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){

        $sql = $conn->query("SELECT * FROM `education`");
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

?>