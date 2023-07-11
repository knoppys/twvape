<?php

namespace Vape\Controllers;

use Vape\Core\Controller;

/**
 * Error Controller
 */
class Error extends Controller
{

    /**
     * Error Controlelr: Action = index
     *
     * @return void
     */
    public function index()
    {
        $this->view('error404');
        $this->view->render();

    }

}