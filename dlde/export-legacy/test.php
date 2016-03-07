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
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<meta name="Keywords" content="digital sandbox, sandbox, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/current1.css" />

</head>

<body>
<div class="wrap background">
<?php include_once("top_menu.php"); ?>
				
  <div id="logo">
			<h1>Digital Sandbox Project</h1>
			<h2 id="slogan">Wayne State University</h2>
  </div>
        
<?php include_once("top_right_menu.php"); ?>
			
	<div id="feature">
		<img src="images/PowerPoint-256x256.png" alt="Featured" />
		<h3>How to use the Sandbox tool?</h3>
			<p>First, choose a portfolio from the selection menu below and then press  submit. The time needed to finish the process of creating a portfolio  is based on the number of slides in each portfolio.</p>
	  <p><a class="more" href="#">&not; READ MORE</a></p>
<?php

require("January.php");

$clean = array();
foreach ($_POST as $key => $value) {
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

if (($clean['bbid']) && ($clean['bbid'] != "none")) {
	$slides->set_bbid($clean['bbid']);

} else {
echo"<p style='color:red; font-weight:bold; text-align:center;'>You need to choose another portfolio in order to use this download script.</p>";
echo"<div class='sandboxlinks'><a href='http://digital3.pk.wayne.edu/fady/index.php'>Choose another portfolio</a></div>";
echo"</div>";

include_once('rightnav.php');
 
 	echo"</div></div></div>";
include_once('footer.php');      
echo"</body>
</html>";
	die();
}

$slides->make_slides();
$tempdirstamp = $slides->get_tempdirstamp();
echo"<ul><li class='successimg'>Your PowerPoint has been created successfully and ready to be downloaded.</li></ul>
";

echo "<div class='sandboxlinks'><a href='http://digital3.pk.wayne.edu/fady/Sandbox/redirect.php?id={$tempdirstamp}'>Click here to download your PowerPoint file</a></div>";
echo "<br />";
echo "<div class='sandboxlinks'><a href='http://digital3.pk.wayne.edu/fady/Sandbox/index.php'>Choose another portfolio</a></div>";
echo "<br />";

?>
  </div>
		
		<div class="clear"></div>
		
  <div id="left">
			<h1>Sandbox</h1>
			<p>A sandbox is a creative workspace where you can  construct a presentation  called a digital learning object that combines text, video and even audio materials.</p>
<p>The purpose of this workspace is to promote  wider use of the Digital Image Collections of the Wayne State University  Library System <strong>(WSULS)</strong> for teaching  and learning. This site:</p>

<p>
	<ul>
        <li>Introduces users to the Collections.</li>
        <li>Describes methods of creating portfolios of images.</li>
        <li>Displays links to tools and guidelines for moving portfolios  into templates for building multimedia presentations, called ‘digital learning  objects.’</li>
        <li>Offers research strategies for developing materials to accompany  the images.</li>
    </ul>
</p>

<p>The Digital Image Collections  Sandbox facilitates teaching and learning using two of the richest Collections, <em>Virtual Motor City</em> and <em>Digital Dress.</em></p>
  <p>For teachers a DLO offers:</p>
  <ul>
    <li>A new and interesting way to present material to students</li>
    <li>A multi-media teaching experience</li>
    <li>A way to reach students beyond the classroom</li>
    <li>Enhance a student’s participation in the learning experience</li>
  </ul>
  
  <p>For students a DLO offers:</p>
  <ul>
    <li>A more comprehensive  learning experience</li>
    <li>A creative way to present  study assignments</li>
    <li>An interactive method for  online classes</li>
    <li>Teaches research and analytical  skills</li>
    </ul>
  </div>
      
<?php include_once("side.php"); ?>

<?php include_once("bottom_menu.php"); ?>		

</div>
    
<?php include_once("footer.php"); ?>

	</div>
</body>
</html>