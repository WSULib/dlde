<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Digital Learning and Development Environment</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="MSSmartTagsPreventParsing" content="true" />
<meta name="copyright" content="Wayne State University Technology Resource Center" />
<meta name="robots" content="index, follow" />
<meta name="distribution" content="global" />
<meta name="Description" content="Digital Learning and Development Environment: a digital humanities initiative of the Wayne State University Libraries" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta name="Keywords" content="digital sandbox, sandbox, dlde, neh, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/current1.css" />
<link type="text/css" media="screen" rel="stylesheet" href="css/colorbox.css" />

<script type="text/javascript" src="/l1/dlxs/web/dlde/scripts/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#test").click(function(){
		$("#showbar").show();
	});
});
</script>

<script type="text/javascript" language="javascript">
//$(document).ready(function(){
//			$("#collections").colorbox();
//			});
</script>							

</head>

<body>
<?php include_once("logo.php"); ?>
<div class="wrap background">
<?php include_once("top_menu.php"); ?>
				
  <!-- <div id="logo">
			<h1>Digital Sandbox Project</h1>
			<h2 id="slogan">Wayne State University</h2>
  </div> -->
        
<?php include_once("top_right_menu.php"); ?>


			
	<div id="feature">
   <!-- <img src="images/sandbox_test2.jpg" alt="Featured" /> -->
        <h3 id="bridge">Create a Digital Learning Object<br />from an Image Portfolio</h3>
        <div class="stepbox">
       	<img id="step_one_img" class="stepimgs" src="images/step-one.gif" alt="Step 1: Create a digital image portfolio" />
		<!--  <h3>Using the Sandbox Tool</h3> -->
        <p>If you haven't already, create a digital image portfolio using <a href="http://dlxs.lib.wayne.edu/cgi/i/image/image-idx?c=vmc">Virtual Motor City</a>, <a href="http://dlxs.lib.wayne.edu/cgi/i/image/image-idx?page=searchgroup;g=costumegroupic">Digital Dress</a> or <a id="collections" href="collections.html">any of the following</a> DigitalCollections@WSU.
        </p>
        <p><small><a href="/dlde/how-to/videos/portfolio.php">How do I create a digital image portfolio?</a></small></p>
     
        </div>
        
        <div class="stepbox">
       	<img id="step_two_img" class="stepimgs" src="images/step-two.gif" alt="Step 2: Choose a portfolio to download" />
        <p>Choose your digital image portfolio and select the desired format</p>
        
        <?php

require("export.php");

$slides = new ppt_slides();
//$mysql_connection_vars = array('host'=>'127.0.0.1', 'user'=>'sandbox', 'password'=>'dlxss@nd3');
$mysql_connection_vars = array('host'=>'127.0.0.1', 'user'=>'dlxsadm', 'password'=>'emarks123');
//$project_root_value = "dlxs.lib.wayne.edu";
$project_root_value = "dlxs.lib.wayne.edu";
$slides->set_project_root($project_root_value);
$slides->set_mysql_connections($mysql_connection_vars);
$bookbags = $slides->get_bookbag_ids();
$limit = 100;

echo "<form action='fork.php' method='post'>
<select name='bbid' id='bbid'>
";

foreach ($bookbags as $bookbag) {
	if ($bookbag['itemcount'] > 0) {
		//if ($bookbag['shared'] == 1) {
	if ($bookbag['itemcount'] >= $limit) {
			echo "<option class='select' value='none'>{$bookbag['bbagname']} - Too many images.</option>\r\n";
			}
		else{
			echo "<option class='select' value=\"{$bookbag['id']}\">{$bookbag['bbagname']} ({$bookbag['itemcount']} images)</option>\r\n";
		}
	}	
}

echo "</select><br /><br />

<input type='radio' name='outputtype' id='htmloutput' value='html' /> <label class='html' for='htmloutput'>Download as HTML</label><br />
<input type='radio' name='outputtype' id='pptoutput' value='ppt' /> <label class='ppt' for='pptoutput'>Download as PowerPoint</label><br />
<input class='button' type='submit' value='Create Digital Learning Object' id='test'/>
</form>";
        
      ?>  
      <div id="showbar">
		<div class="loading"><span id="progress"><img src="loader.gif"></span><p style="padding-top:6px;">Loading...</p></div> <!-- .LOADING -->
    <script type="text/javascript">document.write("<div class=\"unobtrusive\">");</script>
    <p>(Powerpoint may take a little while to generate... please be patient.)</p>
    <script type="text/javascript">document.write("</div>");</script>
	</div> <!-- #SHOWBAR -->
        </div>
        
        
			<!--
            3) Download the file to your desktop<br />
            4) <a href="http://digital3.pk.wayne.edu/fady/sandbox/docs/4.doc">Customize your DLO in Powerpoint</a>, <a href="http://digital3.pk.wayne.edu/fady/sandbox/part_four.php">add research materials</a>, <a href="http://digital3.pk.wayne.edu/fady/sandbox/docs/2.doc">and assess</a> the <a href="http://digital3.pk.wayne.edu/fady/sandbox/part_three_ii.php">effectiveness your DLO</a></p> -->
	  <!--<p><a class="more" href="#">&not; READ MORE</a></p>-->      

<?php

/*if (isset($_POST['Submit'])) {
require("fork.php");*/

/*if $selected_radio = $_POST['outputtype'] {
require("fork.php");
}*/



?>
  </div> <!-- #FEATURE -->
		
		<div class="clear"></div>
		
      
<?php include_once("content.php"); ?>

<?php include_once("bottom_menu.php"); ?>		

</div>
    
<?php include_once("footer.php"); ?>

	</div>
    
   
</body>
</html>
