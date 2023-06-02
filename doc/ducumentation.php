<?php

 echo "Page d'exemple xml";

$xml = file_get_contents('site.xml');

$xml_parse = simplexml_load_string($xml);

echo "<pre>";print_r($xml_parse);echo"</pre>";

// foreach($xml_parse as $i=>$u)
// {
//     echo "<pre>";print_r($u);echo"</pre>";
// }
?>