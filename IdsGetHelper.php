<?php

require_once(dirname(__FILE__) .'/IdsAbstractHelper.php');

/**
 * Description of IdsGetHelper
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsGetHelper extends IdsAbstractHelper  {

        
      public function __construct( $object_id, $uri, $key ) {
          /**
           * create a IdsAPI instance and set default values
           */
          parent::__construct();        
          $this->idsapi->setApiKey($key);
          $this->idsapi->setTypeRequest('get');
          $this->idsapi->setObjectType('documents');
          $this->idsapi->setObjectId($object_id);
          $this->idsapi->setFormat('full');
          $this->idsapi->setSortOrder('date_created');
          $this->idsapi->setSite('eldis');
          $this->uri = $uri;
          return $this;
      }      
      
           
    
     
}
