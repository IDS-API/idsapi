<?php

require_once(dirname(__FILE__) .'/IdsHelperFactory.php');

/**
 * Description of IdsHelperFacade
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsHelperFacade  {

    
    public static function getHelper($_REQUEST, $_SERVER, $url, $key, $site){
        
         if($_REQUEST['ids_action']=='get_all'){ 
             
             $idshelper = IdsHelperFactory::createAllHelper( $_REQUEST['tag'], $_SERVER["REQUEST_URI"], $_REQUEST['ids_page'], $url, $key, $site);
         
         } else if($_REQUEST['ids_action']=='get_one') {
             
             $idshelper = IdsHelperFactory::createGetHelper($_REQUEST['ID'],null, $url, $key, $site);
             
         } else {
             
             $idshelper = IdsHelperFactory::createDefaultHelper($_REQUEST['tag'],$_SERVER["REQUEST_URI"],$_REQUEST['ids_page'], $url, $key, $site);
             
         } 
         
         return $idshelper;        
    }



}
