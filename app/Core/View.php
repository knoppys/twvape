<?php 

namespace Vape\Core;

/**
 * Call the correct view template, pass the data to the template and organise the page layout. 
 */
class View {

    protected $view_file;
    protected $view_data;

    public function __construct($view_file, $view_data){

        $this->view_file = $view_file;
        $this->view_data = $view_data;

    }

    /**
     * Render the front end template including header, body, footer and page data
     *
     * @return void
     */
    public function render(){

        //Include the components file with regularly used content
        require VIEW. 'components.php';

        //Insert the header 
        include VIEW . 'header.php';

        //Inserts the main body
        if(file_exists(VIEW . $this->view_file . '.php')){

            include VIEW . $this->view_file . '.php';

        } else {

            include VIEW . 'error404.php';

        }

        //Insert the footer
        include VIEW . 'footer.php';

    }

}