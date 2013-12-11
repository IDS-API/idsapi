<?php

require_once(dirname(__FILE__) .'/IdsAbstractHelper.php');

/**
 * Description of IdsAllHelper
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsAllHelper extends IdsAbstractHelper {


    
      public function __construct( $tag, $uri, $current, $url, $key, $site ) {
          /**
           * set default values
           */          
          parent::__construct();
          $this->idsapi->setApiKey($key);
          $this->idsapi->setCurrentPage($current);
          $this->idsapi->setNumRequested(200);
          $this->idsapi->setTypeRequest('search');
          $this->idsapi->setObjectType('documents');
          $this->idsapi->setFormat('short');
          $this->idsapi->setSortOrder('publication_date');
          $this->idsapi->setSite($site);
          $this->idsapi->setUrl($url);
          $this->idsapi->setSearchParam('q', $tag);
          $this->uri = $uri;
          return $this;
      }      
      
      
      
     
             
     
}
