
<?php
        use Firebase\JWT\JWT;
        require_once './php-jwt-master/src/JWT.php';  
        
        $key = "secret";
        $jwt = $_POST["assertion"];
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        if($decoded != null){
            $array = json_decode(json_encode($decoded), true);
            echo json_encode($array["sub"]);
        }
		$host = 'mysql.hostinger.fr';
		$port = 3306;
		$username = "u178451338_root";
		$password = "Yx0Pztd4JTzK";
		$dbname = "u178451338_stock";
		// db connection
		$connect = new mysqli($host, $username, $password, $dbname);
		// check connection
		if($connect->connect_error) {
		  die("Connection Failed : " . $connect->connect_error);
		} else {
				 $ip = ($ip = getenv('HTTP_FORWARDED_FOR')) ? $ip :
			            ($ip = getenv('HTTP_X_FORWARDED_FOR'))     ? $ip :
			            ($ip = getenv('HTTP_X_COMING_FROM'))       ? $ip :
			            ($ip = getenv('HTTP_VIA'))                 ? $ip :
			            ($ip = getenv('HTTP_XROXY_CONNECTION'))    ? $ip :
			            ($ip = getenv('HTTP_CLIENT_IP'))           ? $ip :
			            ($ip = getenv('REMOTE_ADDR'))              ? $ip :
			            '0.0.0.0';
			    // session du client
			    $sessionId =rand();
			    
			    $temp=$array["sub"];
			    $time = time();
			 	$sql_query = "INSERT INTO connectes VALUES ('$sessionId','$ip', '$time', '$temp')";
         		$result = $connect->query($sql_query);
        		echo json_encode($array["sub"]);
		  }
       
?>