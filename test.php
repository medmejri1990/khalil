<?php
function createXMLfile ($array) {

	$filepath="file.xml";
	$dom = new DOMDocument ('1.0','utf-8');
	$root= $dom->createElement('documents');

	for ($i=0; $i<count($array);$i++) {

		$titre = $array[$i]['titre'];
		$description = $array[$i]['description'];
		
		$document = $dom->createElement('document');
		
		$document->setAttribute('id','1');	
		$titre = $dom->createElement('titre',$titre);
		$description = $dom->createElement('description',$description);
		
		$document->appendChild($titre);
		$document->appendChild($description);
		
		$root->appendChild($document);
	}
	$dom->appendChild($root);
	$dom->save($filepath);
}

require("connect.php");
$conn = connect_bd();
$sql = "SELECT * FROM document";
if (!$conn->query($sql)) echo "problm acces au doc";
else {
	  $array = [];
      foreach ($conn->query($sql) as $row) {
		array_push($array,$row) ;	 
	  }
  }

$result = createXMLfile($array);
?>
