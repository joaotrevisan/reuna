<?php

function findJoin( $tablePrinc = null, $colPrinc = null, $tableSec = null, $colSec = null){
    
    $database = open_database();
    
	$found = null;
    
    try{
        $sql = "SELECT * FROM ".$tablePrinc." a INNER JOIN ".$tableSec." b ON a.".$colPrinc." = b.".$colSec"";         
        $result = database->query($sql);
        
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    catch(Excepetion $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    
    return $found;
    close_database($database);
}