<?php
	// used for database connection
	
		function dbconnect(){
			mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
			mysql_select_db(DB_NAME) or die ("Connection with MySQL could not be established");
		}
	
	// used for admin validation
	
		function Admin_authorize(){
			if(!isset($_SESSION['AL_MCAL']) or $_SESSION['AL_MCAL']==""){
				header("location:index.php");
			}
		}
		
		function member_authorize(){
		
			if(!isset($_SESSION['AW_MEMBER']) or $_SESSION['AW_MEMBER']==""){
				header("location:members-login.php");
			}
		}
	
	// used for execute query
	function getColumn($table,$column,$condition)
	{
			if($condition!="")
			{
			$condition=" and ".$condition;
			}
			$rs=Query("select $column from $table where 1=1 $condition");
			$arr=mysql_fetch_row($rs);

			return $arr[0];
	}
	
		function cout_rows($table,$condition)
		{
			if($condition!="")
			{
			$condition=" and ".$condition;
			}
			$rs=Query("select count(*) as countrec from $table where 1=1 $condition");
			$arr=mysql_fetch_row($rs);

			return $arr[0];
		}
		
		function Query($sql){
			$rs=mysql_query($sql) or die (mysql_error());
			return $rs;
		}
		
	// used for inserting values from table
	
		function insert_fields($table, $in_fieldlist, $in_values){
			$sql="insert into $table ($in_fieldlist) values ($in_values)";
			
			Query($sql);
		}
	
	// used for deleting rows from table
		
		function delete_rows($table,$condition){
			$sql="delete from $table $condition";
			Query($sql);
		}
	
	// used for updating values from table
		
		function update_rows($table, $fieldlist,$condition){
			$sql="update $table set $fieldlist $condition";
			Query($sql);
		}
	
	// used for select data from table 
	
		function select_rows($table,$fieldlist,$condition){
			$sql="select $fieldlist from $table $condition ";		
			Query($sql);
		}
	
	// used for redirect page based on header
	
		function redirect($url){
			header("Location:".$url);
			exit;
		}
	
	// used for redirect page baed on javascript
		
		function page_redirect($url)
		{
			print "<script>";
			print " self.location='$url'"; // Comment this line if you don't want to redirect
			print "</script>";
		}
		
	// used to check email id in correct format 
	
	function isvalidemailid($emailid){
	
		if(!ereg("^[_a-z0-9A-Z-]+(\.[_a-z0-9A-Z-]+)*@[a-z0-9A-Z-]+(\.[a-z0-9A-Z-]+)+$", $emailid)) return 0;
		else return 1;
		
	}
		
	
	// used to create random password
	
		function makeRandomPassword() { 
		$salt = "abchefghjkmnpqrstuvwxyz0123456789"; 
		srand((double)microtime()*1000000); 
		$i = 0; 
			 while ($i <=7) { 
			 $num = rand() % 33; 
			 $tmp = substr($salt, $num, 1); 
			 $pass = $pass . $tmp; 
			$i++; 
			 } 
		$pass = strtoupper($pass);
		return $pass; 
		}	
	
	
	//	In SendMail mail function first 4 parameters are must fields and others are optional
	
		function SendMail($from,$to,$subject,$message,$Cc='',$Bcc='',$attachment=''){
			if($attachment!=''){
			$fileatt_type = "application/octet-stream"; // File Type
					
			$semi_rand = md5(time()); 
			$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
						
			$headers = "\nMIME-Version: 1.0\n" . 
					   "Content-Type: multipart/mixed;\n" . 
					   " boundary=\"{$mime_boundary}\""; 
					
			$message .= "This is a multi-part message in MIME format.\n\n" . 
						"--{$mime_boundary}\n" . 
						"Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
						"Content-Transfer-Encoding: 7bit\n\n" . 
			$message . "\n\n"; 
				
				 $fileatt = explode(",",$attachment);
				 for($j=0;$j<count($fileatt);$j++){
				 $path = $_FILES[$fileatt[$j]]["tmp_name"];
				 $file = fopen($path,'rb'); 
				 $data = fread($file,filesize($path)); 
				 fclose($file); 
						
				 $data = chunk_split(base64_encode($data)); 
				 $fileName = $_FILES[$fileatt[$j]]["name"];
				 $message .= "--{$mime_boundary}\n" . 
							 "Content-Type: {$fileatt_type};\n" . 
							  " name=\"{$fileName}\"\n" . 
							  "Content-Transfer-Encoding: base64\n\n" . 
							  $data . "\n\n" . 
							  "--{$mime_boundary}\n"; 
					  }
				}
				else {
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				}
				// Additional headers
				$headers .= 'To:'. $to . "\r\n";
				$headers .= 'From:' . $from . "\r\n";
				$headers .= 'Cc:' . $Cc . "\r\n";
				$headers .= 'Bcc:' . $Bcc . "\r\n";
				
				// Mail it
				$mailResult = @mail($to, $subject, $message, $headers);
				return $mailResult;
	}
	function getMonth($date)
	{
			$tmp        =explode('/',$date);
			if(count($tmp)!=3)
			{
					$tmp        =explode('-',$date);
					if(count($tmp)!=3) return "0000-00-00";
			}
			$date        ="$tmp[1]";
			return $date;
	}
	function getYear($date)
	{
			$tmp        =explode('/',$date);
			if(count($tmp)!=3)
			{
					$tmp        =explode('-',$date);
					if(count($tmp)!=3) return "0000-00-00";
			}
			$date        ="$tmp[0]";
			return $date;
	}
	function getDay($date)
	{
			$tmp        =explode('/',$date);
			if(count($tmp)!=3)
			{
					$tmp        =explode('-',$date);
					if(count($tmp)!=3) return "0000-00-00";
			}
			$date        ="$tmp[2]";
			return $date;
	}
	function getDayFull($date)
	{
		$arr=array("1st","2nd","3rd","4th","5th","6th","7th","8th","9th","10th","11th","12th","13th","14th","15th","16th","17th","18th","19th","20th","21st","22nd","23rd","24th","25th","26th","27th","28th","29th","30th","31st");
			$tmp        =explode('/',$date);
			if(count($tmp)!=3)
			{
					$tmp        =explode('-',$date);
					if(count($tmp)!=3) return "0000-00-00";
			}
			$date        =$arr[$tmp[2]-1];
			return $date;
	}
	function addDays($date,$noofdays)
	{
	$timeStamp = strtotime($date);
$timeStamp += 24 * 60 * 60 * $noofdays; // (add 7 days)
$newDate = date("Y-m-d", $timeStamp);
	return $newDate;
	}
	function getWeekday($date)
	{
					
			$weekday = date('l', strtotime($date));
			return $weekday;
	}
	function getMonthfull($date)
	{
					
			$weekday = date('F', strtotime($date));
			return $weekday;
	}
	function getMonthShort($date)
	{
					
			$weekday = date('M', strtotime($date));
			return $weekday;
	}
	
	
	/*----------------------------------------------------------------
	Description   :- function to convert a mysql date to "mm/dd/yyyy" format
	Programmer    :- JVK
	-------------------------------------------------------------------*/
	function getdate_mmddyyyy($date)
	{
			if(!empty($date))
			{
			//separate using -
			$datearr = explode("-",$date);
			return $datearr[1]."/".$datearr[2]."/".$datearr[0];
			}
	}

	/*----------------------------------------------------------------
	Description   :- function to convert a mysql date to "dd/mm/yyyy" format
	Programmer    :- JVK
	-------------------------------------------------------------------*/
	function getdate_ddmmyyyy($date)
	{
			if(!empty($date))
			{
					//separate using -
					$datearr = explode("-",$date);
					return $datearr[2]."/".$datearr[1]."/".$datearr[0];
			}
	}

	/*----------------------------------------------------------------
	Description   :- function to convert the date from mm-dd-yy to yyyy-mm-dd
	Programmer    :- JVK
	-------------------------------------------------------------------*/
	function date2mysql($date)
	{
			$tmp        =explode('/',$date);
			if(count($tmp)!=3)
			{
					$tmp        =explode('-',$date);
					if(count($tmp)!=3) return "0000-00-00";
			}
			$date        ="$tmp[2]-$tmp[0]-$tmp[1]";
			return $date;
	}
	function date2php($date)
	{
			$tmp        =explode('/',$date);
			if(count($tmp)!=3)
			{
					$tmp        =explode('-',$date);
					if(count($tmp)!=3) return "0000-00-00";
			}
			$date        ="$tmp[1]-$tmp[2]-$tmp[0]";
			return $date;
	}
	/*----------------------------------------------------------------
	Description   :- function to check if a number is integer
					* Check if a number is a counting number by checking if it
					* is an integer primitive type, or if the string represents an integer as a string
	Programmer    :- JVK
	-------------------------------------------------------------------*/
		function is_int_val($data) 
		{
			if (is_int($data) === true) return true;
			elseif (is_string($data) === true && is_numeric($data) === true) 
			{
				return (strpos($data, '.') === false);
			}
			return false;
		}


	//Encryption function

