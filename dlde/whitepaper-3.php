<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Digital Learning and Development Environment - White Paper: 3.0 Project Design</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="MSSmartTagsPreventParsing" content="true" />
<meta name="copyright" content="Wayne State University Technology Resource Center" />
<meta name="robots" content="index, follow" />
<meta name="distribution" content="global" />
<meta name="Description" content="Digital Sandbox: a digital humanities initiative of the Wayne State University Libraries" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta name="Keywords" content="digital sandbox, sandbox, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/current2.css" />

</head>

<body>
<?php include_once("logo.php"); ?>
<div class="wrap background">
<?php include_once("top_menu.php"); ?>
		<?php include_once("top_right_menu.php"); ?>
			
        
<?php include_once("top_right_menu.php"); ?>
			
		<div class="clear"></div>
		
  <div id="left-white">
<h1>Digital Learning and Development Environment White Paper</h1>
<h2>NEH Digital Humanities II Start-Up Grant ## HD-50464-08</h2>
<h4>Title of Project: <a href="/dlde/">Digital Learning and Development Environment</a><br />
Institution: <a href="http://www.wayne.edu">Wayne State University</a>, <a href="http://otl.wayne.edu">The Office of Teaching and Learning</a>, <a href="http://www.trc.wayne.edu">Technology Resource Center</a></h4>

<ul class="toc">
<li><a href="/dlde/whitepaper.php">Project Abstract</a></li>

<li><a href="/dlde/whitepaper-1.php">1.0 Project Staff</a></li>
<li><a href="/dlde/whitepaper-2.php">2.0 Project Background</a></li>
<li><a href="/dlde/whitepaper-3.php">3.0 Project Design</a></li>
<li><a href="/dlde/whitepaper-4.php">4.0 Evaluation</a></li>
<li><a href="/dlde/whitepaper-5.php">5.0 Dissemination Plan, Presentations, and Publications</a></li>
<li><a href="/dlde/whitepaper-6.php">6.0 Long-term Significance of the Project</a></li>
</ul>


<hr />
<br />
<h2 class="white-head">3.0 Project Design and Lessons Learned</h2>

	<p>The instructional design challenge for this project was complex. The environment is digital and the intended audience is diverse in subject knowledge and technical sophistication. The audience also spans high school and post-secondary teachers as well as the educational departments of museums and archives. Four features were central to the project: the technologies, the environment, the method, and the approach. </p>

<h4>The Technologies</h4>
<p>The project employs a number of technologies. Images are searched through University of Michigan's <a href="http://dlxs.org">DLXS (Digital Library Extension Software) digital collection software</a>. Using DLXS, users gather images into portfolios, which are recorded in a MySQL database. Using PHP’s MySQL connectivity, the software retrieves a user’s portfolio, harvests images and metadata using <a href="http://www.openarchives.org/pmh/">OAI-Protocol for Metadata Harvesting</a>, and then exploits <a href="http://php.net/manual/en/book.dom.php">PHP’s DOM object class</a> to assemble those elements into a digital learning object (DLO), using the <a href="http://wiki.services.openoffice.org/wiki/PresentationML">PresentationML</a> format of the open-source <a href="http://wiki.services.openoffice.org/wiki/Office_Open_XML">Office Open XML (OOXML) standard</a>.  PresentationML is the format used in Microsoft’s PowerPoint 2007 presentation documents, and the DLO can be viewed in that software. This same process is leveraged to provide an HTML version, for use in a web browser, as a second option for users.  Because these technologies are open source and standardized, the project software can be adapted to other output formats as they emerge.</p>

<h4>The Environment</h4>
<p>The Digital Learning and Development Environment (DLDE) is a web-based workplace for users, designed to <a href="/dlde/how-to/part-one/">orient users</a> to WSU's Digital Collections, <a href="/dlde/how-to/part-two/">provide instructions</a> for searching images and using Digital Collection tools, <a href="/dlde/how-to/part-three/">explains</a> how to create DLOs with samples, and <a href="/dlde/how-to/part-four/">provides guidelines</a> for locating and using online research sources. </p>

<h4>The Method</h4>
<p>Digital Learning Objects (DLOs) combine multi-media content for presentations in both instruction and assignments. New Media Consortium (NMC) defines digital learning objects as "small units that can be fitted together to produce customized experiences triangulating content, interface, and metadata":
</p>

<p>
<table>
  <tr>
    <th class="odd">Content</th>
    <th class="odd">Interface</th>
    <th class="odd">MetaData</th>
  </tr>
  <tr>
    <td class="tdclass">Documents, pictures, simulations, movies, sounds, etc.</td>

    <td class="tdclass">Medium through which users interact with objects with alternative formats</td>
    <td class="tdclass">Information about objects (author, creator, subject area, copyright)</td>
  </tr>
</table><br />
<small>The composite chart is based on Rachel Smith, <i><a href="http://archive.nmc.org/guidelines/">Guidelines for  Authors of Learning Objects</a></i>. New Media Consortium 2004.</small>
</p>


<h4>The Approach</h4>

<p>The design challenge required a clearly stated problem: there is no bridge between digital collections and the learning object in the classroom.  To overcome widely varied levels of technical sophistication among users, the team needed to create an intuitive bridge that would make it easy to choose items from a digital collection and use them in a learning environment.</p>

<p>Because the <a href="http://www.dlxs.org">DLXS software</a> used for Wayne State’s digital collections is highly customized, it quickly became evident that the team would need to create an in-house tool. Although different output formats were considered (including <a href="http://exelearning.org">eXe</a>, <a href="http://www.cfkeep.org">CFKeep</a> and <a href="http://pachyderm.nmc.org/">Pachyderm</a>), <a href="http://wiki.services.openoffice.org/wiki/PresentationML">PresentationML</a> was chosen because it is discrete (does not require a hosting server), open source, fully documented and easily manipulated with PHP. (Pachyderm is in consideration as a possible third option, if and when its documentation is more complete.)</p>

<p>User testing with ‘talk-aloud protocol' helped the team identify a few consistent problems with the software, for further refinement. Users had trouble following the steps necessary to use the software; the team refined the design to guide users step by step, easing their transition between one aspect of the software and the next.  In addition, users had difficulty searching and finding relevant results from our Virtual Motor City collection; the team made extensive additions to the descriptive metadata in that collection, and enabled additional methods of access, including subject browsing and topic selection.  </p>


  <div class="white-navigation">

<p class="white-nav-left">
<a href="/dlde/whitepaper-2.php"> <<< 2.0 Project Background </a>
</p>

<p class="white-nav-right">
<a href="/dlde/whitepaper-4.php"> 4.0 Evaluation >>> </a>
</p>

</div>


  </div>
      
<?php include_once("white_bottom_menu.php"); ?>		

</div>
    
<?php include_once("footer.php"); ?>

	</div>
</body>
</html>