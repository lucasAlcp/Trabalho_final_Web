<?php	
include 'config.php';
if (!isset($_SESSION)) {
    session_start();
}

function execute_query($sql){
	$database = open_database();
	$found=null;
	try {		 
	    
        $result = $database->query($sql);
        if ($result <> null) {
			$found = $result->fetch_all(MYSQLI_ASSOC); 
		}  
        //echo "Registro localziado com sucesso.";
	} catch (Exception $e) {
		//echo "Nao foi possivel realizar a operacao";
	}				
	close_database($database);		
	return $found;	
}

function execute($sql = null) {
	$database = open_database();
    try {
    	 $database->query($sql);
    	 //echo "Registro cadastrado com sucesso.";
    } catch (Exception $e) {
	    //echo "Nao foi possivel realizar a operacao";
	} 		  
    close_database($database);
}	
function open_database() {
    try {
    	 $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    	 return $conn;
	 } catch (Exception $e) {
		 echo $e->getMessage();
    	 return null;
	 }
}
function close_database($conn) {
	try {
	    mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}			 
 