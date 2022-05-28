<?php

require '../config/conn.php';
session_start();

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){

    //input Query string
    $data = json_decode(file_get_contents("php://input"));
    //value for session
    $_SESSION['question'] = $data->question;

 

        $sql = $conn->query("SELECT t1.id_person, name_person, sex, span_of_age, name_disease, t5.education, t6.status, t7.career, created,t8.village 
        FROM tb_person t1, sex t2, age t3, disease t4, education t5,status t6, career t7,location_detail t8 
        WHERE t1.gender = t2.id 
        AND t1.age = t3.id 
        AND t1.disease = t4.id 
        AND t1.education = t5.id 
        AND t1.status = t6.id 
        AND t1.career = t7.id 
        AND t1.address=t8.id 
        AND t1.id_person = '".$data->id_person."'");

        $row = $sql->rowCount();

    

        if ($row > 0) {

            while ($data = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                extract($data);
      

            $_SESSION['data'] = $data;
        

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