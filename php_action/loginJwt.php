
<?php
        use Firebase\JWT\JWT;
        require_once './php-jwt-master/src/JWT.php';  

        $key = "CcPrZ/O0auMn9x6JxzStLoeSo2ckUG7ymn1MhSlsDM4=";
        $jwt = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiIwMEQyNjAwMDAwMDhjckJFQVEiLCJzdWIiOiJvLmJlbnNvdWRhLmV4dEBuZW9wb3N0LmNvbS5kZXZyNCIsImF1ZCI6Imh0dHBzOi8vbmVvcG9zdC0tRGV2UjQuY3M4MS5teS5zYWxlc2ZvcmNlLmNvbSIsImlhdCI6IjE1MTM4Njg0MDIiLCJleHAiOiIxNTEzODY4NzAyIn0.0Dg9r27NdUUuDGFoXixm_BzXVx-wybAK6__8kDY_xUg";
        //$jwt = $_POST["assertion"];
        //print_r($jwt);//Mostramos el Tocken Codificado

        $decoded = JWT::decode($jwt, $key, array('HS256'));
        if($decoded != null){
            echo json_encode('true');
        }
        
       
        ?>