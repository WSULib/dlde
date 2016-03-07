<?php

class ppt_slides{

	private $bbid; // the bookbag id
	private $slide_number;	// next slide number to be used for the new slide part
	private $slide_count;   // next slide count to be used in the filename of the new slide
	private $next_rId; 		// next rId to be used for the new slide part
	private $tempdirstamp;
	private $contents;
	private $presentation;
	private $presentation_relations;
	private $slide_relations;
	private $slide;
	private $mysql_connections;
	private $project_root;
	private $dlxs_root;
	
		
	// IN OUR TEMPLATE:
	//
	// THE LARGEST RID IN presentation.xml.rels IS "rId6"
	// THE LARGEST SLIDE COUNT is "slide1.xml" (its RID is "rId2")
	// THE LARGEST SLIDE NUMBER IN presentation.xml IS "257"
	//
	// IN slide1.xml.rels
	// "rId1" => slideLayout4.xml
	// "rId2" => media/image1.jpeg
	
	
	function __construct(){
		
		/*****************************************************************************************************************/
		/* Set the initial value of attributes
		/*****************************************************************************************************************/
		$this->tempdirstamp = time();
		$this->slide_number = 257;
		$this->slide_count = 1;
		$this->next_rId = 6;

		/*****************************************************************************************************************/
		/* Load the XML into DomDocument objects for later processing
		/*****************************************************************************************************************/
		$this->contents = new DomDocument();
		$this->contents->load("./new_template/[Content_Types].xml");
	
		$this->presentation = new DomDocument();
		$this->presentation->load("./new_template/ppt/presentation.xml");
		
		$this->presentation_relations = new DomDocument();
		$this->presentation_relations->load('./new_template/ppt/_rels/presentation.xml.rels');
		
		$this->slide_relations = new DomDocument();
		$this->slide_relations->load('./new_template/ppt/slides/_rels/slide1.xml.rels');
		
		$this->slide = new DomDocument();
		$this->slide->load("./new_template/ppt/slides/slide1.xml");
		
	} // END function __construct()	
	
	// BBID SETTER, GETTER

	public function set_bbid($bookbagid) {
		$this->bbid = $bookbagid; }
		
	public function get_bbid() {
		return $this->bbid; }
	
	// project root	setter

	public function set_project_root($project_root_value) {
		$this->project_root = $project_root_value; }
		
	public function set_dlxs_root($dlxs_root_value) {
		$this->dlxs_root = $dlxs_root_value; }
	
	// MYSQL CONNECTION SETTER
	// NOTE: array containing 'host', 'user', 'password'

	public function set_mysql_connections($mysql_connection_vars) {
		$this->mysql_connections = $mysql_connection_vars; }
	
	// TEMPDIRSTAMP GETTER
	
	public function get_tempdirstamp() {
		return $this->tempdirstamp; }
	
	// FUNCTION TO RETURN A SANDBOX DATABASE CONNECTION HANDLE
	/*private function make_mysql_connection() {
		$host = "localhost";
		$username = "sandbox";
		$password = "s4ND60x";
		$connect = mysql_connect($host, $username, $password);
		return $connect;
	}*/
	
	private function make_mysql_connection() {
	$connect = mysql_connect($this->mysql_connections['host'], $this->mysql_connections['user'], $this->mysql_connections['password']);
	return $connect; }
	
	private function create_tempdir() {
		$copystring = "cp -r {$this->project_root}new_template {$this->project_root}tmp/tmp{$this->tempdirstamp}";
		exec($copystring); }
	
