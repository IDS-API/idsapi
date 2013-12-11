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
      public static function createDefaultHelper( $tag, $uri, $current_page, $url, $key, $site){
            return new IdsDefaultHelper( $tag, $uri, $current_page, $url, $key, $site);
      } 
      
      /**
        * @return IdsAllHelper object
        */
      public static function createAllHelper( $tag, $uri, $current_page, $url, $key, $site){
            return new IdsAllHelper( $tag, $uri, $current_page, $url, $key, $site);
      } 
      
      /**
        * @return IdsGetHelper object
        */
      public static function createGetHelper( $object_id, $uri, $url, $key, $site){
            return new IdsGetHelper( $object_id, $uri, $url, $key, $site);
      } 


}
