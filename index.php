<html>
<head>
<title>Solop og -nedgang</title>

<?php

//datoformater som bruger nedad igennem programmet.

$date = new DateTime;
$now = $date->format("Y-m-d");
$time = $date->format("H-m");
$year = $date->format("Y");
$week = $date->format("W");

//beregner datoen på ugens sidste dag.
function getWeekEndDate($week, $year)
  {
    $dateTime = new DateTime();
    $dateTime->setISODate($year, $week);
    $start_result['start_date'] = $dateTime->format('Y-m-d');
    $dateTime->modify('+6 days');
    $end_result = $dateTime->format('Y-m-d');
    return $end_result;
  }
  $dates=getWeekEndDate($week,$year);
?>

<h2>
Solopgang og Solnedgang i Kolding og København i uge <?php echo "$week" ?>
<h2>
</head>
<body>
<h3>
Vælg din by
<h3>
<!-- //selectbox som opdaterer siden når en by er valgt. -->
<form>
    <select name="city" onchange="this.form.submit()">
        <option value="" disabled selected>--select--</option>
        <option value="Kolding">Kolding</option>
        <option value="København">København</option>
    </select>
</form>
<?php
   if(isset($_GET["city"])){
       $city=$_GET["city"];
       echo $city;
   }
?>
<br>
<!-- dynamisk datapicker som er afgrænset til at dagsdato og resterende påbegyndte uge -->
<h3>
<input type="date" id="start" name="trip-start"
       value="<?php echo $now ?>"
       min="<?php echo $now ?>" max="<?php echo $dates ?>">



<?php
//Switch case som bruges til at skifte koordinaterne mellem byerne, denne vil udvides med flere byer
//Der er ikke taget højde for sommer og vintertid i denne præsentation.
  switch ($city) {
    case "Kolding":
      echo 'Solen står op kl. ' .date_sunrise(time(), SUNFUNCS_RET_STRING, 55.4960, 9.4731, 90, 2);
      echo ' og solen går ned kl.' .date_sunset(time(), SUNFUNCS_RET_STRING, 55.4960, 9.4731, 90, 2);
        break;
    case "København":
      echo 'Solen står op kl. ' .date_sunrise(time(), SUNFUNCS_RET_STRING, 55.6761, 12.5683, 90, 2);
      echo ' og solen går ned kl.' .date_sunset(time(), SUNFUNCS_RET_STRING, 55.6761, 12.5683, 90, 2);
        break;
  }


?>
<h3>

</body>
</html>
