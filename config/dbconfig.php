<?php
$myHost = "mysql.hostinger.co.id"; // use your real host name
$myUserName = "u115045845_root";   // use your real login user name
$myPassword = "B3rnando";   // use your real login password
$myDataBaseName = "u115045845_ayo"; // use your real database name

$con = mysqli_connect( "$myHost", "$myUserName", "$myPassword", "$myDataBaseName" );

if( !$con ) // == null if creation of connection object failed
{ 
    // report the error to the user, then exit program
    die("connection object not created: ".mysqli_error($con));
}

if( mysqli_connect_errno() )  // returns false if no error occurred
{ 
    // report the error to the user, then exit program
    die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
class Database
{
     
    private $host = "mysql.hostinger.co.id";
    private $db_name = "u115045845_ayo";
    private $username = "u115045845_root";
    private $password = "B3rnando";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>