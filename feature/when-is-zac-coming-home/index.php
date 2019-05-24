<!DOCTYPE html>
<meta charset="UTF-8">
<html>

<head>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- Font Awesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

  <main>
  <section id="countdown-section">
    <h1 id="title">Where is Zac right now?</h1>
    <hr>
    <div id="wrapper">
      
        <div id="current-div">
          <h1 id="location"></h1>
          <hr>
          <div id="map-div">
            <!--map iframe is being set by function calculatePosition in zac.js-->
          </div>
        </div>

        <div id="upcoming-div">
          <h1 id="upcoming-h1">Upcoming Destinations</h1>
          <hr>
          <h2 id="countdown"></h2>

          <ul id="upcoming-php">
            <?php
    date_default_timezone_set('Europe/Berlin');
    $json = file_get_contents("data/data.json");
    $json_a = json_decode($json, TRUE);
    $counter = 0;
    foreach($json_a as $value) {
      // find current destination
        if($value["date"] < strtotime(date("Y-m-d"))){
          $currentDest = $value;
        }
        //Find all upcoming dates
        if($value["date"] > strtotime(date("Y-m-d"))){
            if($counter == 0){
                $counter++;
                
                echo "<div class='hidden'><div id='current-city'>" . $currentDest["city"] . "</div>";
                echo "<div id='current-date'>" . date("l, j F Y",$currentDest["date"]) . "</div>";
                echo "<div id='current-flights'>" . $currentDest["flights"] . "</div>";
                echo "<div id='next-city'>" . $value["city"] . "</div>";
                echo "<div id='next-date'>" . date("l, j F Y",$value["date"]) . "</div>";
                echo "<div id='next-flights'>" . $value["flights"] . "</div></div>";
            }
              echo "<li><b>" . $value["city"] . "</b>  " . date("l, j F Y",$value["date"]) . "</li>";  
        }
    }
    ?>
          </ul>

          <form id="add-destination" action="js/zac_flights.php/" method="post">
          <div>
            <label for="new-city">City</label>
            <input id="new-city" name="new-city" type="text" required>
  </div><div>
            <label for="new-date">Date</label>
            <input id="new-date" name="new-date" type="date" required>
  </div><div>
            <label for="new-flights">Flight Number(s)</label>
            <input id="new-flights" name="new-flights" type="text">
  </div><div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
  </div>
            <input type="submit" href="#">
          </form>
          <form id="form-toggle">
            <input id="form-toggle-btn" type="button" value="Log In" onclick="toggleForm();">
          </form>
        </div>
    </div>
    
    </section>
    <footer>
      <hr>
      <?php

$counter_name = "../../data/when-is-zac-coming-home/counter.txt";

// Check if a text file exists.
// If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
$f = fopen($counter_name, "w");
fwrite($f,"0");
fclose($f);
}

// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);

// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
$_SESSION['hasVisited']="yes";
$counterVal++;
$f = fopen($counter_name, "w");
fwrite($f, $counterVal);
fclose($f);
}
$counterVal = sprintf("%05d", $counterVal);
echo "<p>You are visitor number " . $counterVal . " to this site</p>";

?>
      <p>Written and coded by <a href="https://fabianvolkers.com/" target="_blank">Fabian Volkers</a> 2019</p>
    </footer>
  </main>
</body>
<!-- JS -->
<script src="js/zac.js"></script>
<!--<script src="./data/data.json"></script>-->

</html>