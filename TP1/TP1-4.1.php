<HTML><BODY>
<?php
$file = fopen("countVisits.txt", "r+");
$contStr = fgets($file);
fclose($file);
$count = intval($contStr);
$count ++;
print "Nombres de visites : $count <p>";
$file = fopen("countVisits.txt", "w");
fputs($file, "$count");
fclose($file);
?>
</BODY></HTML>
