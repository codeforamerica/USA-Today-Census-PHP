USA Today PHP API Wrapper
=========================

This is a PHP wrapper for [USA Today's Census
API](http://developer.usatoday.com/docs/read/Census).

Note that usage of the USA Today Census API requires a developer key,
and that usage is contingent upon agreement with USA Today's [Terms of
Use](http://developer.usatoday.com/API_Terms_of_Use).

Also, note that this library is in no way associated with or endorsed by [USA
Today](http://www.usatoday.com/).


Usage
-----

	// Include the library
	require('usa_today.php');
	
	// Create new object
	$census = new USA_Today_Census('YOUR-API-KEY-HERE');


### Methods ###

* `locations` -- Returns all available ethnicity, housing, population and race information for specified area.
	
	// Get location data for all US states
	$census->locations();

* `ethnicity` -- Returns an area's ethnic data. Information includes how much of the population identifies as Hispanic or non-Hispanic white, and the USA TODAY Diversity Index.
	// Get ethnic data for Virgina
	$census->housing(array("keypat" => "VA"));

* `housing` -- Returns an area's housing data. Information includes the number of housing units, and the percentage of those that are vacant.
	// Get housing data for Accomack County, Virgina
	$census->ethnicity(array("keypat" => "51001", "keyname" => "FIPS", "sumlevid" => 3));

* `population` -- Returns an area's population data. Information includes the total population of an area, average population per square mile, and the percent by which that population has changed since the last census.
	// Get population data for all US states
	$census->population();

* `race` -- Returns an area's racial data. Information includes the percentage of an area's population that identifies as White, Black, American Indian, Asian, native Hawaiian/Pacific Islander, or mixed race.
	// Get racial data for all US states
	$census->race();

Copyright
---------

Copyright (c) 2011 Code for America Laboratories

See [LICENSE](https://github.com/codeforamerica/USA-Today-Census/blob/master/LICENSE.md)
for details.