<?php
error_reporting(E_ALL);

include("export.php");

$clean = array();
foreach ($_POST as $key => $value) {
	if (ctype_print($value)) {
		$clean[$key] = $value;
	} else {
		$clean[$key] = "none";
	}
}

foreach ($clean as $key => $value) {
	$newkey = str_replace('___',']',$key);
	$key = $newkey;
}

$openhtml = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n";
$openhtml .= "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\r\n";
$openhtml .= "<head>\r\n<title>Download HTML</title>\r\n";
$openhtml .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n";
$openhtml .= "<meta name=\"MSSmartTagsPreventParsing\" content=\"true\" />\r\n";
$openhtml .= "<meta name=\"copyright\" content=\"Wayne State University Technology Resource Center\" />\r\n";
$openhtml .= "<meta name=\"robots\" content=\"index, follow\" />\r\n<meta name=\"distribution\" content=\"global\" />\r\n";
$openhtml .= "<meta name=\"Description\" content=\"Digital Learning and Development Environment: a digital humanities initiative of the Wayne State University Libraries\" />\r\n";
$openhtml .= "<link rel=\"shortcut icon\" href=\"favicon.ico\" type=\"image/x-icon\" />\r\n";
$openhtml .= "<meta name=\"Keywords\" content=\"digital sandbox, sandbox, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections\" />\r\n";
$openhtml .= "<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"css/style.css\" />\r\n";
$openhtml .= "<style type=\"text/css\">\r\n";
$openhtml .= "table { background: #ccffff; border: solid black; width: 890px; margin-top: 20px; }\r\n";
$openhtml .= "tr.top { background: red; }\r\n";
$openhtml .= "td, th { border: solid black; padding: 20px; text-align: center; }\r\n";
$openhtml .= "input#test { padding-top: 6px; }\r\n";
$openhtml .= "</style>\r\n</head>\r\n<body>\r\n";
$openhtml .= "<div id=\"wsu_logo\"><a href=\"http://dlxs.lib.wayne.edu/dlde/\"><img src=\"img/sandbox-header.gif\" /></a></div>\r\n";
$openhtml .= "<div class=\"wrap background\">\r\n";
$openhtml .= ""; // this is where the top-menu include would go
//$openhtml .= "<div class=\"clear\"></div>\r\n";
$openhtml .= "<div id=\"left\">\r\n";
//$openhtml .= "<div id=\"slide-container\"></div>\r\n";
$openhtml .= "<table>\r\n";
$openhtml .= "<tr>\r\n<th><h3><em>Slide</em></h3></th>\r\n<th><h3><em>Meta Data</em></h3></th>\r\n</tr>\r\n";


$closehtml = "</table>\r\n";
$closehtml .= ""; // this is where the bottom-menu include would go
$closehtml .= "</div>\r\n</div>\r\n";
$closehtml .= ""; // this is where the footer include would go
$closehtml .= ""; // this is where the google analytics script will go
$closehtml .= "</body>\r\n</html>\r\n";


$slides = new ppt_slides();
$slides->set_bbid($clean['bbid']);
//$dlxs_root_value = "dlxs.lib.wayne.edu";
$dlxs_root_value = "dlxs.lib.wayne.edu";
$slides->set_dlxs_root($dlxs_root_value);
//$mysql_connection_vars = array('host'=>'127.0.0.1', 'user'=>'sandbox', 'password'=>'dlxss@nd3');
$mysql_connection_vars = array('host'=>'127.0.0.1', 'user'=>'dlxsadm', 'password'=>'emarks123');
$slides->set_mysql_connections($mysql_connection_vars);

$tempdirstamp = $slides->get_tempdirstamp();

$slides->make_pages($clean,$openhtml,$closehtml);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Download your Digital Learning Object</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="MSSmartTagsPreventParsing" content="true" />
<meta name="copyright" content="Wayne State University Technology Resource Center" />
<meta name="robots" content="index, follow" />
<meta name="distribution" content="global" />
<meta name="Description" content="Digital Sandbox: a digital humanities initiative of the Wayne State University Libraries" />
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
       	<img id="step_four_img" class="stepimgs" src="images/step-four.gif" alt="Step 4: Download the file" />
    
<?php

if (($clean['bbid']) && ($clean['bbid'] != "none")) {
	$slides->set_bbid($clean['bbid']);

} else {
echo"<p style='color:red; font-weight:bold; text-align:left; font-size:1.3em;'>Too many slides in this portfolio please choose another one.</p>";

echo"<p style='color:red; font-weight:bold; text-align:left; font-size:1.3em;'>You need to choose a portfolio in order to use the Sandbox tool.</p>";
echo"<div class='sandboxlinks'><a href='http://dlxs.lib.wayne.edu/dlde/index.php'><li>Choose a portfolio</li></a></div>"; 
echo"<br />";
echo"<br />";
echo"<br />";
echo"</div>";
include_once('bottom_menu.php');
echo"</div>";

include_once('footer.php');      
echo"</body>
</html>";
	die();
}

/*$slides->make_slides();*/

echo"<div class='success'><ul><li class='successimg'>Your HTML has been created successfully and ready to be downloaded.</li></ul></div>
";

echo "<div class='sandboxlinks'><li id=\"imdownloading\"><a href='http://dlxs.lib.wayne.edu/dlde/redirect_html.php?id={$tempdirstamp}'>Click here to download your HTML file</a></li></div>";
echo "<br />";
echo "<div class='sandboxlinks'><li><a href='http://dlxs.lib.wayne.edu/dlde/index.php'>Choose another portfolio</a></li></div>";
 
?>

	</div> <!-- .STEPBOX -->
    
     <div id="upondownload" class="stepbox">
    <img id="step_five_img" class="stepimgs" src="images/step-five.gif" alt="Step 5: Customize your Digital Learning Object" />
    <p>Read about <a href="#">how to further customize your HTML DLO</a>, <a href="/dlde/archive/">add research materials</a>, <a href="/dlde/docs/2.doc">and assess</a> the <a href="/dlde/how-to/part-three/">effectiveness your DLO</a></p>
    </div>
    
    </div> <!-- #FEATURES -->
    <div class="clear"></div>
    

<?php include_once("content.php"); ?>

<?php include_once("bottom_menu.php"); ?>		

</div>
    
<?php include_once("footer.php"); ?>

	</div>
   
    
</body>
</html>