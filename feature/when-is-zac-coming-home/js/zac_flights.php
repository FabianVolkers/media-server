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
          //echo $b["date"] . " from arr \n";
          var_dump($b);
          $date_b = $b["date"];
          //echo $date_b . "\n";
            if ($date_a == $date_b) {
                return 0;
            }
            return ($date_a < $date_b) ? -1 : 1;
        }

        uasort($destinations, 'cmp');
        //print_r($destinations);
        $result = file_put_contents('data.json', json_encode($destinations));
        if ($result != FALSE){
          echo "<h1>Submission successfull</h1>";
          echo "<a href='../../'>return?</a>";
        }
      }
      ?>
</body>

</html>