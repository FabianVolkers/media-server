<html>

<body>
    <?php
        $myFile = fopen("data.json", "a") or die ("Unable to open file");
        $city = $_POST["new-city"];
        $date = strToTime(POST["new-date"]);
        echo $_POST["new-date"];
        echo $_POST["new-flights"];
        $destinationObject = "{'city' : " . $city . ",'date' : ". $date . "},";
        fwrite($myFile, $destinationObject);
        fclose($myFile);
      ?>
</body>

</html>