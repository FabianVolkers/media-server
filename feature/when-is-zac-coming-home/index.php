<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Font Awesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./css/main.css">



    </head>
    <body>
<main>
  <section id="countdown-section">
    <h1 id="title">WhenIsZacComingHome.com</h1>
    <p id="location"></p>
    <p id="countdown"></p>
    <p id="date"></p>
    <hr>
    <ul id="upcoming"></ul>
        <ul>
    <?php
    echo "Hello World!";
    $dataFile = fopen("js/data.json", "r") or die ("Unable to open file");
    $json = file_get_contents("js/data.json");
    $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($json, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);
    /*
    foreach ($jsonIterator as $key => $val) {
        if(is_array($val)) {
            echo "<li><b>" . $val["city"] . "</b>  " . $val["date"] . "</li>";
        } else {
            //echo "$key => $val\n";
        }
    }
    echo fread(dataFile, filesize("data.json"));
    fclose($dataFile);
    */
    $json_a = json_decode($json, TRUE);
    foreach($json_a as $value) {
        echo strtotime($value["date"]);
        if(strtotime($value["date"]) > date()){
            echo "<li><b>" . $value["city"] . "</b>  " . $value["date"] . "</li>";
        }
    }
    /*
    for ($i = 0; $i < count($json_a); $i++){
        if(strtotime($json[$i]["date"]) > date()){
            echo 
        }
    }
    */
    ?>
    </ul>
    <form id="add-destination">
      <input id="new-city" type="text" required>
      <input id="new-date" type="date" required>
      <input id="new-flights" type="text" required>
      <input type="submit" href="">
    </form>
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