<?php

require '../config/conn.php';

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){

        $data = json_decode(file_get_contents("php://input"));

        if ($data->year !== null && $data->id_loc !== null) {
           
            $sql = $conn->query("SELECT SUM( t3.gender =1 ) AS gender1,SUM( t3.gender =2 ) AS gender2,SUM(t3.age = 1) AS age1,SUM(t3.age = 2) AS age2,SUM(t3.age = 3) AS age3,SUM(t3.age = 4) AS age4,SUM(t3.age =5) AS age5,
                        SUM(t3.age = 6) AS age6,SUM(t3.disease = 1)AS d1,SUM(t3.disease = 2)AS d2,SUM(t3.disease = 3)AS d3,SUM(t3.disease = 4)AS d4,SUM(t3.disease = 5)AS d5,
                        SUM(t3.disease = 6)AS d6,SUM(t3.disease = 7)AS d7,SUM(t3.disease = 8)AS d8,SUM(t3.disease = 9)AS d9,SUM(t3.disease = 10)AS d10,SUM(t3.disease = 11)AS d11,
                        SUM(t3.disease = 12)AS d12,SUM(t3.disease = 13)AS d13,SUM(t3.disease = 14)AS d14,SUM(t3.disease = 15)AS d15,SUM(t3.disease = 16)AS d16,SUM(t3.disease = 17)AS d17,
                        SUM(t3.education = 1)AS e1,SUM(t3.education=2)as e2,SUM(t3.education=3)as e3,SUM(t3.education=4)as e4,SUM(t3.education=5)as e5,SUM(t3.education=6)as e6,SUM(t3.education=7)as e7,
                        SUM(t3.education=8)as e8,SUM(t3.education=9)as e9,SUM(t3.education=10)as e10,SUM(t3.status=1)as s1,SUM(t3.status=2)as s2,SUM(t3.status=3)as s3,
                        SUM(t3.career=1)as c1,SUM(t3.career=2)as c2,SUM(t3.career=3)as c3,SUM(t3.career=4)as c4,SUM(t3.career=5)as c5,SUM(t3.career=6)as c6,SUM(t3.career=7)as c7,SUM(t3.career=8)as c8,
                        SUM(t3.career=9)as c9,SUM(t3.career=10)as c10

                        FROM  tb_person  t3          
                        WHERE t3.address = $data->id_loc
                        AND   t3.id_year = $data->year");

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