	// FUNCTION TO RETURN AN ARRAY OF OAI LINKS FOR EACH ITEM IN A BOOKBAG
	private function get_oai_data($bbid, $dbhandle) {

		mysql_select_db("dlxs", $dbhandle);
		
		$query = "SELECT * FROM BookBagItems WHERE bbid = $bbid";
				
		$results = mysql_query($query, $dbhandle)
		or die(mysql_error());
		$many = array();
		while($row = mysql_fetch_assoc($results)) {
			$current = array();
			foreach ($row as $key => $value) {
				$current[$key] = $value;
			}
			$many[] = $current;
		}
		// ALTERING THE LINKS
		$altered_links = array();
		foreach ($many as $value) {
				$current = array();
				$links = str_replace("S-","IC-",$value['itemid']);
				$final_links = str_replace("]","%5D",$links);
				// $oai_array = array($link, $collid, $explode_left, $explode_right);
				//private function dlxs_root_varialble() {	
				$oai_links = "http://{$this->dlxs_root}/cgi/o/oai/oai?verb=GetRecord&identifier=oai:{$this->dlxs_root}:{$final_links}&metadataPrefix=oai_dc";
				
				//}
				$current['identifier'] = $final_links;
				$current['oai_link'] = $oai_links;
				$current['collid'] = $value['collid'];
				$current['itemid'] = $value['itemid'];
				// ....
				$altered_links[] = $current;
				//echo"$oai_links";
				//echo"<br />";
		}
		return $altered_links;
	}
	
