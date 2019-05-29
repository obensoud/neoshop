<?php 
    require_once 'core.php';    
    $sql_query = "SELECT pseudo,ip FROM connectes WHERE pseudo <> ''";
    $result = $connect->query($sql_query);
    $output = array('data' => array());
    $users ="";
    $status = ""; 
    while($row = $result->fetch_array()) {
        
        $status = "<label class='label label-success'>Connecte</label>";
        $nomUser= '"'.$row[0].'"';
        $users  = "<a data-dismiss='modal' onclick='creatTchat(".$nomUser.")'>".$row[0]."</a>";
        $output['data'][] = array(      
            $users,        
            $status
        );  
    } // /while 
    $connect->close();
    echo json_encode($output);