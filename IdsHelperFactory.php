<?php

require_once(dirname(__FILE__) .'/IdsDefaultHelper.php');
require_once(dirname(__FILE__) .'/IdsAllHelper.php');
require_once(dirname(__FILE__) .'/IdsGetHelper.php');

/**
 * Description of IdsHelperFactory
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsHelperFactory  {

    
       /**
        * @return IdsDefaultHelper object
        */
      public static function createDefaultHelper( $tag, $uri, $current_page, $key){
            return new IdsDefaultHelper( $tag, $uri, $current_page, $key);
      } 
      
      /**
        * @return IdsAllHelper object
        */
      public static function createAllHelper( $tag, $uri, $current_page, $key){
            return new IdsAllHelper( $tag, $uri, $current_page, $key);
      } 
      
      /**
        * @return IdsGetHelper object
        */
      public static function createGetHelper( $object_id, $uri, $key){
            return new IdsGetHelper( $object_id, $uri, $key);
      } 


}
