<?php
class User
{
	
	/**
	* function to insert data into table
	*@param $data array refference variable
	*@return bool 
	* on success return true, else false 
	*/
	function create(&$data) {
		$keyString   = null;//create empty string to store column name of the table
		$valueString = null;//create empty string to hold column value
		
		if(empty($data)) return false;// if data array is empty return false
		
		/** frame the column name and  value */
		foreach($data as $key=>$value) {
			$keyString .= "`$key`,";
			$valueString .= "'$value',";
		}
		
		$keyString   = trim($keyString, ",");
		$valueString = trim($valueString, ",");
		
		$sql = "INSERT INTO user ($keyString) VALUES ($valueString)";
		
		if(mysql_query($sql)) return true;
		else return false;
	}
	
	/**
	* authenticate user
	*@param $user string
	*@param $password string
	*@return $records array 
	* on success return array of data, else empty array
	*/
	function authenticate($user,$password) {
		$records = array();//authenticate
		
		$sql ="SELECT * FROM user where email='$user' AND password='$password' ";
		$result = mysql_query($sql);
		
		/** if $results fetch all records */
		if($result) {
			while($row = mysql_fetch_array($result)) {
				$records[] = $row;
			}
		}
		
		return $records;
	}
	
	/**
	* function to insert data into table
	*@param $data array refference variable
	*@return bool 
	* on success return true, else false 
	*/
	function logUserActivity(&$data) {
		$keyString   = null;//create empty string to store column name of the table
		$valueString = null;//create empty string to hold column value
		
		if(empty($data)) return false;// if data array is empty return false
		
		/** frame the column name and  value */
		foreach($data as $key=>$value) {
			$keyString .= "`$key`,";
			$valueString .= "'$value',";
		}
		
		$keyString   = trim($keyString, ",");
		$valueString = trim($valueString, ",");
		
		$sql = "INSERT INTO userlog ($keyString) VALUES ($valueString)";
		
		if(mysql_query($sql)) return true;
		else return false;
	}
	
	/**
	* function to fetch all the records from the table
	*@param $id int
	*@return $records array 
	* on success return array of data, else empty array
	*/
	function getLogindetails($id) {
		$records = array();//define empty array to store records
		
		$sql ="SELECT * FROM userLog where userId=$id limit 0,5 ";
		$result = mysql_query($sql);
		
		/** if $results fetch all records */
		if($result) {
			while($row = mysql_fetch_array($result)) {
				$records[] = $row;
			}
		}
		
		return $records;
	}
	
	/**
	* function to check is email id exist
	* @param $email string
	* @return bool
	* return true if exist, else false
	*/
	function isEmailExist($email) {
		$sql ="SELECT * FROM user where email='$email'";
		$result = mysql_query($sql);
		
		/** if $results fetch all records */
		if($result && (mysql_fetch_array($result))) {
			return true;
		}
		
		return false;
	}
	
}

?>