function encryptData($data) {
		$td = mcrypt_module_open('tripledes', '', 'ecb', '');
		$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td, '70Db9ZnOwPTPG876hMxnUw3', $iv);
		$encrypted_data = mcrypt_generic($td, $data);
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
	   
	   return $encrypted_data;
}

	//Decryption function
function decryptData($data) {
		$td = mcrypt_module_open('tripledes', '', 'ecb', '');
		$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		$key = substr($key, 0, mcrypt_enc_get_key_size($td));
		mcrypt_generic_init($td, '70Db9ZnOwPTPG876hMxnUw3', $iv);
		$decrypted_data = mdecrypt_generic($td, $data);
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
	
	   return trim($decrypted_data);
}

// encription local function change when site will upload

function encrypt($string, $key)
{
$result = '';
for($i=1; $i<=strlen($string); $i++)
{
$char = substr($string, $i-1, 1);
$keychar = substr($key, ($i % strlen($key))-1, 1);
$char = chr(ord($char)+ord($keychar));
$result.=$char;
}
return $result;
}


function decrypt($string, $key)
{
$result = '';
for($i=1; $i<=strlen($string); $i++)
{
$char = substr($string, $i-1, 1);
$keychar = substr($key, ($i % strlen($key))-1, 1);
$char = chr(ord($char)-ord($keychar));
$result.=$char;
}
return $result;
}
		
