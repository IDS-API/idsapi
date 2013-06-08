<?php

require_once(dirname(__FILE__) . '/classes/IdsAPI.php');

/**
 * Description of IdsInterface
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsFactory {
    
    /**
     * return a IdsAPI object.
     */
    
    public static function create(){
        return new IdsAPI();
    }
}

