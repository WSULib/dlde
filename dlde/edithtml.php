<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Gateway to Sandbox: Add Comments to HTML Download</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="MSSmartTagsPreventParsing" content="true" />
<meta name="copyright" content="Wayne State University Technology Resource Center" />
<meta name="robots" content="index, follow" />
<meta name="distribution" content="global" />
<meta name="Description" content="Digital Sandbox: a digital humanities initiative of the Wayne State University Libraries" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta name="Keywords" content="digital sandbox, sandbox, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<style type="text/css">
      table  { background: #cff; border: solid black; width: 890px; }
      tr.top { background: red }
      td, th { border: solid black; padding: 20px; text-align: center; }
/* FOR SUBMIT BUTTONS */

/* BUTTONS
.buttons {
	text-align: center; } */

.buttons a, .buttons button {
	display:block;
	margin:0 auto;
	background-color:#ccc;
	border:1px solid #666;
	border-top:1px solid #999;
	border-left:1px solid #999;

	font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
	font-size:2em;
	line-height:2em;
	text-decoration:none;
	font-weight:normal;
	color:#565656;
	cursor:pointer;
	padding:5px 10px 6px 7px; /* Links */ }
	
.buttons button {
	width:auto;
	overflow:visible;
	padding:4px 10px 3px 7px; /* IE6 */ }

.buttons button[type] {
	padding:5px 10px 5px 7px; /* Firefox */
	line-height:17px; /* Safari */ }

*:first-child+html button[type] {
	padding:4px 10px 3px 7px; /* IE7 */ }

.buttons button img, .buttons a img {
	margin:0 3px -3px 0 !important;
	padding:0;
	border:none;
	width:16px;
	height:16px; }

/* STANDARD */

button:hover, .buttons a:hover {
	background-color:#dff4ff;
	border:1px solid #c2e1ef;
	color:#336699; }
	
.buttons a:active {
	background-color:#6299c5;
	border:1px solid #6299c5;
	color:#fff; }
</style>
</head>

<body>
   <?php include_once("logo.php"); ?>
<div class="wrap background">
   <?php include_once("top_menu.php"); ?>

	<div id="feature">
        <h3>Create a Digital Learning Object<br />from an Image Portfolio</h3>
        <div class="stepbox">
       	<img id="step_three_img" class="stepimgs" src="images/step-three.gif" alt="Step 3: Add additional text to the slides if desired" />
		<p>Add any additional comments you'd like to the slides, then click "Submit" to create your HTML package.</p>
		</div> <!-- .STEPBOX -->
	</div>	<!-- #FEATURES -->
  
   <?php 	
	  require_once("export.php");

   $clean = array();
   foreach ($_GET as $key => $value) {
	 if (ctype_digit($value)) {
		$clean[$key] = $value;
	 } 
	 else {
		$clean[$key] = "none";
	 }
   }

  $slides = new ppt_slides();
  $slides->set_bbid($clean['bbid']);
//$dlxs_root_value = "dlxs.lib.wayne.edu";
  $dlxs_root_value = "dlxs.lib.wayne.edu";
  $slides->set_dlxs_root($dlxs_root_value);
//$mysql_connection_vars = array('host'=>'127.0.0.1', 'user'=>'sandbox', 'password'=>'dlxss@nd3');
  $mysql_connection_vars = array('host'=>'127.0.0.1', 'user'=>'dlxsadm', 'password'=>'emarks123');
  $slides->set_mysql_connections($mysql_connection_vars);

  $tempdirstamp = $slides->get_tempdirstamp();
?>
  <div class="clear"></div>
		
  <!-- <div id="left">   -->
  <form id="makepages" action="downloadhtml.php"  method="post">
  <div id="slide-container"></div>
	<table>
	<tr>
		<th><h3><i>Slide</i></h3></th>
		<th><h3><i>Meta Data</i></h3></th>
	</tr>
  
  <?php
  /* Funtion call to display Portfolio */
  $slides->display_portfolio_to_add_captions();
   ?>

    </table>
     <input type="hidden" name="bbid" id="bbid" value="<?php echo($clean['bbid']); ?>" />
     <div class="buttons">
     <button type="submit" name="submit" value="Submit" id="test">Submit</button>
	 </div><!-- .BUTTON
	 <input class='button' name="submit" type="submit" value="Submit" id='test' style="padding-top:6px;" /><br /> -->
 </form>

  <!-- Dynamically store the bbid n the comments of each of the Slide. Pass it as an array to the make_page function. Display the comments in the make_page page.-->

 <?php include_once("bottom_menu.php"); ?>		

  <!-- </div> -->
  </div>
    
 <?php include_once("footer.php"); ?>
	</div>
	
 
 </script>
 <script type="text/javascript">
 try {
 var pageTracker = _gat._getTracker("UA-9757450-1");
 pageTracker._trackPageview();
 } catch(err) {}</script>  
	
 </body>

 </html>