<!DOCTYPE html>
<html>
<head>
	<title>Sami</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/materialForm.css">
    <script src="./js/jquery-2.1.0.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/calendar.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAU3XOPaAGyJzmNRAggy0mA167K06Cs4k">
    </script>
</head>
<body>
<style type="text/css">
.nav{
	background-color: green;
	min-height: 70px;
	text-align: center;
	opacity: 1;
}
/* for demo */
.cal {
  position: fixed;
  width: 200px;
  height: 300px;
  background: #FFF;
  margin: 1em auto;
  border: 4px solid #E2E2E2;
  box-shadow: 0 10px 9px -6px #C5C5C5;
  border-top-width: 25px;
  border-bottom-width: 32px;
  border-radius: 8px;
  overflow: hidden;
  z-index: 1000000000000000;
  margin-left: 50px;
  margin-top: 80px;
}
div#calendar {
  margin: 0;
  padding: 0;
  display: block;
  width: 100%;
  height: 100%;
  background: #F3F3F3;
}
table {
  width: 100%;
  font-family: sans-serif;
  border-collapse: separate;
  border-spacing: 0;
}
.head_cal {
  background: #FFF;
  text-align: center;
  color: #85BAFF;
  text-transform: uppercase;
}
.subhead_cal {
  background: #85BAFF;
  color: #FFF;
  font-size: 1.2rem;
  line-height: 2rem;
}
.week_cal {
  background: #FFF;
  color: black;
  font-size: 0.5em;
  line-height: 2rem;
}
.white_cal {
  background: #ECECEC!important;
}
tbody.days_cal tr td a {
  padding: 0;
  text-decoration: none;
  background: #FFF;
  color: #888;
  height: 30px;
  display: block;
}
tbody.days_cal tr td {
  padding: 0;
  margin: 0;
  border: 1px solid #ECECEC;
  text-align: center;
  width: 14.28571428571429%;
  height: auto;
}
.event {
  color: #85BAFF !important;
  transition: all 0.3s ease;
}
.today_cal.event {
  background: #FF8D8D !important;
  color: #FFF !important;
  transition: all 0.3s ease;
}
.today_cal.event:hover,
  .event:hover{
  opacity:0.5;
  transition: all 0.3s ease;
}
.week_event {
  color: #85BAFF;
}
#calendar_data {
  margin: 0;
  padding: 0;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #FFF;
  color: #C5C5C5;
  opacity:0;
  visibility:hidden;
  transform: scale(0,0);
  transition: all 0.8s ease;
}

#calendar_data h3 {
  text-align: center;
  font-size: 20px;
  padding: 5px 10px;
  margin: 0;
  background: #F2F2F2;
  color: #43AEEF;
  border-bottom: 1px solid #DFDFDF;
  text-transform: capitalize;
}
#calendar_data  dl {
  padding: 0.5em;
  margin-left: 0;
  display: block;
  height: calc(100% - 4rem);
}
#calendar_data  dt {
  float: left;
  clear: left;
  width: 5rem;
  text-align: left;
  font-size: 0.8rem;
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  font-weight: 300;
  color: #43B0EF;
  background: #FFF;
  padding: 0.2rem;
}
#calendar_data  dd {
  margin: 0 0 1rem 5rem;
  padding: 0 0.5rem 0.5rem 0.5rem;
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  font-size: 0.8rem;
  line-height: 1.2rem;
  color: #ADADAD;
  border-bottom: 1px solid #EAEAEA;
}
#calendar_data dd:last-child {
border: none;
}

#calendar_data a:not(.hideEvent) {
  color: #43AEEF;
  border: 0.1rem solid #43AEEF;
  padding: 0.2rem 1rem;
  text-decoration: none;
}
.show_data{
  opacity: 1 !important;
  visibility: visible !important;
  transform: scale(1, 1) !important;
  transition: all 0.2s ease;
}

.hideEvent {
  position: absolute;
  right: 0;
  top: 0;
  font-size: 2rem;
  font-family: sans-serif;
  font-weight: 300;
  text-align: center;
  text-decoration: none;
  width: 2rem;
  height: 2rem;
  line-height: 2rem;
  background: #F2F2F2;
  border-left: 0.1rem solid #E5E5E5;
  color: #D3D3D3 !important;
}
.hideEvent:hover{
  text-decoration:none;
  color:#f55;
}

       #map {
       	position: absolute;
        height: 100%;
        width: 100%;
        z-index: 10000000;
       }


