<?php

require_once(dirname(__FILE__) .'/IdsFactory.php');

/**
 * Description of IdsAbstractHelper
 *
 * @author <daniele.centamore@gmail.com>
 */

abstract class IdsAbstractHelper  {

    protected $idsapi;
    
    protected $uri;
    
    public function __construct() {
        $this->idsapi = IdsFactory::create();
    }
    
    
    /**
      * set number of records to retrieve
      */
     protected function setNumRequest($v){
         $this->idsapi->setNumRequested($v);
     }
     
     /**
      * set type of idsapi search, get, get_all etc..
      */     
     protected function setTypeRequest($v){
         $this->idsapi->setTypeRequest($v);
     }
     
     /**
      * set type of of object documents, theme etc..
      */ 
     protected function setObjectType($v){
         $this->idsapi->setObjectType($v);
     }
     
     /**
      * set format short or full
      */ 
     protected function setFormat($v){
         $this->idsapi->setFormat($v);
     }
     
     
     /**
      * set site eldis or bridge
      */ 
     protected function setSite($v){
         $this->idsapi->setSite($v);
     }
     
     /**
      * set url for api endpoint
      */ 
     protected function setUrl($v){
         $this->idsapi->setUrl($v);
     }

     public function getObject(){
         return $this->idsapi;
     }
     
     /**
      * 
      * @return string 
      */
     public function getResponse(){           
         
            $response = $this->idsapi->makeRequest();
            $response->htmlShortListObjects($this->uri);
            return $response;
     }


}
