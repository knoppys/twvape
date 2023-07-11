<?php

namespace Vape\Models;

use Vape\Models\GetApiData;

/**
 * Episodes model: returns data from the rick and morty api
 */
class Episodes
{

    public $data;

    /**
     * Episodes Model: Action = index
     *
     * @return object API Response
     */
    public function index()
    {

        $this->data = new GetApiData([
            'endpoint' => 'episode'
        ]);

        return $this->data;

    }

    /**
     * Episodes Model: Action = page
     *
     * @param string $pageNummber The Episode page number
     * @return object API Response
     */
    public function page(string $pageNummber)
    {

        $this->data = new GetApiData([
            'endpoint' => 'episode',
            'query' => [
                'page' => $pageNummber
            ]
        ]);

        return $this->data;


    }

    /**
     * Episodes Model: Action = single
     *
     * @param string $id The episode ID
     * @return object API Response
     */
    public function single(string $id)
    {


        $this->data = new GetApiData([
            'endpoint' => 'episode/' . $id
        ]);

        $characters = get_ids($this->data->response->characters);

        if (!empty($characters)) {

            $characterObjects = new GetApiData([
                'endpoint' => 'character/' . implode(',', $characters)
            ]);

            $this->data->response->characterProfiles = $characterObjects;

        }

        return $this->data;

    }

    /**
     * Episodes Model: Action = search
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
            'endpoint' => 'episode',
            'query' => $queryArray
        ]);

        return $this->data;

    }

}