<?php

$document = new DOMDocument();
$document->load("TP6.xml");
echo "Liste des pays : ".$document->saveXML();
echo "<br/> Liste des pays Européens : ".$document->saveXML($document->getElementsByTagName("europe")->item(0));

?>