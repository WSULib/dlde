<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Display Portfolio</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="MSSmartTagsPreventParsing" content="true" />
<meta name="copyright" content="Wayne State University Technology Resource Center" />
<meta name="robots" content="index, follow" />
<meta name="distribution" content="global" />
<meta name="Description" content="Digital Sandbox: a digital humanities initiative of the Wayne State University Libraries" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta name="Keywords" content="digital sandbox, sandbox, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
 <STYLE type="text/css">
      TABLE  { background: #CCFFFF; border: solid black }
      TR.top { background: red }
      TD     { border: solid black; padding: 20px; }
    </STYLE
</head>

<body>
<?php include_once("logo.php"); ?>
<div class="wrap background">
<?php include_once("top_menu.php"); ?>
 
      <div id="logo">
			<h1><a href="index.php">Digital Sandbox Project</a></h1>
			<h2 id="slogan">Wayne State University</h2>
      </div>
    <!-- <div id="feature"> 
	<?php

/*require("January-test.php");

$clean = array();
foreach ($_POST as $key => $value) {
	if (ctype_digit($value)) {
		$clean[$key] = $value;
		
	} else {
		$clean[$key] = "none";
	}
}

$slides = new ppt_slides();
$dlxs_root_value = "dlxs.lib.wayne.edu";
$slides->set_dlxs_root($dlxs_root_value);
$mysql_connection_vars = array('host'=>'127.0.0.1:6606', 'user'=>'sandbox', 'password'=>'s4ndy123');
$slides->set_mysql_connections($mysql_connection_vars);

include_once('bottom_menu.php');
echo"</div>";

include_once('footer.php');      
echo"</body>
</html>";
	die();


$slides->display_portfolio_to_add_captions();
$tempdirstamp = $slides->get_tempdirstamp();

*/ ?>
	</div>	-->
  <div class="clear"></div>
		
 <div id="left">   
<?php require("January-test.php"); ?>
<form action=""  method="get">

  <div id="slide-container"></div>

  <table width="766"  border="1" cellspacing="0" align= left  cellpadding="20px">
     <tr>
    <th bgcolor: #006600 align=center bordercolordark:#000033 > <h3><i>Slide</i></h3></th>
    <th bgcolor: #006600 align= center bordercolordark:#000033 > <h3><i>Meta Data</i></h3></th>
    </tr>
    <tr>
       <td width="400" align=center><img src="slide.gif" /></td>
	   <td width="500" align=center>
	  
	   </td>
	 
 </tr>
  </table>
  <br /><br />
  
   <input class='button' name="" type="submit" value="Submit" id='test' align= middle style="padding-top:6px;" /><br />
   </form>

  </div>
</div>

<?php include_once("bottom_menu.php"); ?>		

</div>
    
<?php include_once("footer.php"); ?>


	</div>
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