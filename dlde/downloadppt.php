<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Download your Digital Learning Object</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="MSSmartTagsPreventParsing" content="true" />
<meta name="copyright" content="Wayne State University Technology Resource Center" />
<meta name="robots" content="index, follow" />
<meta name="distribution" content="global" />
<meta name="Description" content="Digital Learning and Development Environment: a digital humanities initiative of the Wayne State University Libraries" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta name="Keywords" content="digital sandbox, sandbox, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections" />
<script type="text/javascript" language="javascript" src="js/jquery-1.3.1.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#imdownloading").click(function(){
		$("#upondownload").show();
	});
});
</script>
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>
<body>
<?php include_once("logo.php"); ?>
<div class="wrap background">
<?php include_once("top_menu.php"); ?>
				
  <!-- <div id="logo">
			<h1><a href="index.php">Digital Sandbox Project</a></h1>
			<h2 id="slogan">Wayne State University</h2>
  </div> -->
        
<?php include_once("top_right_menu.php"); ?>
			
	<div id="feature">
        <h3>Create a Digital Learning Object<br />from an Image Portfolio</h3>
        <div class="stepbox">
       	<img id="step_three_img" class="stepimgs" src="images/step-three.gif" alt="Step 3: Download the file" />
        <?php

require("export.php");

$clean = array();
foreach ($_GET as $key => $value) {
	if (ctype_digit($value)) {
		$clean[$key] = $value;
		
	/*if ($value == "911911911"){
	die("<div class='sorry' style='padding-bottom:20px; color:#CC0000; font-weight:bold;'>Too many slides to download, sorry.</div> <div class='choose'><a href='http://digital3.pk.wayne.edu/fady/getid.php'>Choose another portfolio.</a><div class='footer'>&copy; 2009 Wayne State University | About | Contact<br>
  		Digital Sandbox is supported by a grant from the National Council for Humanities.</div>
	</div>
</div>
</body>
</html>");
		} */
		
	} else {
		$clean[$key] = "none";
	}
}

$slides = new ppt_slides();
//$dlxs_root_value = "dlxs.lib.wayne.edu";
$dlxs_root_value = "dlxs.lib.wayne.edu";
$slides->set_dlxs_root($dlxs_root_value);
//$mysql_connection_vars = array('host'=>'127.0.0.1', 'user'=>'sandbox', 'password'=>'dlxss@nd3');
$mysql_connection_vars = array('host'=>'127.0.0.1', 'user'=>'dlxsadm', 'password'=>'emarks123');
$slides->set_mysql_connections($mysql_connection_vars);

if (($clean['bbid']) && ($clean['bbid'] != "none")) {
	$slides->set_bbid($clean['bbid']);

} else {
echo"<p style='color:red; font-weight:bold; text-align:left; font-size:1.3em;'>Too many slides in this portfolio please choose another one.</p>";

echo"<p style='color:red; font-weight:bold; text-align:left; font-size:1.3em;'>You must choose a portfolio under 100 images in order to use the Sandbox tool.</p>";
echo"<div class='sandboxlinks'><a href='http://digital3.pk.wayne.edu/fady/sandbox/index.php'><li>Choose a portfolio</li></a></div>";
echo"</div> <!-- .STEPBOX -->";
echo"</div> <!-- #FEATURES -->";
include_once('bottom_menu.php');
echo"</div>";

include_once('footer.php');      
echo"</body>
</html>";
	die();
}

$slides->make_slides();
$tempdirstamp = $slides->get_tempdirstamp();
echo"<div class='success'><ul><li class='successimg'>Your PowerPoint has been created successfully and is ready to download.</li></ul></div>
";

echo "<div class='sandboxlinks'><ul><li id=\"imdownloading\"><a href='http://dlxs.lib.wayne.edu/dlde/redirect.php?id={$tempdirstamp}'>Click here to download your PowerPoint file</a></li>";
echo "<li><a href='http://dlxs.lib.wayne.edu/dlde/index.php'>Choose another portfolio</a></li></ul></div>";

?>
	</div> <!-- .STEPBOX -->
    
    <div id="upondownload" class="stepbox">
    <img id="step_four_img" class="stepimgs" src="images/step-four.gif" alt="Step 4: Customize your Digital Learning Object" />
    <p><a href="/dlde/docs/4.doc">Customize your DLO in Powerpoint</a>, <a href="/dlde/archive/">add research materials</a>, <a href="/dlde/docs/2.doc">and assess</a> the <a href="/dlde/how-to/part-three/">effectiveness your DLO</a></p>
    </div>
    
	</div>	<!-- #FEATURES -->
  <div class="clear"></div>
		
 
      
<?php include_once("content.php"); ?>

<?php include_once("bottom_menu.php"); ?>		

</div>
    
<?php include_once("footer.php"); ?>

	</div>
 
    
</body>
</html>