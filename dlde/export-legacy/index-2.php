<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Gateway to Sandbox</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="MSSmartTagsPreventParsing" content="true" />
<meta name="copyright" content="Wayne State University Technology Resource Center" />
<meta name="robots" content="index, follow" />
<meta name="distribution" content="global" />
<meta name="Description" content="Digital Sandbox: a digital humanities initiative of the Wayne State University Libraries" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta name="Keywords" content="digital sandbox, sandbox, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/current1.css" />
<link rel="stylesheet" type="text/css" media="screen" href="menu_style.css"  />
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
<?php include_once("logo.php"); ?>
<div class="wrap background">
<?php include_once("top_menu.php"); ?>
				
  <div id="logo">
			<h1>Digital Sandbox Project</h1>
			<h2 id="slogan">Wayne State University</h2>
  </div>
        
<?php include_once("top_right_menu.php"); ?>
			
	<div id="feature">
		<img src="images/sandbox_test2.jpg" alt="Featured" />
	  <h3>Using the Sandbox Tool</h3>
			<p>1) Choose a portfolio from the selection menu below and click submit. <br />(Note: the more images you have in a portfolio, the longer it will take to generate your portfolio) <br/>
            2) Download the file to your desktop<br />
            3) <a href="http://digital3.pk.wayne.edu/fady/sandbox/docs/4.doc">Customize your DLO in Powerpoint</a>, <a href="http://digital3.pk.wayne.edu/fady/sandbox/part_four.php">add research materials</a>, <a href="http://digital3.pk.wayne.edu/fady/sandbox/docs/2.doc">and assess</a> the <a href="http://digital3.pk.wayne.edu/fady/sandbox/part_three_ii.php">effectiveness your DLO</a></p>
	  <!--<p><a class="more" href="#">&not; READ MORE</a></p>-->      
<?php

require("January.php");

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
      <div id="showbar">
		<div class="loading"><span id="progress"><img src="loader.gif"></span><p style="padding-top:6px;">Loading...</p></div>
	</div>
    <script type="text/javascript">document.write("<div class=\"unobtrusive\">");</script>
    <p>(Powerpoint may take a little while to generate... please be patient.)</p>
  </div>
  </div>
		
		<div class="clear"></div>
		
  <div id="left">
			<h2 class="h2main">Sandbox</h2>
			<p>A sandbox is a creative workspace where you can  construct a presentation  called a digital learning object that can combine text, video, and even audio materials.</p>
<p>The purpose of this workspace is to promote  wider use of the Digital Image Collections of the Wayne State University  Library System <strong>(WSULS)</strong> for teaching  and learning. This site:</p>

<p>
	<ul>
        <li>Introduces users to the Collections.</li>
        <li>Describes methods of creating portfolios of images.</li>
        <li>Displays links to tools and guidelines for moving DLXS portfolios into templates for building &nbsp;&nbsp;&nbsp;&nbsp;multimedia presentations, called <strong><em>digital learning  objects</em> (DLO)</strong>.</li>
        <li>Offers research strategies to develop materials to accompany the images.</li>
    </ul>
</p>

<p>The Digital Image Collections  Sandbox facilitates teaching and learning using two of the richest Collections, <em>Virtual Motor City</em> and <em>Digital Dress.</em></p>
  <p>For teachers a <strong>DLO</strong> offers:</p>
  <p><ul>
    <li>A new and interesting way to present material to students</li>
    <li>A multi-media teaching experience</li>
    <li>A way to reach students beyond the classroom</li>
    <li>A method to enhance a student’s active participation in the learning experience</li>
  </ul></p>
  
  <p>For students a <strong>DLO</strong> offers:</p>
  <p><ul>
    <li>A more comprehensive  learning experience</li>
    <li>A creative way to present  study assignments</li>
    <li>An interactive method for  online classes</li>
    <li>A means to develop greater research and analytical skills
      </p>
  </li>
    </ul>
  </div>
      
<?php include_once("side.php"); ?>

<?php include_once("bottom_menu.php"); ?>		

</div>
    
<?php include_once("footer.php"); ?>

	</div>
    
   <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9757450-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>