<?php
include 'html_dom.php';
include 'functions.php';
$lookup = filter_input( INPUT_GET, 'netid', FILTER_SANITIZE_URL );
$crawlMe = get_final_url('http://info.iastate.edu/individuals/search/'.$lookup.'@iastate.edu');
//$crawlMe = get_final_url('http://info.iastate.edu/individuals/search/jzirk@iastate.edu');
$html = file_get_html($crawlMe);

/*This is where all the fun stuff is*/
$e = $html->find("div", 18);
$f = $e->plaintext;

$splitInput = preg_split('/(?=\d)/', $f, 2);
$one = $splitInput[0];
$two = $splitInput[1];
/*Add spaces before capital letters*/
$one = preg_replace('/(?<!\ )[A-Z]/', ' $0', $one);

$d .= $one;
$d .= $two;

$d = trim(strip_tags($d));
printf($d);
?>