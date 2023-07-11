<?php 

/**
 * Easy function to read and view data of all types
 *
 * @param [type] $var
 * @return void
 */
function pre($var){

    echo '<pre>';
    print_r($var);
    echo '</pre>';

}
/**
 * Grabs the page number off the end of a URL
 * Used mainly for pagination links
 *
 * @param string $string
 * @return string The last digit from the end of a URL
 */
function get_page_no($string){

    $parts = parse_url($string);
    parse_str($parts['query'], $query);
    return $query['page'];

}

/**
 * Get the full query string from the end of a URL
 *
 * @param string $url
 * @return string
 */
function get_query(string $url){

    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    echo http_build_query($url['query']);

}

/**
 * Get the API end point from the end of a url
 *
 * @param string $string
 * @return string
 */
function get_endpoint(string $string){

    return str_replace('https://rickandmortyapi.com/api', $string);

}

/**
 * Get the ids from an array of API urls. 
 * Used for getting the character / episode or location IDs from the single item meta data
 *
 * @param array $residents
 * @return array
 */
function get_ids(array $residents){

    $ids = [];
    foreach ($residents as $value) {
        
        $ids[] = get_page_no($value);

    }

    return $ids;

}