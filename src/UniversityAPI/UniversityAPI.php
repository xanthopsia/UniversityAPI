<?php

namespace UniversityAPI;

use GuzzleHttp\Client;

class UniversityAPI
{
    private Client $client;
    private string $baseUrl = 'http://universities.hipolabs.com';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getUniversitiesByCountry(string $country): UniversityCollection
    {
        $endpoint = '/search';
        $url = $this->baseUrl . $endpoint . '?country=' . urlencode($country);

        $response = $this->client->get($url);
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody());

            if (empty($data)) {
                exit("No universities found for the country: $country\n");
            }

            $universityCollection = new UniversityCollection();

            foreach ($data as $entry) {
                $university = new University($entry->name, $entry->domains);
                $universityCollection->add($university);
            }

            return $universityCollection;
        }

        exit("Failed to retrieve data\n");
    }
}
