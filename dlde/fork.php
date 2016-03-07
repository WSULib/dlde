<?php
$clean = array();
foreach ($_POST as $key => $value) {
	if ($key == "bbid") {
		if (ctype_digit($value)) {
			$clean[$key] = $value;
		} else {
			$clean[$key] = "none"; }
	}
	if ($key == "outputtype") {
		if (ctype_alpha($value)) {
			$clean[$key] = $value;
		} else {
			$clean[$key] = "ppt"; }
	}
}

IF ($clean['outputtype'] == "ppt" ){
	/*redirect to "http://...downloadppt.php?bbid={$clean['bbid']}"*/
	$extra = 'downloadppt.php';
	header("Location: http://dlxs.lib.wayne.edu/dlde/$extra?bbid={$clean['bbid']}");
	exit;
}

ELSEIF ($clean['outputtype'] == "html") {
	/*redirect to "http://...DisplaySlides3.php?bbid={$clean['bbid']}"*/
	$extra ='edithtml.php';
	header("Location: http://dlxs.lib.wayne.edu/dlde/$extra?bbid={$clean['bbid']}");
		exit;
}


?>