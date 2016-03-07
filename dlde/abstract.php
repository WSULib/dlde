
<?php

// JANUARY

// mysql connections
	private $mysql_connections;

public function set_mysql_connections($mysql_connection_vars) {
	$this->mysql_connections = $mysql_connection_vars; }

private function make_mysql_connection($mysql_connections) {
	$connect = mysql_connect($mysql_connections['host'], $mysql_connections['user'], $mysql_connections['password']);
	return $connect; }

// directory root	
	private $sandbox_root;

public function set_sandbox_root($main_root) {
	$this->sandbox_root = $main_root;}
	
	$main_root = "";
	
// destination root	to copy the template to
	private $copy_to;
public function set_copy_to($copy_destination) {
	$this->copy_to = $copy_destination; }
	
	$copy_destination = "";
	
// oai data root	
	private $oai_data_location;
public function set_oai_data_location($oai_root) {
	$this->oai_data_location = $oai_root; }
	
	$oai_root = "";

	
		

// BOOKBAG

$slides = new ppt_slides();
$mysql_vars = array('host'->'localhost', 'user'->'sandbox', 'password'->'s4ndb0x');
$slides->set_mysql_connection($mysql_vars);



?>

