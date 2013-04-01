<?php
class connect
{
private $user = 'root';
private $pass = '';
private $host = 'localhost';
private $dbName = 'samplecode2';

/** function to make a database connect and select database 
*@params 
*@return boolean
*/
public function dbConnect() {
	/** make a connection to database **/
	$connection = mysql_connect($this->host,$this->user,$this->pass);
	if($connection) {
		/** once connection is success, select database  */
		$db = mysql_select_db($this->dbName,$connection);
		return $db;
	}
	return false;
}

}