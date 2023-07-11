<?php

namespace Vape\Models;

use Exception;

/**
 * Get Data from the Ric and Morty API
 */
class GetApiData
{

    protected $endpoint = '';

    protected $query = '';

    protected $url = '';

    public $response;

    /**
     * Build a query string to request data from the API
     * If the request fails, log the error and redirect the user to the 404 page
     *
     * @param array $queryParams URL being requested. 
     */ 
    public function __construct(array $queryParams)
    {

        //Setup the first part of the end point without any query strings 
        $url = 'https://rickandmortyapi.com/api/' . $queryParams['endpoint'];
        $this->url = $url;

        //If query params are supplied, add them onto the end of the URL
        if (isset($queryParams['query'])) {
            $this->url = $url . '/?' . http_build_query($queryParams['query']);
        }

        //Try to get the response, if there is an error, gracefully redirect the user to the 404 page 
        try {
            $this->getData();
        }
        catch (Exception $th) {
            header('Location: /error');
        }


    }

    /**
     * CURL request to the PHP API
     * Attempt to make a successfull connection, retrive the data and log any errors.
     *
     * @return void
     */
    protected function getData()
    {

        //Make the request
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($ch);

        //Error handling
        if (curl_errno($ch)) {

            $error_msg = curl_error($ch);
            error_log($error_msg);

            throw new Exception(curl_error($ch));

        }

        //Close the connection
        curl_close($ch);

        //Decode and return the result. 
        $result = json_decode($response);
        $this->response = $result;


    }

}