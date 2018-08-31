<?php
require '../gapi.class.php';
define('ga_profile_id','profile_id');

$ga = new gapi("XXXXXXXX@XXXXXXXXXX.iam.gserviceaccount.com", "key.p12");

$ga->requestReportData(ga_profile_id, array('userType'), array('pageviews','visits'), null, null, '7daysAgo', 'yesterday');

//print_r($ga->getResults());
echo $ga->getVisits();
?>