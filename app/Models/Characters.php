<?php

namespace Vape\Models;

use Vape\Models\GetApiData;

/**
 * Character model: returns data from the rick and morty api
 */
class Characters
{

    public $data;

    /**
     * Characters Model: Action = index
     *
     * @return object API Response
     */
    public function index()
    {

        $this->data = new GetApiData([
            'endpoint' => 'character'
        ]);

        return $this->data;

    }

    /**
     * Characters Model: Action = page
     *
     * @param string $pageNummber The Character page number
     * @return object API Response
     */
    public function page(string $pageNummber)
    {

        $this->data = new GetApiData([
            'endpoint' => 'character',
            'query' => [
                'page' => $pageNummber
            ]
        ]);

        return $this->data;


    }

    /**
     * Characters Model: Action = single
     *
     * @param string $id The single character ID
     * @return object API Response
     */
    public function single(string $id)
    {

        $this->data = new GetApiData([
            'endpoint' => 'character/' . $id
        ]);

        $episodes = get_ids($this->data->response->episode);

        if (!empty($episodes)) {

            $episodesObjects = new GetApiData([
                'endpoint' => 'episode/' . implode(',', $episodes)
            ]);

            $this->data->response->episodes = $episodesObjects;

        }

        return $this->data;

    }

    /**
     * Characters Model: Action = search
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
            'endpoint' => 'character',
            'query' => $queryArray
        ]);

        return $this->data;

    }

}