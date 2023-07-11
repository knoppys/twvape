<?php

namespace Vape\Controllers;

use Vape\Core\Controller;

/**
 * Characters Controller
 */
class Characters extends Controller
{

    /**
     * Characters Controlelr: Action = index
     *
     * @return void
     */
    public function index()
    {

        $this->model('Characters', 'index');
        $this->view('characters\index', $this->model->data->response);
        $this->view->render();

    }

    /**
     * Characters Controlelr: Action = page
     *
     * @return void
     */
    public function page($page)
    {

        $this->model('Characters', 'page', $page);
        $this->view('characters\index', $this->model->data->response);
        $this->view->render();

    }

    /**
     * Characters Controlelr: Action = single
     *
     * @return void
     */
    public function single($id = null)
    {

        if ($id == null) {
            $this->view('error404');
            $this->view->render();
        } else {

            $this->model('Characters', 'single', $id);
            $this->view('characters\single', $this->model->data->response);
            $this->view->render();

        }


    }

    /**
     * Characters Controlelr: Action = search
     *
     * @return void
     */
    public function search($query)
    {

        if ($query == null) {
            $this->view('error404');
            $this->view->render();
        } else {

            $this->model('Characters', 'search', $query);
            $this->view('characters\index', $this->model->data->response);
            $this->view->render();

        }

    }

}