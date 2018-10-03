<?php

//print("*** Connector.php </br>");

require_once ('core/library/connections/connection.php');
require_once ('core/library/display/display-table.php');

class Connector extends Connection {
	
	private static $dbh;
	protected static $query;
	
	protected static function callProcedure($procedureString = ''){	
	
		//echo '*** Connector::callProcedure()</p>';
	
		//echo('... $procedureString  : '.$procedureString.'</p>');

		try {
			
			//echo "... DB connection start : ".Connection::$name." : success </p>"; 
	
    		self::$dbh = new PDO('mysql:host='.Connection::$hostname.';port='.Connection::$port.';dbname='.Connection::$database ,Connection::$username, Connection::$password);
    		self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
            self::$query = self::$dbh->query($procedureString);
			self::$query->setFetchMode(PDO::FETCH_ASSOC);
			
			self::$dbh = null;

			//echo "... DB connection end  : ".Connection::$name."</p>"; 
			
			return self::$query;
   		}
		
		catch(PDOException $error){
			
			
			//echo "... DB connection : ".Connection::$name." : fail : ".$error->getMessage()."</p>";
			

			die();
   		}

	}
}
?>



