<?php

require '../config/conn.php';
session_start();

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){


    $data = json_decode(file_get_contents("php://input"));
    //value for session
    $year1 = $data->year1;
    $year2 = $data->year2;
    $year3 = $data->year3;


        $sql = $conn->query("SELECT p.disease, d.name_disease, sum(id_year=$data->year1) as year1, sum(id_year=$data->year2) as year2, sum(id_year=$data->year3) as year3
                             FROM tb_person p,disease d 
                             WHERE p.disease = d.id 
                             group by d.id ");

        $row = $sql->rowCount();

    

        if ($row > 0) {

            while ($data = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                extract($data);
      

            $_SESSION['data'] = $data;
            $_SESSION['year1'] = $year1;
            $_SESSION['year2'] = $year2;
            $_SESSION['year3'] = $year3;

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