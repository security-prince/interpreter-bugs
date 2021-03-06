<?php
/*
 If this test is failing it is because the libxml2 library being used does
 not have this bug fix from 2009:

   https://github.com/GNOME/libxml2/commit/f3c06692e0d200ae0d35b5b3c31de8c56aa99ac6

 The workaround if you are being hit by this is to add a <!DOCTYPE html> tag
*/
$html = <<<HTML
<span>hi there</span>
HTML;

$text = '<p>hello world &trade;</p>';

$dom = new DOMDocument('1.0', 'UTF-8');
$dom->loadHTML($html);

$node = $dom->getElementById('test');
var_dump($node->textContent);
$node->textContent = $text;
var_dump($node->textContent == $text);

var_dump($dom->saveHTML($node));

?>
