<?php

namespace Vape\Models;

use Vape\Models\GetApiData;

/**
 * Locations model: returns data from the rick and morty api
 */
class Locations
{

    public $data;

    /**
     * Locations model: Action = index
     *
     * @return object API REesponse
     */
    public function index()
    {

        $this->data = new GetApiData([
            'endpoint' => 'location'
        ]);

        return $this->data;

    }

    /**
     * Loations model: Action = page
     *
     * @param string $pageNummber The locations page number     
     * @return object API Response
     */
    public function page(string $pageNummber)
    {

        $this->data = new GetApiData([
            'endpoint' => 'location',
            'query' => [
                'page' => $pageNummber
            ]
        ]);

        return $this->data;


    }

    /**
     * Loations model: Action = page
     *
     * @param string $id The single location ID
     * @return object API Response
     */
    public function single(string $id)
    {

        $this->data = new GetApiData([
            'endpoint' => 'location/' . $id
        ]);

        $residents = get_ids($this->data->response->residents);

        if (!empty($residents)) {

            $residentProfiles = new GetApiData([
                'endpoint' => 'character/' . implode(',', $residents)
            ]);

            $this->data->response->residentProfiles = $residentProfiles;

        }

        return $this->data;

    }

    /**
     * Loations Model: Action = search
     *
     * @param string $name The name of the field to search by
     * @return object API Response
     */
    public function search(string $name)
    {

        $request = parse_url($_SERVER['REQUEST_URI']);

        if (isset($request['query'])) {

            parse_str($request['query'], $queryArray);

        }

        $this->data = new GetApiData([
            'endpoint' => 'location',
            'query' => $queryArray
        ]);

        return $this->data;

    }

}