<?php

namespace Vape\Controllers;

use Vape\Core\Controller;

/**
 * Home Controller
 */
class Home extends Controller
{


    /**
     * Home Controlelr: Action = index
     *
     * @return void
     */
    public function index($params = [])
    {

        $this->model('Home', 'index');
        $this->view('home\index', $this->model->data->response);
        $this->view->render();

    }

}