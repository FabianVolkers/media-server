<html>

<body>
    <?php
        $myFile = fopen("data.json", "a") or die ("Unable to open file");
        $file = file_get_contents("data.json");
        $data = json_decode($file);
        $city = "City";
        $city = $_POST["new-city"];
        $date = "Date";
        $date = strToTime($_POST["new-date"]);
        $flights = "Flights";
        echo $city;
        echo $date;
        $data[count($data)]["city"] = $city;
        $data[count($data)]["date"] = $date;
        $data[count($data)]["flights"] = $flights;
        $city = $_POST["new-city"];
        
        echo $_POST["new-date"];
        echo $_POST["new-flights"];
        $destinationObject = "{'city' : " . $city . ",'date' : ". $date . "},";
        file_put_contents('data.json',json_encode($data));
        fclose($myFile);
      ?>
</body>

</html>