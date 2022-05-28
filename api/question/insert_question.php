<?php

require '../config/conn.php';

try {

    $res = new stdClass();

   if($_SERVER['REQUEST_METHOD'] == "POST" ){

        $data = json_decode(file_get_contents("php://input"));
         
        
        $rows = 0;

        foreach ($data as $key=> $value) 
        {
           $rows=count($value);
        }
     
      
      
         $sql = "INSERT INTO `tb_question`(`id_question`, `question`) VALUES  (?,?)";
         $sql= $conn->prepare($sql);
     

    
         for ($i=0; $i <$rows ; $i++) { 

            $sql->execute([intval($data->Data[$i]->id),$data->Data[$i]->question]);

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

?>