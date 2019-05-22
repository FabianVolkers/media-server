
// Map constants and location calculation
const DESTINATIONS = {
  "Berlin" : {
    "name" : "Berlin",
    "lat": 52.5173278245712,
    "lon": 13.388859900000057
  },
  "Perth" : {
    "name": "Perth",
    "lat": -31.953318351466255,
    "lon": 115.85797280073166
  },
  "Gili" : {
    "name": "Gili",
    "lat": -8.357619621234008,
    "lon": 116.08123739999996
  },
  "Newman" : {
    "name": "Work",
    "lat": -23.3207662,
    "lon": 119.7566597
  }
  
}


// update array, leave last destination at first index
function updateDest(arr){
  now = new Date().getTime;
  console.log(arr[1][1]);
  if(arr[1][1] < now){
    arr.shift();
  }
  
}

//updateDest(arrivals);
//setInterval(updateDest, 86400000, arrivals);
//console.log(arrivals);

function calculatePostion(city) {
  minLon = city.lon - 18;
  minLat = city.lat - 10;
  maxLon = city.lon + 18;
  maxLat = city.lat + 10;
  console.log(minLon);
  document.getElementById("map-div").innerHTML = `<iframe id='map' frameborder='0' marginheight='0' marginwidth='0' src='https://www.openstreetmap.org/export/embed.html?bbox=${minLon}%2C${minLat}%2C${maxLon}%2C${maxLat}&amp;layer=mapnik&amp;marker=${city.lat}%2C${city.lon}'></iframe>`
}

let current = {};
current.city = document.getElementById("current-city").innerHTML;
current.date = document.getElementById("current-date").innerHTML;
let next = {};
next.city = document.getElementById("next-city").innerHTML;
next.date = new Date(document.getElementById("next-date").innerHTML);
console.log(next.date);
let currPosition = DESTINATIONS[current.city];
let nextPosition = DESTINATIONS[next.city];
console.log(current + next);
calculatePostion(currPosition);

let preposition = "in"
if (currPosition.name == "Work"){
  preposition = "at";
} else if (currPosition.name == "Plane") {
  preposition = "en route to";
}
document.getElementById("location").innerHTML = `Zac is ${preposition} ${currPosition.name}`

// Set the date we're counting down to
var countDownDate = next.date;

var date = next.date;

function countDown(date, location, elementID){
  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = date - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById(elementID).innerHTML = location + ": " + days + " days " + hours + " hours "
  + minutes + " minutes " + seconds + " seconds ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById(elementID).innerHTML = `Zac has arrived in ${location}`;
  }
}
document.getElementById("date").innerHTML = date.toDateString();
// Call countDown function and update the count down every 1000 milliseconds (1s)
var x = setInterval(countDown, 1000, countDownDate, nextPosition.name, "countdown");

