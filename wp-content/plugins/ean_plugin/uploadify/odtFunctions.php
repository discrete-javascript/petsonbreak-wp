<?php
function extracttext($filename) {
	$ext = explode(".", $filename);
	$ext = end($ext);
	//if its docx file
	if($ext == 'docx')
	$dataFile = "word/document.xml";
	else
	$dataFile = "content.xml";     

	$zip = new ZipArchive;

	// Open the archive file
	if (true === $zip->open($filename)) {
		if (($index = $zip->locateName($dataFile)) !== false) {
			$text = $zip->getFromIndex($index);
			$xml = new DOMDocument();
			$xml->loadXML($text, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
			return strip_tags($xml->saveXML());
		}
		$zip->close();
	}
	return '0';
}

?>