</style>
<nav class="navbar nav">
	<a href="#" onclick="mark()">Культурный Томск</a><input type="text" placeholder="Latitude" id="lat" value="9.877" /> Longitude :
<input type="text" placeholder="Longitude" id="lng" value="79.694" />
<button type="button" id="addMarkerBtnId">Add Marker</button>

</nav>
<div class="cal">
  <div id="calendar"></div>
  <div id="calendar_data"></div>
</div>
<div id="map"></div>

<div class="info_event"></div>
<script type="text/javascript">
    // Start
_('#calendar').innerHTML = calendar();

// short queySelector
function _(s) {
  return document.querySelector(s);
}






// show info
function showInfo(event) {
  alert(event);
}
// toggle event show or hide
function hideEvent(){
    _('#calendar_data').classList.toggle('show_data');
}

// simple calendar
function calendar() {
  // show info on init
  //showInfo();
  
  // vars
  var day_of_week = new Array(
    'Sun', 'Mon', 'Tue',
    'Wed', 'Thu', 'Fri', 'Sat'),
      month_of_year = new Array(
        'January', 'February', 'March',
        'April', 'May', 'June', 'July',
        'August', 'September', 'October',
        'November', 'December'),
      
      Calendar = new Date(),
      year = Calendar.getYear(),
      month = Calendar.getMonth(),
      today = Calendar.getDate(),
      weekday = Calendar.getDay(),
      html = '';
  
  // start in 1 and this month
  Calendar.setDate(1);
  Calendar.setMonth(month);
  
  // template calendar
  html = '<table>';
  // head
  html += '<thead>';
  html += '<tr class="head_cal"><th colspan="7">' + month_of_year[month] + '</th></tr>';
  html += '<tr class="subhead_cal"><th colspan="7">' + Calendar.getFullYear() + '</th></tr>';
  html += '<tr class="week_cal">';
  for (index = 0; index < 7; index++) {
    if (weekday == index) {
      html += '<th class="week_event">' + day_of_week[index] + '</th>';
    } else {
      html += '<th>' + day_of_week[index] + '</th>';
    }
  }
  html += '</tr>';
  html += '</thead>';
  
  // body
  html += '<tbody class="days_cal">';
  html += '</tr>';
  
  
  // white zone
  for (index = 0; index < Calendar.getDay(); index++) {
    html += '<td class="white_cal"> </td>';
  }
  
  
  
  for (index = 0; index < 31; index++) {
    if (Calendar.getDate() > index) {
      
      week_day = Calendar.getDay();
      
      if (week_day === 0) {
        html += '</tr>';
      }
      if (week_day !== 7) {
        // this day
        var day = Calendar.getDate();
        var info = (Calendar.getMonth() + 1) + '.' + day + '.' + 
        Calendar.getFullYear();
        
        if (today === Calendar.getDate()) {
          html += '<td><a class="today_cal" href="#" data-id="' + 
          info + '" onclick="return showInfo(\'' + 
          info + '\')">' +
          day + '</a></td>';
          
          //showInfo(info);
          
        } else {
          html += '<td><a href="#" data-id="' + 
          info + '" onclick="return showInfo(\'' + 
          info + '\')">' +
          day + '</a></td>';
        }
        
      }
      
      
      if (week_day == 7) {
        html += '</tr>';
      }
      
      
    }
    
    
    Calendar.setDate(Calendar.getDate() + 1);
    
  } // end for loop
  return html;
}
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: {
      lat: 56.4648896,
      lng: 84.9662876
    }
  });

  var myLatLng = {
    lat: 9.8,
    lng: 79.9
  };
  //adding a marker
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map
  });
  google.maps.event.addDomListener(document.getElementById('addMarkerBtnId'), 'click', function(evt) {
    var marker = new google.maps.Marker({
      position: {
        lat: parseFloat(document.getElementById('lat').value),
        lng: parseFloat(document.getElementById('lng').value)
      },
      map: map
    });
  });
}
google.maps.event.addDomListener(window, 'load', initMap);
</script>
</body>
</html>