<html>

<body>
    <?php
    $pswd = "Summer2019!";
    $PASSWORD = password_hash($pswd, PASSWORD_DEFAULT);
        if(password_verify($_POST["password"], $PASSWORD)) {
        $file = file_get_contents("../../../data/when-is-zac-coming-home/data.json");
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
        $result = file_put_contents('../../../data/when-is-zac-coming-home/data.json', json_encode($destinations));
        if ($result != FALSE){
          echo "<h1>Submission successful</h1>";
          echo "<h3>" . $destinationArray["city"] . "</h3>";
          echo "<h3>" . date('l, j F Y', $destinationArray["date"]) . "</h3>";
          echo "<a href='../../'>return?</a>";
        }
      } else {
        echo "<h1>Invalid Password, please try again</h2>";
        echo "<a href='../../'>return?</a>";
      } 
      ?>
</body>

</html>