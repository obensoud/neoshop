 <?php  
    require_once 'core.php';
    $temps = 5;    
    // ip du client
    $ip = ($ip = getenv('HTTP_FORWARDED_FOR')) ? $ip :
            ($ip = getenv('HTTP_X_FORWARDED_FOR'))     ? $ip :
            ($ip = getenv('HTTP_X_COMING_FROM'))       ? $ip :
            ($ip = getenv('HTTP_VIA'))                 ? $ip :
            ($ip = getenv('HTTP_XROXY_CONNECTION'))    ? $ip :
            ($ip = getenv('HTTP_CLIENT_IP'))           ? $ip :
            ($ip = getenv('REMOTE_ADDR'))              ? $ip :
            '0.0.0.0';
    // session du client
    $sessionId =session_id();
    // pseudo
    $user_id = $_SESSION['userId'];
    error_log("@@User Id".$_SESSION );
    $sql = "SELECT * FROM users WHERE user_id = {$user_id}";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    $pseudo = empty($result['username']) ? $user_id : $result['username'];
    // time actuel
    $time = time();
    // on recherche l'utilsateur
    $sql_query = "SELECT * FROM connectes where session_id='$sessionId'";
    $result = $connect->query($sql_query);
    // si l'utilisateur n'est pas deja dans la table
    if($result->fetch_array() == 0){
        $sql_query = "INSERT INTO connectes VALUES ('$sessionId','$ip', '$time', '$pseudo')";
        $result = $connect->query($sql_query);
    }
    // mise-à-jour
    else
    {
        $sql1="UPDATE connectes SET derniere='$time',pseudo='$pseudo', ip='$ip' WHERE session_id='$sessionId'";      
        $result = $connect->query($sql1);
    }
    // temps d'incativité
    $time -= $temps * 60;    
    // on supprime ceux qui n'ont pas été connectés depuis assez longtemps
    $sql_query = "DELETE LOW_PRIORITY FROM connectes WHERE derniere <= $time";
    $result = $connect->query($sql_query);
    $user_id = $_SESSION['userId'];
    $sql = "SELECT * FROM users WHERE user_id = {$user_id}";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    $pseudo = empty($result['username']) ? $user_id : $result['username'];
    // time actuel
    $time = time();
    // on recherche l'utilsateur
    $sql_query = "SELECT * FROM connectes where session_id='$sessionId'";
    $result = $connect->query($sql_query);
    // si l'utilisateur n'est pas deja dans la table
    if($result->fetch_array() == 0){
        $sql_query = "INSERT INTO connectes VALUES ('$sessionId','$ip', '$time', '$pseudo')";
        $result = $connect->query($sql_query);
    }
    // mise-à-jour
    else
    {
        $sql1="UPDATE connectes SET derniere='$time',pseudo='$pseudo', ip='$ip' WHERE session_id='$sessionId'";      
        $result = $connect->query($sql1);
    }
    // temps d'incativité
    $time -= $temps * 60;    
    // on supprime ceux qui n'ont pas été connectés depuis assez longtemps
    $sql_query = "DELETE LOW_PRIORITY FROM connectes WHERE derniere <= $time";
    $result = $connect->query($sql_query);
