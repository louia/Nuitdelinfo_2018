<?php

$beginDate = $_POST['beginYear'] . "-" . $_POST['beginMonth'] . "-" . $_POST['beginDay'];
$beginHour = "";
$endDate = "";
$endHour = "";

if(isset($_POST['endYear']) && isset($_POST['endMonth']) && isset($_POST['endDay'])) {
  if($_POST['endHour'] != "" && $_POST['endMinute'] != "") {
    $endHour = "T" . $_POST['endHour'] . ":" . $_POST['endMinute'] . ":00+00:00";
  }
  $endDate = $_POST['endYear'] . "-" . $_POST['endMonth'] . "-" . $_POST['endDay'];
}

if($_POST['beginHour'] != "" && $_POST['beginMinute'] != "") {
  $beginHour = "T" . $_POST['beginHour'] . ":" . $_POST['beginMinute'] . ":00+00:00";
}

$myFile = "calendar.json";
  $arr_data = array(); // create empty array

 try
 {
   if(isset($_POST['endYear']) && isset($_POST['endMonth']) && isset($_POST['endDay'])) {
     $formdata = array(
        'title'=> $_POST['title'],
        'start'=> $beginDate . $beginHour,
        'end'=> $endDate . $endHour
     );
   }
   else {
     $formdata = array(
        'title'=> $_POST['title'],
        'start'=> $beginDate . $beginHour
     );
   }

    //Get data from existing json file
    $jsondata = file_get_contents($myFile);

    // converts json data into array
    $arr_data = json_decode($jsondata, true);

    // Push user data to array
    array_push($arr_data,$formdata);

      //Convert updated array to JSON
    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

    //write json data into data.json file
    if(file_put_contents($myFile, $jsondata)) {
         echo 'Data successfully saved';
     }
    else {
      echo "error";
    }
    header('Location: calendar.php');
    exit();

  }
  catch (Exception $e) {
           echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
