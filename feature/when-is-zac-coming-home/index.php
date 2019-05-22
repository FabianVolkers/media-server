<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Font Awesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/main.css">



    </head>
    <body>
    
<main>
  <section id="countdown-section">
    <h1 id="title">WhenIsZacComingHome.com</h1>
    <p id="location"></p>
    <p id="countdown"></p>
    <p id="date"></p>
    <hr>
    <div id="upcoming-div">
  <h2>Upcoming Destinations</h2>
        <ul id="upcoming-php">
    <?php
    $json = file_get_contents("js/data.json");
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

                
            } else {
                echo "<li><b>" . $value["city"] . "</b>  " . date("l, j F Y",$value["date"]) . "</li>";
            }
        }
    }
    ?>
    </ul>
  </div>
  <!-- comment out form to deploy new look. For will be integrated to production version later 
    <form id="add-destination" action="js/zac_flights.php/" method="post">
    <label for="new-city">City</label>
      <input id="new-city" name="new-city" type="text" required>
      <label for="new-date">Date</label>
      <input id="new-date" name="new-date" type="date" required>
      <label for="new-flights">Flight Number(s)</label>
      <input id="new-flights" name="new-flights" type="text">
      <input type="submit" href="#">
    </form>
  -->
  </section>
  <section id="map-section">
<div id="map-div"><!--map iframe is being set by function calculatePosition in zac.js--></div>
  </section>
  <footer>
  <hr>
  <p>Alle Angaben sind wie immer ohne Gewähr</p>
  <p>Written and coded by Fabian Volkers 2019</p>
</footer>
</main>
</body>
<!-- JS -->
<script src="js/zac.js"></script>
<!--<script src="./js/data.json"></script>-->
</html>