# PHP YQL Geo Locator

Simple library for getting the geo location of IP addresses using the YQL API.

## Download

    $ git clone git://github.com/jwage/php-yql-geo-locator.git

## Setup

    use GeoLocator\Locator;
    use GeoLocator\Location;
    use GeoLocator\GoogleMapImage;

    require 'php-yql-geo-locator/lib/GeoLocator/Location.php';
    require 'php-yql-geo-locator/lib/GeoLocator/Locator.php';
    require 'php-yql-geo-locator/lib/GeoLocator/GoogleMapImage.php';

    $locator = new Locator;

## Usage

After setting everything up you are ready to start working with geo locations
using the locator API:

* getGeoLocation($ip)
* getGoogleMapImageForIps(array $ips)
* getGoogleMapImageForIp($ip)

Here is an example using the getGeoLocation() method and printing the data:

    print_r($locator->getGeoLocation('76.22.200.69')->toArray());

It would result in an array that looks like this:

    Array
    (
        [ip] => 76.22.200.69
        [countryCode] => US
        [countryName] => United States
        [regionCode] => 47
        [regionName] => Tennessee
        [city] => Nashville
        [zipPostalCode] => 37205
        [latitude] => 36.1121
        [longitude] => -86.863
        [timezone] => 0
        [gmtOffset] => 0
        [dstOffset] => 0
    )

Get a google map that plots multiple IP addresses:

    $image = $locator->getGoogleMapImageForIps(array(
        '76.22.200.69',
        '74.125.65.106'
    ));

The above method returns an instance of GoogleMapImage and has the following API:

* setWidth($width)
* setHeight($height)
* setMaptype($maptype)
* setSensor($sensor)
* setZoom($zoom)
* addLocation(Location $location)
* getUrl()
* getHTMLImageTag()
* __toString()

Now you can just echo the $image to get the HTML image:

    echo $image;

The above would result in an image tag that looks like the following:

    <img src="http://maps.google.com/maps/api/staticmap?zoom=&size=550x550&maptype=roadmap&sensor=false&markers=color:blue|label:76.22.200.69|36.1121,-86.863&markers=color:blue|label:74.125.65.106|37.4192,-122.057" width="550" height="550" /