<?php

require '../config/conn.php';

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){

        $data = json_decode(file_get_contents("php://input"));

 
        $sql = "INSERT INTO`location_detail`(`address`, `village`, `latitude`, `longitude`, `detail`) VALUES (?,?,?,?,?)";
        $sql= $conn->prepare($sql);
     

    

       if ($sql->execute([$data->address,$data->village,$data->latitude,$data->longitude,$data->detail])) {

         
      



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