//date format function
function getformatdate($dateval){
	$datpart = explode('-',$dateval);
	$formateddate = $datpart[1]."-".$datpart[2]."-".$datpart[0];
	return $formateddate;
}

function getUnformatedDate($dateval){
	$datpart = explode('-',$dateval);
	$formateddate = $datpart[2]."-".$datpart[0]."-".$datpart[1];
	return $formateddate;
}


function is_valid_url($url){
	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}
function isValidURL( $url )
{
/*
		$url = @parse_url($url);

		if ( ! $url) {
			return false;
		}

		$url = array_map('trim', $url);
		$url['port'] = (!isset($url['port'])) ? 80 : (int)$url['port'];
		$path = (isset($url['path'])) ? $url['path'] : '';

		if ($path == '')
		{
			$path = '/';
		}

		$path .= ( isset ( $url['query'] ) ) ? "?$url[query]" : '';

		if ( isset ( $url['host'] ) AND $url['host'] != gethostbyname ( $url['host'] ) )
		{
			if (PHP_VERSION)
			{
				$headers = get_headers("$url[scheme]://$url[host]:$url[port]$path");
				$fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30);

				if ( ! $fp )
				{
					return false;
				}
				fputs($fp, "HEAD $path HTTP/1.1\r\nHost: $url[host]\r\n\r\n");
				$headers = fread ( $fp, 128 );
				fclose ( $fp );
			}
			$headers = ( is_array ( $headers ) ) ? implode ( "\n", $headers ) : $headers;
			return ( bool ) preg_match ( '#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers );
		}
		return false;
		*/
		
		$url_arr	=	array();
		$url_arr	=	explode("//",$url);
		
		$first_part	=	strtolower($url_arr[0]);
		
		if(($first_part=="http:")||($first_part=="https:")){
			$strRegex = "^(https?://)" ;
			$strRegex .= "?(([0-9a-z_!~*'().&=+$%-]+: )?[0-9a-z_!~*'().&=+$%-]+@)?" ;
			$strRegex .=  "(([0-9]{1,3}\.){3}[0-9]{1,3}";
			$strRegex .=  "|" ;
			$strRegex .= "([0-9a-z_!~*'()-]+\.)*" ;
			$strRegex .=  "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\." ;
			$strRegex .=  "[a-z]{2,6})";
			$strRegex .=  "(:[0-9]{1,4})?";
			$strRegex .=  "((/?)|";
			$strRegex .=  "(/[0-9a-z_!~*'().;?:@&=+$,%#-]+)+/?)$";
			if(ereg ($strRegex, $url))
				return TRUE;
			else
				return FALSE;
		}else{
			return FALSE;
		}
}

?>