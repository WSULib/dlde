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
    </STYLE>
    
    </head>

<body>
<?php include_once("logo.php"); ?>
<div class="wrap background">
<?php include_once("top_menu.php"); ?>
 
      <div id="logo">
			<h1><a href="index-test.php">Digital Sandbox Project</a></h1>
			<h2 id="slogan">Wayne State University</h2>
      </div>
    <!-- <div id="feature"> 
	
	</div>	-->
<?php 	
	require_once("January-test2.php");

$clean = array();
foreach ($_GET as $key => $value) {
	if (ctype_digit($value)) {
		$clean[$key] = $value;
		
	} else {
		$clean[$key] = "none";
	}
}

$slides = new ppt_slides();
$slides->set_bbid($clean['bbid']);
$dlxs_root_value = "dlxs.lib.wayne.edu";
$slides->set_dlxs_root($dlxs_root_value);
$mysql_connection_vars = array('host'=>'127.0.0.1:6606', 'user'=>'sandbox', 'password'=>'s4ndy123');
$slides->set_mysql_connections($mysql_connection_vars);



/*include_once('bottom_menu.php');
echo"</div>";

include_once('footer.php');      
echo"</body>
</html>";
	die();
*/



$tempdirstamp = $slides->get_tempdirstamp();
?>

  <div class="clear"></div>
		
 <div id="left">   
<form action="Make_pages.php"  method="post"><div id=\"slide-container\"></div>
						<table width=\"766\"  border=\"1\" cellspacing=\"0\" align= left  cellpadding=\"20px\">
     					<tr>
    				<th bgcolor: #006600 align=center bordercolordark:#000033 > <h3><i>Slide</i></h3></th>
    				<th bgcolor: #006600 align= center bordercolordark:#000033 > <h3><i>Meta Data</i></h3></th>
   							 </tr>
<?php
$slides->display_portfolio_to_add_captions();
?>

  <!-- <textarea name="comments" rows="10" cols="25" ></textarea>-->
	</table>
     <input type="hidden" name="bbid" id="bbid" value="<?php echo($clean['bbid']); ?>" />
	 <input class='button' name="" type="submit" value="Submit" id='test' align= middle style="padding-top:6px;" /><br />
 </form>

  <!-- Dynamically store the bbid n the comments of each of the Slide. Pass it as an array to the make_page function. Display the comments in the make_page page.-->


<?php include_once("bottom_menu.php"); ?>		

  </div>
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