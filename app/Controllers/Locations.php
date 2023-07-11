<?php

namespace Vape\Controllers;

use Vape\Core\Controller;

/**
 * Locations Controller
 */
class Locations extends Controller
{

    /**
     * Locations Controlelr: Action = single
     *
     * @return void
     */
    public function index($params = null)
    {

        $this->model('Locations', 'index');
        $this->view('locations\index', $this->model->data->response);
        $this->view->render();

    }

    /**
     * Locations Controlelr: Action = page
     *
     * @return void
     */
    public function page($page)
    {

        $this->model('Locations', 'page', $page);
        $this->view('locations\index', $this->model->data->response);
        $this->view->render();

    }

    /**
     * Locations Controlelr: Action = single
     *
     * @return void
     */
    public function single($id = null)
    {

        if ($id == null) {
            $this->view('error404');
            $this->view->render();
        } else {

            $this->model('Locations', 'single', $id);
            $this->view('locations\single', $this->model->data->response);
            $this->view->render();

        }


    }

    /**
     * Locations Controlelr: Action = search
     *
     * @return void
     */
    public function search($query)
    {

        if ($query == null) {
            $this->view('error404');
            $this->view->render();
        } else {

            $this->model('Locations', 'search', $query);
            $this->view('locations\index', $this->model->data->response);
            $this->view->render();

        }

    }

}