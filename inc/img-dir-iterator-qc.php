<?php
$file_path = $_SERVER["DOCUMENT_ROOT"] . "/inc/quickchoice.php";
$content = file_get_contents($file_path);
        $DOM = new DOMDocument();
	$DOM->loadHTML($content);
        $DOM->saveHTML();
        $books = $DOM->find('div.qc-styles');
foreach ($books as $book) {
    echo $book->nodeValue, PHP_EOL;
}
// $divs = $content->getElementsByTagName('div'); 
// echo json_encode($divs);

?>