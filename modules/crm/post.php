<?php
echo time();
echo "\n\n".substr($_POST['businesses'],0,255);
//print_r($_GET);

function webiz_crm_urlencode($string) {
    $entities = array('%25', '%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F',  '%23', '%5B', '%5D');
    $replacements = array("%",'!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?",  "#", "[", "]");
    return str_replace($replacements, $entities,  $string);
}

$test = 'opensea & navigation co.,th';


echo webiz_crm_urlencode($test);


