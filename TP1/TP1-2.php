<HTML><BODY>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
$ipUn = explode('.', $ip)[0];
if ($ipUn<128){
    $classe = "A";
}
else if ($ipUn<193){
    $classe = "B";
}
else{
    $classe = "C";
}
print "Adresse: $ip (classe $classe)<p>";
?>
</BODY></HTML>