<?php

require '../config/conn.php';

try {

    $res = new stdClass();
    $average = [];

   if($_SERVER['REQUEST_METHOD'] == "POST" ){

        $sql = $conn->query("SELECT DISTINCT `id_year` FROM tb_person ORDER BY `id_year`DESC LIMIT 3");
        $row = $sql->rowCount();

    
        $loop = 0;
        if ($row > 0) {

            while ($data = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                extract($data);
      

            $res->status = 200;
            $res->message = "ok";
            $res->data = $data;
            $res->sum = $average;

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