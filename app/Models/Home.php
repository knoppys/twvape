<?php

namespace Vape\Models;

use Vape\Models\GetApiData;

/**
 * Home model: returns data from the rick and morty api
 */
class Home
{

    public $data;

    /**
     * Home model: Action = index
     *
     * @return object API REesponse
     */
    public function index()
    {

        $this->data = new GetApiData([
            'endpoint' => 'character'
        ]);

        return $this->data;

    }

}