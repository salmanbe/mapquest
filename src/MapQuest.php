<?php

namespace Salmanbe\MapQuest;

class MapQuest
{
    /**
     * To store api url
     * @var integer
     */
    private $api_url = null;

    /**
     * To store latitude
     * @var string
     */
    private $latitude = null;

    /**
     * To store longitude
     * @var string
     */
    private $longitude = null;

    /**
     * To store status
     * @var integer
     */
    private $status = null;

    /**
     * Class constructor to initialize api url
     * @return void
     */
    public function __construct()
    {
        if (!$this->api_url) {
            $this->api_url = config('app.map_quest_url') . '?key=' . config('app.map_quest_key') . '&location=';
        }
    }

    /**
     * Function makes an API call to get address coordinates
     * @param string $address
     * @return void
     */
    public function set($address = null)
    {
        $this->latitude = null;
        $this->longitude = null;
        $this->status = null;

        if (!$address) {
            return;
        }

        $url = $this->api_url . urlencode($address);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        if (isset($response->results[0]->locations[0]->latLng->lat)) {
            $this->latitude = $response->results[0]->locations[0]->latLng->lat;
        }

        if (isset($response->results[0]->locations[0]->latLng->lng)) {
            $this->longitude = $response->results[0]->locations[0]->latLng->lng;
        }

        if (isset($response->status)) {
            $this->status = $response->status;
        } else {
            $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        }

        curl_close($curl);
    }

    /**
     * Function returns latitude
     * @return string
     */
    public function latitude()
    {
        return $this->latitude;
    }

    /**
     * Function returns longitude
     * @return string
     */
    public function longitude()
    {
        return $this->longitude;
    }

    /**
     * Function returns coordinates
     * @return string
     */
    public function coordinates()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude . ',' . $this->longitude;
        }
    }

    /**
     * Function returns satus code
     * @return string
     */
    public function status()
    {
        return $this->status;
    }
}