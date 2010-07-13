<?php

use GeoLocator\Locator;
use GeoLocator\Location;
use GeoLocator\GoogleMapImage;

require 'lib/GeoLocator/Location.php';
require 'lib/GeoLocator/Locator.php';
require 'lib/GeoLocator/GoogleMapImage.php';

$locator = new Locator;

echo $locator->getGoogleMapImageForIps(array(
    '76.22.200.69',
    '74.125.65.106'
));

print_r($locator->getGeoLocation('76.22.200.69')->toArray());