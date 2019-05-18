<html>
    <body>
<?php
echo "Hello World!";
$dataFile = fopen("data.json", "r") or die ("Unable to open file");
echo fread(dataFile, filesize("data.json"));
fclose($dataFile);
?>
</body>
</html>