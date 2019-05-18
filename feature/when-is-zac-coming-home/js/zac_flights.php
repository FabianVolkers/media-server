<html>

<body>
    <?php
        $myFile = fopen("data.json", "a") or die ("Unable to open file");
        $file = file_get_contents("data.json");
        $data = json_decode($file);
        $city = $_POST["new-city"];
        $city = "Berlin";
        echo $city;
        $data[count($data)]["city"] = $city;
        $city = $_POST["new-city"];
        $date = strToTime(POST["new-date"]);
        echo $_POST["new-date"];
        echo $_POST["new-flights"];
        $destinationObject = "{'city' : " . $city . ",'date' : ". $date . "},";
        file_put_contents('data.json',json_encode($data));
        fclose($myFile);
      ?>
</body>

</html>