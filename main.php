<?php

require 'vendor/autoload.php';

use UniversityAPI\UniversityAPI;

$api = new UniversityAPI();
$country = readline("Enter country: ");
$universities = $api->getUniversitiesByCountry($country);

foreach ($universities->getUniversities() as $university) {
    echo "University: {$university->getName()}" . PHP_EOL;
    foreach ($university->getDomains() as $domain) {
        echo "Domain: $domain" . PHP_EOL;
    }
    echo "================\n";
}
