<HTML><BODY>
<?php
$nbFichUp = $_POST['nbUp'];
print('<FORM ENCTYPE="multipart/form-data" ACTION="upload.php" METHOD="POST">');
print("<input type=hidden name=nbphotos value=$nbFichUp>");
for ($i=1;$i<=$nbFichUp;$i++){
    print('<input type=file name="');
    print("photo$i");
    print('">');
}
print('<input type=submit value="Télécharger Photos">');
print("</FORM>");


?>
</BODY></HTML>