	public function get_bookbag_ids() {
	
		$dbhandle = $this->make_mysql_connection();
		
		mysql_select_db("dlxs", $dbhandle);
		
		$query = "SELECT * FROM BookBagDB order by bbagname"; // might add 'WHERE shared = 1'
		
		$results = mysql_query($query, $dbhandle)
		or die(mysql_error());
		
		$bookbagdb = array();
		while($row = mysql_fetch_assoc($results)) {
			$current = array();
			foreach ($row as $key => $value) {
				$current[$key] = $value;
			}
			$bookbagdb[] = $current;
		}
		return $bookbagdb;
	}

/* NEED TO CREATE function display_portfolio_to_add_captions(){
		make_mysql_connection();
		get_oai_data();
		
		MAY NEED TO ABSTRACT THE IMAGE PROCESSING PARTS OF make_slides()
		INTO ITS OWN PRIVATE FUNCTION SO THEY CAN BE USED 
		HERE AS WELL WITHOUT REWRITING THEM, so
		
		get_img_links();
		
		THEN OUTPUT A FORM WITH THE IMAGES/METADATA and CAPTION TEXTFIELD,
		POST TO A PROCESSING SCRIPT (FORM VALUES TO AN ARRAY, ASSOCIATE
									 CAPTIONS WITH BOOKBAGITEM IDS AS KEYS)
		
		display_images_and_metadata_with_caption_textfields();
		
	} END THIS DISPLAY FUNCTION
	
	
	IN THE PROCESSING SCRIPT THAT THE PREVIOUS FUNCTION POSTS TO,
	RUN A make_pages() FUNCTION THAT CAPTURES AND USES THE CAPTION DATA
	
	NEED TO CREATE A make_pages(){
		make_mysql_connection();
		create_tempdir();
		get_oai_data;
		get_img_links();
		
		AND MAKE AN OUTPUT FUNCTION THAT WRITES THE HTML,
		SAVES IT TO THE TEMP DIRECTORY
		
		output_html();
		zip_tempdirectory();
		delete_tempdirectory();
	} END THIS MAKE_PAGES FUNCTION

*/
	public function make_slides(){
		
		$handle = $this->make_mysql_connection();
		$this->create_tempdir(); // calling create_tempdir private function
		$altered_links = $this->get_oai_data($this->bbid, $handle);
		// FOR TESTING:
		//print_r($altered_links);
		// ******************
		$counter = 1;
		foreach ($altered_links as $link) {
			$oai_xml = file_get_contents($link['oai_link']);
			$oaidata = new DOMDocument();
			$oaidata->loadXML("$oai_xml");
			
			//print_r($link['collid']);
			//echo"<br />";
			
					$img_identifier = $link['identifier'];
					$img_first_part = explode("-X-",$img_identifier);
					$img_identifier = $img_first_part['1'];
					$img_second_part = explode("%5D",$img_identifier);
					
					$img_link = "http://dlxs.lib.wayne.edu/cgi/i/image/getimage-idx?viewid={$img_second_part['1']};cc={$link['collid']};entryid=x-{$img_second_part['0']};quality=mid;view=image";
						list($width, $height) = getimagesize($img_link);
						if(($width == "") && ($height == "")){
						$img_link = "http://digital3.pk.wayne.edu/fady/image.jpeg";
						$width = 305;
						$height = 300;
						}
       
						$fixed_width = 400; 
						$fixed_height = 400;
						
   						if(($width > 400)||($height > 400)){
							if($width > $height){
								// landscape image
				   
								$newWidth = $fixed_width;
								$newHeight = (int)($fixed_width * $height / $width);
				   
								if($newHeight > $fixed_height){
									
									$newHeight = $fixed_height;
									$newWidth = (int)($fixed_height * $width / $height);
									}
				
							}
							elseif ($height > $width){
								// portrait image
				   
								$newHeight = $fixed_height;
								$newWidth = (int)($fixed_height * $width / $height);
				   
								if($newWidth > $fixed_width){
								
									$newWidth = $fixed_width;
									$newHeight = (int)($fixed_width * $height / $width);
									}
				   
							}
							else{
								// square image
				   
								$newWidth = $fixed_width;
								$newHeight = $fixed_height;
				   
								}
				
							}else{
								$newWidth = $width;
								$newHeight = $height;
							}
					/*	echo"width =". $newWidth;
						echo"<br />";
						echo"height =". $newHeight;
						echo"<br />";
						echo"$img_link";
					*/
						$titlevalue = "The title is not available";
						$datevalue = "The date is not available";
						$publishervalue = "The publisher is not available";
						$rightsvalue = "The rights information is not available";
												
			// Changes made on Februuary 25
			/*foreach ($oaidata->getElementsByTagName('error') as $error) {
						// echo $errormsg;

					if ($error->nodeName == "error") {
						$errorcheck = 1;
						$titlevalue = "Data Could not be displayed";
						$datevalue = "Data Could not be displayed";
						$publishervalue = "Data Could not be displayed";
						$rightsvalue = "Data Could not be displayed";
						$img_link = "http://digital3.pk.wayne.edu/fady/image.jpeg";
						$width = 305; // error image width
						$height = 300; // error image height
					}
			}
			*/
			
			foreach ($oaidata->getElementsByTagNameNS('http://www.openarchives.org/OAI/2.0/oai_dc/', 'dc') as $element) {
						//$titlevalue = "The title is not available";
				foreach ($element->getElementsByTagName('title') as $new) {
						$titlevalue = utf8_encode(htmlspecialchars($new->nodeValue)); }
						//$publishervalue = "The publisher data is not available";
				foreach ($element->getElementsByTagName('publisher') as $new) {
						$publishervalue = utf8_encode(htmlspecialchars($new->nodeValue)); }
						//$datevalue = "The date is not available";
				foreach ($element->getElementsByTagName('date') as $new) {
						$datevalue = utf8_encode(htmlspecialchars($new->nodeValue)); 
							/*if(empty($datevalue)){
								$datevalue = "None";
								echo"$datevalue";
								echo"<br />";
								}
							else{
								echo"$datevalue";
								echo"<br />";
							}*/
					}
						//$rightsvalue = "The right is not available";
				foreach ($element->getElementsByTagName('rights') as $new) {
						$rightsvalue = utf8_encode(htmlspecialchars($new->nodeValue)); }
			
			// Getting the image link and then the sizes of the images.
				//foreach ($element->getElementsByTagName('identifier') as $new) {
					//January 26 echo "{$link['oai_link']}<br />";
					//January 26 echo "{$link['itemid']}<br />";
					//January 26 echo"$new->nodeValue";
					//January 26 echo"<br />";

					//changes made on Febryary 25
					/*$img_identifier = $link['identifier'];
					$img_first_part = explode("-X-",$img_identifier);
					$img_identifier = $img_first_part['1'];
					$img_second_part = explode("%5D",$img_identifier);
					*/
					
					//echo $secondparts['1'];
					//if ( is_numeric($new->nodeValue) ) {
					/*$imglinkvalid = eregi("^[0-9_]+", $new->nodeValue);
					if ($imglinkvalid) {
						$imagevalue = $new->nodeValue;
						$imagevaluealtered = $imagevalue;
						$imagevaluetest = stripos($imagevalue, "_");
						if ($imagevaluetest !== false) {
							$imagevaluealtered = str_replace("_","-UND-",$imagevalue); 
						}*/
						
						//changes made on February 25
						/*
						$img_link = "http://dlxs.lib.wayne.edu/cgi/i/image/getimage-idx?viewid={$img_second_part['1']};cc={$link['collid']};entryid=x-{$img_second_part['0']};quality=mid;view=image";
						list($width, $height) = getimagesize($img_link);
						//January 26 echo"$img_link";
						//January 26 echo"<br />";
					*/
				//}
				
			} // Close foreach 'dc' as 'element'
						
				if ($counter == 1) {

					// 1. Overwrite slide1.xml with Title, Metadata, Image from the returned Metadata
					// 2. Save the media/image1.jpeg over the existing media/image1.jpeg
					// 3. Iterate the slide numbers
					
					/*****************************************************************************************/
					/* 1. Replace Title
					/*****************************************************************************************/
					
					//isolate the a:t element
					$slide_parts = $this->slide->getElementsByTagNameNS("http://schemas.openxmlformats.org/presentationml/2006/main", 'sp');
					$txbody = $slide_parts->item(0)->getElementsByTagNameNS("http://schemas.openxmlformats.org/presentationml/2006/main", 'txBody');
					$title_t = $txbody->item(0)->getElementsByTagNameNS("http://schemas.openxmlformats.org/drawingml/2006/main", 't');
				
					//replace the textnode inside it
					$title_text = $title_t->item(0)->firstChild;
					$title_text->replaceData(0, $title_text->length, $titlevalue);
					
					//isolate the a:ext element, and then set a new value for Cx and Cy
					// 1 px = 9525 EMUs

					$cxys = new domXPath($this->slide);
					$cxys->registerNameSpace('a', 'http://schemas.openxmlformats.org/presentationml/2006/main');
					$query = "//a:ext";
					$exts = $cxys->query($query);
			
					foreach ($exts as $ext){
						$ext->setAttribute("cx", $newWidth*9525);
						$ext->setAttribute("cy", $newHeight*9525);
					}
			
					/*****************************************************************************************/
					/* 2. Replace Metadata
					/*****************************************************************************************/
							
					//isolate the a:t elements and replace textnodes inside
					$txbody2 = $slide_parts->item(1)->getElementsByTagNameNS("http://schemas.openxmlformats.org/presentationml/2006/main", 'txBody');
					$mdta_ts = $txbody2->item(0)->getElementsByTagNameNS("http://schemas.openxmlformats.org/drawingml/2006/main", 't');
					
					$mdta_title_text = $mdta_ts->item(0)->firstChild;
					$mdta_title_text->replaceData(0, $mdta_title_text->length, $titlevalue);
					
					$mdta_date_text = $mdta_ts->item(1)->firstChild;
					$mdta_date_text->replaceData(0, $mdta_date_text->length, $datevalue);
										
					$mdta_publisher_text = $mdta_ts->item(2)->firstChild;
					$mdta_publisher_text->replaceData(0, $mdta_publisher_text->length, $publishervalue);
					
					$mdta_rights_text = $mdta_ts->item(3)->firstChild;
					$mdta_rights_text->replaceData(0, $mdta_rights_text->length, $rightsvalue);
					
				
					$this->slide->save("./tmp/tmp{$this->tempdirstamp}/ppt/slides/slide1.xml");
			
					/*****************************************************************************************/
					/* 3. Replace the Image
					/*****************************************************************************************/
					/*if($errorcheck == 1) {
					
					$img_error_localfile = "./tmp/tmp{$this->tempdirstamp}/ppt/media/image1.jpeg";
						copy($img_link, $img_error_localfile);
					}
					
					else {*/
					
					/*foreach ($element->getElementsByTagName('identifier') as $new) {
						$imglinkvalid = eregi("^[0-9_]+", $new->nodeValue);
					if ($imglinkvalid) {
						$imagevalue = $new->nodeValue;
						$imagevaluealtered = $imagevalue;
						$imagevaluetest = stripos($imagevalue, "_");
						if ($imagevaluetest !== false) {
						$imagevaluealtered = str_replace("_","-UND-",$imagevalue);

						}*/
						/*$img_identifier = $link['identifier'];
					$img_first_part = explode("-X-",$img_identifier);
					$img_identifier = $img_first_part['1'];
					$img_second_part = explode("%5D",$img_identifier);
						$img_link = "http://dlxs.lib.wayne.edu/cgi/i/image/getimage-idx?viewid={$img_second_part['1']};cc={$link['collid']};entryid=x-{$img_second_part['0']};quality=mid;view=image";*/
							$localfile = "./tmp/tmp{$this->tempdirstamp}/ppt/media/image1.jpeg";
							copy($img_link, $localfile);
						
					$this->slide_number++;
					$this->next_rId++;
					$this->slide_count++;
				
				} else {
			
					/*****************************************************************************************/
					/* 1. Replace Title for other slides
					/*****************************************************************************************/
					//isolate the a:t element
					$slide_parts = $this->slide->getElementsByTagNameNS("http://schemas.openxmlformats.org/presentationml/2006/main", 'sp');
					$txbody = $slide_parts->item(0)->getElementsByTagNameNS("http://schemas.openxmlformats.org/presentationml/2006/main", 'txBody');
					$title_t = $txbody->item(0)->getElementsByTagNameNS("http://schemas.openxmlformats.org/drawingml/2006/main", 't');
					
					//isolate the a:ext element, and then set a new value for Cx and Cy
					// 1 px = 9525 EMUs
	
					$cxys = new domXPath($this->slide);
					$cxys->registerNameSpace('a', 'http://schemas.openxmlformats.org/presentationml/2006/main');
					$query = "//a:ext";
					$exts = $cxys->query($query);
			
					foreach ($exts as $ext){
						$ext->setAttribute("cx", $newWidth*9525);
						$ext->setAttribute("cy", $newHeight*9525);
					}
				
					//replace the textnode inside it
					$title_text = $title_t->item(0)->firstChild;
					$title_text->replaceData(0, $title_text->length, $titlevalue);
			
					/*****************************************************************************************/
					/* 2. Replace Metadata for other slides
					/*****************************************************************************************/
							
					//isolate the a:t elements and replace textnodes inside
					$txbody2 = $slide_parts->item(1)->getElementsByTagNameNS("http://schemas.openxmlformats.org/presentationml/2006/main", 'txBody');
					$mdta_ts = $txbody2->item(0)->getElementsByTagNameNS("http://schemas.openxmlformats.org/drawingml/2006/main", 't');
					
					$mdta_title_text = $mdta_ts->item(0)->firstChild;
					$mdta_title_text->replaceData(0, $mdta_title_text->length, $titlevalue);
					
					$mdta_date_text = $mdta_ts->item(1)->firstChild;
					$mdta_date_text->replaceData(0, $mdta_date_text->length, $datevalue);
					
					$mdta_publisher_text = $mdta_ts->item(2)->firstChild;
					$mdta_publisher_text->replaceData(0, $mdta_publisher_text->length, $publishervalue);
					
					$mdta_rights_text = $mdta_ts->item(3)->firstChild;
					$mdta_rights_text->replaceData(0, $mdta_rights_text->length, $rightsvalue);
					
				
					$this->slide->save("./tmp/tmp{$this->tempdirstamp}/ppt/slides/slide{$this->slide_count}.xml");
			
					/*****************************************************************************************/
					/* 3. Download the Image
					/*****************************************************************************************/
				
					/*if($errorcheck == 1) {
					
					$localfile = "./tmp/tmp{$this->tempdirstamp}/ppt/media/image{$this->slide_count}.jpeg";
						copy($img_link, $localfile);
					}
					else {
										*/

					/*foreach ($element->getElementsByTagName('identifier') as $new) {
						$imglinkvalid = eregi("^[0-9_]+", $new->nodeValue);
					if ($imglinkvalid) {
						$imagevalue = $new->nodeValue;
						$imagevaluealtered = $imagevalue;
						$imagevaluetest = stripos($imagevalue, "_");
						if ($imagevaluetest !== false) {
						$imagevaluealtered = str_replace("_","-UND-",$imagevalue);

						}*/
						
					/*	$img_identifier = $link['identifier'];
					$img_first_part = explode("-X-",$img_identifier);
					$img_identifier = $img_first_part['1'];
					$img_second_part = explode("%5D",$img_identifier);
						$img_link = "http://dlxs.lib.wayne.edu/cgi/i/image/getimage-idx?viewid={$img_second_part['1']};cc={$link['collid']};entryid=x-{$img_second_part['0']};quality=mid;view=image";
						*/
							$localfile = "./tmp/tmp{$this->tempdirstamp}/ppt/media/image{$this->slide_count}.jpeg";
							copy($img_link, $localfile);
						
					/*****************************************************************************************/
					/* 4. Replace the Image Reference in slide#.xml.rels
					/*****************************************************************************************/
				
					$ximagepath = new domXPath($this->slide_relations);
					$ximagepath->registerNameSpace('r', 'http://schemas.openxmlformats.org/package/2006/relationships');
					$query = "//r:Relationship[@Type='http://schemas.openxmlformats.org/officeDocument/2006/relationships/image']";
					$relations = $ximagepath->query($query);
			
					foreach ($relations as $relation){
						$relation->setAttribute("Target", "../media/image{$this->slide_count}.jpeg");
					}
					
					$this->slide_relations->save("./tmp/tmp{$this->tempdirstamp}/ppt/slides/_rels/slide{$this->slide_count}.xml.rels"); 
							
					/************************************************/
					/* 5. Claim a new part in [Content_Types].xml 
					/************************************************/
					$types = $this->contents->getElementsByTagName('Types')->item(0);
				
					$node = $this->contents->createElement("Override");
					$newnode = $types->appendChild($node);
				
					$newnode->setAttribute("PartName", "/ppt/slides/slide{$this->slide_count}.xml");
					$newnode->setAttribute("ContentType", "application/vnd.openxmlformats-officedocument.presentationml.slide+xml");
				
					//echo $this->contents->saveXML();
					$this->contents->save("./tmp/tmp{$this->tempdirstamp}/[Content_Types].xml");
			
					/******************************************************************************************/
					/* 6.Add sld to presentation.xml. Use this->slide_number and this->next_rId
					/******************************************************************************************/
			
					$slides_list = $this->presentation->getElementsByTagNameNS("http://schemas.openxmlformats.org/presentationml/2006/main", 'sldIdLst')->item(0);
					$id_node = $this->presentation->createElementNS("http://schemas.openxmlformats.org/presentationml/2006/main", "sldId");
					$slides_list->appendChild($id_node);
				
					$id_node->setAttribute("id", "$this->slide_number");
					$id_node->setAttributeNS("http://schemas.openxmlformats.org/officeDocument/2006/relationships", "id", "rId{$this->next_rId}");
				
					$this->presentation->save("./tmp/tmp{$this->tempdirstamp}/ppt/presentation.xml");
				
					/******************************************************************************************/
					/* 7.Add sld to presentation.xml.rels Use this->slide_count and this->next_rId
					/******************************************************************************************/
			
					$relationships = $this->presentation_relations->getElementsByTagName('Relationships')->item(0);
				
					$node = $this->presentation_relations->createElement("Relationship");
					$newnode = $relationships->appendChild($node);
				
					$newnode->setAttribute("Id", "rId{$this->next_rId}");
					$newnode->setAttribute("Type", "http://schemas.openxmlformats.org/officeDocument/2006/relationships/slide");
					$newnode->setAttribute("Target", "slides/slide{$this->slide_count}.xml");
				
					//echo $this->contents->saveXML();
					$this->presentation_relations->save("./tmp/tmp{$this->tempdirstamp}/ppt/_rels/presentation.xml.rels");
					
					/*****************************************************************************************/
					/* Iterate the slide numbers
					/*****************************************************************************************/
					$this->slide_number++;
					$this->next_rId++;
					$this->slide_count++;
					
				}
			
			// Put closing bracket back in
			$counter++; // FOR TESTING: echo($counter);
		}
	
		// zip the contents of the tempdirstamp directory and make it a powerpoint file.
		exec("cd tmp/tmp{$this->tempdirstamp}; zip -r ../../zips/{$this->tempdirstamp}.pptx *");
		
		// delete the tmp/tmptempdirstamp directory
		exec("cd tmp; rm -rf tmp{$this->tempdirstamp}");
		
	} // END function make_slides()
	
} // END class ppt_slides()

?>