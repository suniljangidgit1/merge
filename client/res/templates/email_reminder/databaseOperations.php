<?php ( $_SERVER['HTTP_HOST'] == "fincrm.crm.com" ) ? error_reporting(1) : error_reporting(0);

class DatabaseOperations 
{
	public function __construct()
	{
		//CREATE SUBDOMAIN CONNECTION
		include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
		$this->conn  = $conn;

		// CREATE COMMON DATABASE CONNECTION 
	    include($_SERVER['DOCUMENT_ROOT'].'/data/config.php');
	    $this->commonDbConn  = $conn;
	}

	/* FOR EXICUTE ANY QUERY ON SUBDOMAIN DATABASE
	 * @para    ->  $query  [string]
	 * #return  ->  $result [boolean]
	*/
	public function exicuteQuery($query = "") {

	    $result = mysqli_query($this->conn, $query);
	    return ($result) ? true : false ;
	}

	/* GET RECORD ARRAY
	 * @para    ->  $query  [string]
	 * #return  ->  $result [array]
	*/
	public function getRecordArray($query = "") {

	    $result 	= 	mysqli_query($this->conn, $query);
		$row  		= 	mysqli_fetch_array($result);
	    return $row;
	}

	/* FOR EXICUTE ANY QUERY ON COMMON DATABASE
	 * @para    ->  $query  [string]
	 * #return  ->  $result [boolean]
	*/
	public function exicuteQueryOnCommonDatabase($query = "") {

	    $result = mysqli_query($this->commonDbConn, $query);
	    return ($result) ? true : false ;
	}

	public function __destruct()
	{
		//CLOSE SUBDOMAIN DATABASE CONNECTION
		mysqli_close($this->conn);

		//CLOSE COMMON DATABASE CONNECTION
		mysqli_close($this->commonDbConn);
	}
}

$databaseOperations    	=	new DatabaseOperations();

?>