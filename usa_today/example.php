<?php

require('usa_today.php');

// Create new object
$census = new USA_Today_Census('YOUR-API-KEY-HERE');

/* ----------------------------------------------
The Census API allows data searches by name, 
state abbreviation, FIPS code or GNIS code. 
See http://developer.usatoday.com/docs/read/Census
for details.
---------------------------------------------- */ 

// Get location information
$allStates = $census->locations();
$Virginia = $census->housing(array("keypat" => "VA"));
$AccomackCounty = $census->ethnicity(array("keypat" => "51001", "keyname" => "FIPS", "sumlevid" => 3));
?>