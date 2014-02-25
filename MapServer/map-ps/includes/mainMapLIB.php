<?php
function mygetusername($clientid) {
	
	$db = new mysqli(dbhost, dbuser, dbpass, dbname);

	if($db->connect_errno > 0){
	    return FALSE;
	}
	
	$query = "SELECT * FROM `".dbprfx."auth-user` WHERE `clientid` = '".$clientid."' LIMIT 1";
	
	if(!$result = $db->query($query)){
		$db->close();	    
		return FALSE;
	}
	if($result->num_rows > 0) {
		$array2 = mysqli_fetch_array($result);	
		return $array2['username'];
	}
	else {
		$db->close();
		return FALSE;
	}
	
	

}
function myregister($uname,$upass,$clientID) {
	
	$db = new mysqli(dbhost, dbuser, dbpass, dbname);

	if($db->connect_errno > 0){
	    return FALSE;
	}
	
	$query = "SELECT * FROM `".dbprfx."auth-user` WHERE `username` = '".mysqli_real_escape_string($db,$uname)."'";
	
	if(!$result = $db->query($query)){
		$db->close();	    
		return FALSE;
	}
	if($result->num_rows > 0) {
		$db->close();
		return FALSE;
	}
	else {
	$salt = gen_uuid();
		$query2 = "INSERT INTO `".dbprfx."auth-user` (`user-uuid`,`clientid`,`clientidassigntime`,`username`,`passhash`,`passsalt`,`userperms`) VALUES ('".gen_uuid()."','".$clientID."','".time()."','".mysqli_real_escape_string($db,$uname)."','".md5($upass.$salt)."','".$salt."',';user-normal;')";
		$db->query($query2);
		$db->query("UPDATE `".dbprfx."auth-user` SET `clientid` = '".$clientID."',`clientidassigntime` = '".time()."' WHERE `username` = '".mysqli_real_escape_string($db,$uname)."'");
		$db->close();		
		return TRUE;
	}
	
}
function myhelp($str) {
	
	$db = new mysqli(dbhost, dbuser, dbpass, dbname);

	if($db->connect_errno > 0){
	    return FALSE;
	}
	
	$query = "SELECT * FROM `".dbprfx."help` WHERE `typekey` = '".$str."' LIMIT 1";
	
	if(!$result = $db->query($query)){
		$db->close();	    
		return FALSE;
	}
	if($result->num_rows > 0) {
	}
	else {
		$db->close();
		return FALSE;
	}
	$array2 = mysqli_fetch_array($result);
			
		return $array2['helpdata'];
	

}
function mylogincheck($uname,$upass,$clientID) {
	
	$db = new mysqli(dbhost, dbuser, dbpass, dbname);

	if($db->connect_errno > 0){
	    return FALSE;
	}
	
	$query = "SELECT * FROM `".dbprfx."auth-user` WHERE `username` = '".mysqli_real_escape_string($db,$uname)."'";
	
	if(!$result = $db->query($query)){
		$db->close();	    
		return FALSE;
	}
	if($result->num_rows > 0) {
	}
	else {
		$db->close();
		return FALSE;
	}
	$array2 = mysqli_fetch_array($result);
	if(md5($upass.$array2['passsalt']) == $array2['passhash']) {
		$db->query("UPDATE `".dbprfx."auth-user` SET `clientid` = '".$clientID."',`clientidassigntime` = '".time()."' WHERE `username` = '".mysqli_real_escape_string($db,$uname)."'");
		$db->close();		
		return TRUE;
	}
	else {
		$db->close();
		return FALSE;
	}

}
/*
function myquery($querysplitpre) {
	
	$db = new mysqli(dbhost, dbuser, dbpass, dbname);

	if($db->connect_errno > 0){
	    return FALSE;
	}
	$querysplitarray=explode('\'',$querysplitpre);
	$x = 0;
	$query = "";
	while(isset($querysplitarray[$x])) {
		if ($x % 2 == 0) {
		  $query = $query.$querysplitarray[$x];
		}
		elseif (($x % 2 != 0) AND ($x != 0)) {
		$escaped = mysqli_real_escape_string($db,$querysplitarray[$x]);
			$query = $query.$escaped;
		}
		$x++;
	}
	if(!$result = $db->query($query)){
	    return FALSE;
	}
	if($result->num_rows > 0) {
	}
	else {
		return FALSE;
	}
	$db->close();
	return $result;

}
*/
// DEPRECATED MySQL 4.x
/* function myquery($query) {
	mysql_connect(dbhost, dbuser, dbpass);
	mysql_select_db(dbname);
	$result = mysql_query($query);
	if (!mysql_errno() && @mysql_num_rows($result) > 0) {
}
else {
$result="not";
}
	mysql_close();
	return $result;
}
*/
// MySQL Execute Batch Query
/*function mybatchquery ($str) {
$str2 = explode("\n",$str);
$str3 = "";
$xx = 0;
while(isset($str2[$xx])) {
if(preg_match("/(.)*insert(.)+/",$str2[$xx]) OR preg_match("/(.)*DROP(.)+/",$str2[$xx]) OR preg_match("/(.)*CREATE(.)+/",$str2[$xx])) {
$str3 = $str3.$str2[$xx];
} else {
$str2[$xx] = preg_replace("/(\p{Zs}|\040|\w)*\/\*(\p{Zs}|\040|\w)+`(\p{Zs}|\040|\w|-)+`(\p{Zs}|\040|\w)* \*\//","",$str2[$xx]);
$str3 = $str3.$str2[$xx];
}
$xx++;
}
$str4 = explode(";",$str3); 
$x=0;
while (isset($str4[$x])) {
if (preg_match("/insert(\p{Zs}|\040|\w|\W)+/",$str4[$x]) OR preg_match("/DROP(\p{Zs}|\040|\w|\W)+/",$str4[$x]) OR preg_match("/CREATE(\p{Zs}|\040|\w|\W)+/",$str4[$x])) {
myquery($str4[$x]);
}
$x++;
}
return TRUE;
}
*/
/*
// MySQL Num Rows
function myrows($result) {
	$rows = @mysqli_num_rows($result);
	return $rows;
}
// MySQL fetch array
function myarray($result) {
	$array = mysqli_fetch_array($result);
	return $array;
}
*/
/*
// MySQL escape string
function myescape($query) {
	$escape = mysql_escape_string($query);
	return $escape;
}
*/
/*
function getHelpTopics($str){
    $result=myquery("SELECT COUNT(*) FROM `".dbprfx."help` WHERE `typekey` = '".$str."'");
    if(mysql_result($result,0) > 0) {
        $result2=myquery("SELECT * FROM `".dbprfx."help` WHERE `typekey` = '".$str."' LIMIT 1");
        $array2 = myarray($result2);
        return $array2['helpdata'];
    }
}
*/
function getLocalConfig($object) {

$keyarray = explode(";",$object);
// TYPE;SCRIPT;ACTIONSCRIPT
	$countresult = myquery("SELECT COUNT(*) FROM `".dbprfx."master-config` WHERE `key` LIKE ';".$keyarray[0].";".$keyarray[1].";".$keyarray[2].";%'");
	$count = mysql_result($countresult, 0);
	if($count < 1) {
	return FALSE;
	}
	else {	
	$result = myquery("SELECT * FROM `".dbprfx."master-config` WHERE `key` LIKE ';".$keyarray[0].";".$keyarray[1].";".$keyarray[2].";%'");
	$x = 1;
	while($x <= $count) {	
	$resultarray = myarray($result);
	$splitarraykey = explode("~",$resultarray['key']);
	$splitarrayresult = explode("|",$resultarray['data']);
	if($splitarrayresult[0] != "") {
	$foo[$splitarraykey[1]][$splitarraykey[2]][$splitarraykey[3]] = ($splitarrayresult[0] +1) - 1;
	}
	elseif($splitarrayresult[1] != "") {
	if($splirarrayresult[1] == "TRUE") {
$foo[$splitarraykey[1]][$splitarraykey[2]][$splitarraykey[3]] = TRUE;
	}
else {
$foo[$splitarraykey[1]][$splitarraykey[2]][$splitarraykey[3]] = FALSE;
	}
	}
	elseif($splitarrayresult[2] != "") {
	$foo[$splitarraykey[1]][$splitarraykey[2]][$splitarraykey[3]] = $splitarrayresult[2];
	}
	else {
	$foo[$splitarraykey[1]][$splitarraykey[2]][$splitarraykey[3]] = "not";
	}
	unset($splitarrayresult);
	$x++;
	}
}
		
	return $foo;
}
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
