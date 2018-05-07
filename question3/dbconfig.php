<?php
define('DB_SERVER', 'skillsversitycom.ipagemysql.com');
define('DB_USERNAME', 'olympiad');    // DB username
define('DB_PASSWORD', 'olympiad@123');    // DB password
define('DB_DATABASE', 'olympiad');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
?>