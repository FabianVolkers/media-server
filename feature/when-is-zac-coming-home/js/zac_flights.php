<html>

<body>
    <?php
    $PASSWORD = "Summer2019!";

        if($_POST["password"] != $PASSWORD){
          echo "<h1>Invalid Password, please try again</h2>";
          echo "<a href='../../'>return?</a>";
        } else {
        $file = file_get_contents("data.json");
        $destinations = json_decode($file, TRUE);

        $city = $_POST['new-city'];
        $date = strToTime($_POST["new-date"]);
        $flights = explode(",", $_POST["new-flights"]);

        $destinationArray = array("city" => $city, "date" => $date, "flights" => $flights);

        array_push($destinations, $destinationArray);

        function cmp($a, $b)
        {
          //print_r($a);
          $date_a = $a["date"];
          $date_b = $b["date"];
            if ($date_a == $date_b) {
                return 0;
            }
            return ($date_a < $date_b) ? -1 : 1;
        }

        uasort($destinations, 'cmp');
        $result = file_put_contents('data.json', json_encode($destinations));
        if ($result != FALSE){
          echo "<h1>Submission successful</h1>";
          print_r($destinationArray);
          echo "<a href='../../'>return?</a>";
        }
      }
      ?>
</body>

</html>