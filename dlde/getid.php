<html>
<head>
<title>Digital Sandbox</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" language="javascript" src="js/jquery.1.3.1.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#test").click(function(){
		$("#showbar").show();
	});
});
</script>
</head>
<body>
<div class="wrapper">
  <div class="banner">
  <div class="bannerontop"></div>
  <div class="logo">Digital Sandbox</div>
  <div class="content">
	    <p>The purpose of this  workspace is to promote wider use of the Digital Image Collections of the Wayne  State University Library System (WSULS) for teaching and learning. The Digital Image Collections Sandbox facilitates teaching and  learning using two of the richest Collections, Virtual Motor City and  Digital Dress.</p>
<?php

require("export.php");

$slides = new ppt_slides();
$bookbags = $slides->get_bookbag_ids();
$limit = 100;

echo "<form action='downloadppt.php' method='post'>
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
    <div id="showbar">
		<div class="loading"><span id="progress"><img src="loader.gif"></span>Loading...</div>
	</div>
    <script type="text/javascript">document.write("<div class=\"unobtrusive\">");</script>
    <p>(Powerpoint may take a little while to generate... please be patient.)</p>
  </div>
    <p><a href="index.php">Home</a></p>

	<div class="footer">&copy; 2009 Wayne State University | About | Contact<br>
  		Digital Sandbox is supported by a grant from the National Council for Humanities.</div>
	</div>
</div>
</body>
</html>