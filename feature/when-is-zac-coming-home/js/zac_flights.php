<html>
    <body>
<?php
        $myFile = fopen("data.json", "a") or die ("Unable to open file");
        $city = POST["new-city"];
        $date = strToTime(POST["new-date"]);
        echo POST["new-date"];
        echo POST["new-flights"];
        $destinationObject = "{'city' : " . $city . ",'date' : ". $date . "},";
        fwrite($myFile, $destinationObject);
      ?>
</body>
</html>