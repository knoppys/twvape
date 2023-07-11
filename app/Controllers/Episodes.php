<?php

namespace Vape\Controllers;

use Vape\Core\Controller;

/**
 * Episodes Controller
 */
class Episodes extends Controller
{

    /**
     * Episodes Controlelr: Action = index
     *
     * @return void
     */
    public function index()
    {

        $this->model('Episodes', 'index');
        $this->view('episodes\index', $this->model->data->response);
        $this->view->render();

    }

    /**
     * Episodes Controlelr: Action = single
     *
     * @return void
     */
    public function single($id = null)
    {

        if ($id == null) {
            $this->view('error404');
            $this->view->render();
        } else {

            $this->model('Episodes', 'single', $id);
            $this->view('episodes\single', $this->model->data->response);
            $this->view->render();

        }


    }

    /**
     * Episodes Controlelr: Action = search
     *
     * @return void
     */
    public function search($query)
    {

        if ($query == null) {
            $this->view('error404');
            $this->view->render();
        } else {

            $this->model('Episodes', 'search', $query);
            $this->view('episodes\index', $this->model->data->response);
            $this->view->render();

        }

    }

}