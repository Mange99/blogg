<?php
if(!function_exists('dbconn')) {
  require 'db_conn.php';
}
//hämtar alla inlagg returnar i results (reverse)
  function getAllInlagg(){
        $db = dbconn();
        $results =  $db->query('SELECT * FROM inlagg ORDER BY inlagg_pk DESC');

        return $results;
  }

?>
