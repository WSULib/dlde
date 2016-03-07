<?php
// GET THE ID (TIMESTAMP)
$id=$_GET['id'];
if (ctype_digit($id)) {
	
	$file = "zips/$id.pptx";
	if (file_exists($file)) {

		  // Set headers
		 header("Cache-Control: public");
		 header("Content-Description: File Transfer");
		 header("Content-Disposition: attachment; filename=$id.pptx");
		 header("Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation pptx");
		 header("Content-Transfer-Encoding: binary");
		
		 // Read the file from the zip directory
		 readfile($file);

    } else {
		
	// File doesn't exist, output error
	die('<html>
<head>
<title>Failed to create the file</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div class="wrapper">
  <div class="banner">
  <div class="bannerontop"></div>
  <div class="logo">Digital Learning and Development Environment</div>
  <div class="content">
	    <h4 style="text-align:left;">Failed to create the PowerPoint file. Please try again.</p>
		<a href="http://dlxs.lib.wayne.edu/dlde/getid.php">Choose another portfolio.</a>
		<br />
		<br />

    <div id="showbar">
		<div class="loading"><span id="progress"><img src="loader.gif"></span>Loading...</div>
	</div>
    <script type="text/javascript">document.write("<div class=\"unobtrusive\">");</script>
    <p>(Powerpoint may take a little while to generate... please be patient.)</p>
    
</div>

	<div class="footer">&copy; 2009 Wayne State University | About | Contact<br>
  		Digital Sandbox is supported by a grant from the National Council for Humanities.</div>
	</div>
</div>
</body>
</html>');
	}
} else {
	die('<html>
<head>
<title>404 Page was not found</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div class="wrapper">
  <div class="banner">
  <div class="bannerontop"></div>
  <div class="logo">Digital Learning and Development Environment</div>
  <div class="content">
	    <h4 style="text-align:left;">404 Page was not found.</p>
		<a href="http://dlxs.lib.wayne.edu/dlde/getid.php">Choose another portfolio.</a>
		<br />
		<br />

    <div id="showbar">
		<div class="loading"><span id="progress"><img src="loader.gif"></span>Loading...</div>
	</div>
    <script type="text/javascript">document.write("<div class=\"unobtrusive\">");</script>
    <p>(Powerpoint may take a little while to generate... please be patient.)</p>
    
</div>

	<div class="footer">&copy; 2009 Wayne State University | About | Contact<br>
  		Digital Sandbox is supported by a grant from the National Council for Humanities.</div>
	</div>
</div>
</body>
</html>');
}
?>