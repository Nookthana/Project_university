<?php

require '../config/conn.php';
session_start();

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){
    
    $data = json_decode(file_get_contents("php://input"));

        //print_r($data->Gender);
        //datetime
	    $create = date("Y-m-d H:i:s");
	    $date =  date("Ymd");
        $id_year = date("Y");

        //gen id year
        $variable = 543;
        $id_year=$id_year+ $variable;

        // select id_user        
        $sql = $conn->query("SELECT `id_person` FROM `tb_person` order by id_person desc limit 1;");
        $user_id = $sql->fetchAll(PDO::FETCH_ASSOC);

        //explode
        $explode_id = explode('-',$user_id[0]['id_person']);
		$id = $explode_id[2];

      //create user id
        $id+=1;

		if ($id<10) {

			$id_user = "{$date}-{$data->Address}-00{$id}";

		}elseif($id<100) {

			$id_user = "{$date}-{$data->Address}-0{$id}"; 

		}else {

			$id_user = "{$date}-{$data->Address}-{$id}"; 

		}

        //user id for answer table
        $_SESSION['id_user'] = $id_user;

        //print_r($id_user);

      
        //insert Data
        $sql2 = "INSERT INTO `tb_person`(`id_person`, `name_person`, `created`, `id_year`, `gender`, `disease`, `education`, `age`, `status`, `career`, `address`) 
                 VALUES ('?','?','?','?','?','?','?','?','?','?','?')";
                 
        $conn->prepare($sql)->execute([$name, $surname, $sex]);


                        
     
                    $res->status = 200;
                    $res->message = "ok";



                       
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
