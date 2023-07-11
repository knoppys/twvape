<?php 

namespace Vape\Core;

use Vape\Core\View;
use Vape\Models\Home;
use Vape\Models\Characters;

/**
 * Core controller function
 * Fetch model and view for all controllers.
 */
class Controller {

    protected $view;

    protected $model;

    /**
     * Get the required view template
     *
     * @param string $viewName
     * @param object|null $data
     * @return string Front end HTML
     */
    public function view(string $viewName, object $data = null){

        $this->view = new View($viewName, $data);
        return $this->view;

    }   

    /**
     * Get the required Model data
     *
     * @param string $modelName
     * @param string $action
     * @param object $data
     * @return void
     */
    public function model(string $modelName, string $action, $data = null){
        
        $class = '\\Vape\\Models\\'.ucfirst($modelName);

        $this->model = new $class($data);
        $this->model->$action($data);

    }

}