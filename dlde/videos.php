<?php

$page = http_request();

//set URLs for videos
$browseURL = 'http://digital3.pk.wayne.edu/fady/Sandbox/how-to/videos/browsing.php';
$exportURL = 'http://digital3.pk.wayne.edu/fady/Sandbox/how-to/videos/export.php';
$keywordURL = 'http://digital3.pk.wayne.edu/fady/Sandbox/how-to/videos/keyword.php';
$portfolioURL = 'http://digital3.pk.wayne.edu/fady/Sandbox/how-to/videos/portfolio.php';

//set titles for videos
$browse = 'How to Browse Subjects in Virtual Motor City';
$export = 'How to Convert a Portfolio to a Learning Object'; 
$keyword = 'How to Keyword Search WSU Digital Collections';
$portfolio = 'How to Create a Portfolio in WSU Digital Collections';

echo "<div><h3>Related Videos</h3>";
echo "<p>";

echo $page;

/*if (($browse) ) {
	echo "<a href=\"$exportURL\">$export</a><br />";
} else {
	echo "<a href=\"$browseURL\">$browse</a><br />";	
}*/









?>