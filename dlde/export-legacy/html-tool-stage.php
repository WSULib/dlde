<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Sandbox HTML Tool</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="MSSmartTagsPreventParsing" content="true" />
<meta name="copyright" content="Wayne State University Technology Resource Center" />
<meta name="robots" content="index, follow" />
<meta name="distribution" content="global" />
<meta name="Description" content="Digital Sandbox: a digital humanities initiative of the Wayne State University Libraries" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta name="Keywords" content="digital sandbox, sandbox, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/current1.css" />
<script type="text/javascript" language="javascript" src="js/jquery-1.3.1.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#test").click(function(){
		$("#showbar").show();
	});
});
</script>
</head>

<body>

<?php
require("February.php");

$slides = new ppt_slides();
$mysql_connection_vars = array('host'=>'127.0.0.1:6606', 'user'=>'sandbox', 'password'=>'s4ndy123');
$project_root_value = "/global/pub/trcdrupal/fady/Sandbox/";
$slides->set_project_root($project_root_value);
$slides->set_mysql_connections($mysql_connection_vars);
$bookbags = $slides->get_bookbag_ids();
$limit = 100;


echo "<form action='bookbag.php' method='post'>
<select name='bbid' id='bbid'>
";

foreach ($bookbags as $bookbag) {
	if ($bookbag['itemcount'] > 0) {
		//if ($bookbag['shared'] == 1) {
	if ($bookbag['itemcount'] >= $limit) {
			echo "<option class='select' value='none'>{$bookbag['bbagname']} - Too many slides.</option>\r\n";
			}
		else{
			echo "<option class='select' value=\"{$bookbag['id']}\">{$bookbag['bbagname']}</option>\r\n";
		}
	}	
}

echo "</select>

<input class='button' type='submit' value='submit' id='test'/>
</form>";

//print_r($bookbags);


?>

</body>
</html>