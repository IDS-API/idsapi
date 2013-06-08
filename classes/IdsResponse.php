<?php

require_once(dirname(__FILE__) . '/IdsObject.php');
require_once(dirname(__FILE__) . '/IdsPaginator.php');

/**
 * Description of IdsResponse
 *
 * @author <daniele.centamore@gmail.com>
 */
class IdsResponse {

    // Results. Array of IdsObject (or its subclasses).
    public $results = array();
    // Total results. Number of total available results in the collection.
    public $total_results;
    // response errors.
    private $errors = false;
    // html response
    private $html = null;
    // previous page
    private $previous_page = null;
    // next page
    private $next_page = null;
    // page size
    private $page_size = null;
    // current page
    private $current = null;

    /**
     * Constructor.
     * 
     * Receives an array with the decoded output of the API call.
     * Is called by IdsApi->makeRequest().
     */
    function __construct($results, $format, $type_results, $total_results, $default_site, $previous_page, $next_page, $pagesize, $current) {

        $this->previous_page = $previous_page;
        $this->next_page = $next_page;
        $this->page_size = $pagesize;
        $this->current = $current;
        
        
        foreach ($results as $object) {
            if (!isset($object['site'])) {
                $object['site'] = $default_site;
            }
            $ids_api_object = IdsObject::factory($object, $format, $type_results);
            array_push($this->results, $ids_api_object);
        }
        if (isset($total_results)) {
            $this->total_results = $total_results;
        }
    }

    /**
     * Creates an array with the short responses formatted to be printed.
     * 
     */
    public function htmlShortListObjects($uri = null) {

        $html = "";
        
        if(count($this->results)>1){
            $html .= IdsPaginator::paginate($uri, $this->total_results, $this->page_size, $this->current);
        }
        
      
        foreach ($this->results as $object) {
          
            if (isset($uri)) {
                $html .= "<table width='100%'><tr><td width='110'><a href='" . $uri . "&ids_action=get_one&ID=" . $object->object_id . "' target='_blank'>ID:" . $object->object_id . "</a></td><td>";
            } else {
                $html .= "<table width='100%'><tr><td width='110'>ID:" . $object->object_id . "</td><td>";
            }
            if (isset($object->publication_year)) {
                $html .= "<p style='color:grey;'>Publisher: <b>" . $object->publisher . "</b><br>";
                $html .= "Publication year: <b>" . $object->publication_year . "</b></p>";
            }
            $html .= "Title: <a style='color:#070;' href='" . $object->website_url . "' target='_blank'>" . $object->title . "</a><br>";
            if (isset($object->description)) {
                $html .= $object->description;
            }
            if (isset($object->urls)) {
                $html .= "<br>";
                foreach ($object->urls as $url) {
                    $html .= "<br>View full report:<br><a style='color:#070' href='" . $url . "' target='_self'>" . $url . "</a><br>";
                }
            }
            $html .= "</td></tr></table>";
     
        }
        
        if(count($this->results)>1){
            $html .= IdsPaginator::paginate($uri, $this->total_results, $this->page_size, $this->current);
        }
       
       if (isset($uri)) {
            $html .= "<table><tr><td><a href='" . $uri . "&ids_action=get_all' target='_blank'>Get All IDS Documents</a></td></tr></table>";
        }
        
        
        $this->setHtml($html);
    }
    
    
    /**
     * set Errors
     */
    public function setErrors($errors){
        $this->errors = $errors;
    }
    
    /**
     * get Errors
     */
    public function getErrors(){
        return $this->errors;
    }
    
    /**
     * check Errors
     */
    public function hasErrors(){
        return $this->errors;
    }
    
    
    /**
     * set html
     */
    public function setHtml($html){
        $this->html = $html;
    }
    
    /**
     * get html
     */
    public function getHtml(){
        return $this->html;
    }
    
      

}