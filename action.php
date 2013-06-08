<?php
/**
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Daniele Centamore <daniele.centamore@gmail.com>
 */      

// must be run within Dokuwiki

if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once(DOKU_PLUGIN.'idsapi/idsapi/IdsHelperFacade.php');

/**
 * Action part of the tag plugin, handles tag display and index updates
 */
class action_plugin_idsapi extends DokuWiki_Action_Plugin {

    /**
     * register the eventhandlers
     *
     * @param Doku_Event_Handler $contr
     */
    function register(&$contr) {
        $contr->register_hook('TPL_ACT_UNKNOWN', 'AFTER', $this, '_handle_tpl_act', array());
    }

    

    /**
     * Display the ids page
     *
     * @param Doku_Event $event The TPL_ACT_UNKNOWN event
     * @param array      $param optional parameters (unused)
     */
    function _handle_tpl_act(Doku_Event &$event, $param) {  
        
         // check the ids api key
           $key = $this->getConf('ids_api');
           if ($key==false || $key=='') {
               msg($this->getLang('missing_idsapikey'), -1);
               $this->_handle_home();
               return;
           }           
            
         // check that the tag Plugin is enabled
            if (plugin_isdisabled('tag')) {
                msg($this->getLang('missing_tagplugin'), -1);
                 $this->_handle_home();
                 return;
            }

          // load the ids service Facade
            $idshelper = IdsHelperFacade::getHelper( $_REQUEST, $_SERVER, $key ); 
            $response = $idshelper->getResponse();
            if($response->hasErrors()){
                msg($this->getLang('ids_error_connection'), -1);
                $this->_handle_home();
                return;
            } else {
                print $response->getHtml();
            }
            
            $this->_handle_home();
    }
    
    /**
     * Display the ids home page link 
     *
     */
    function _handle_home() {
            $idshome = $this->getConf('ids_api_home_url');
            print "<p style='text-align:right;'><a href='$idshome' target='_blank'>$idshome</a><br>";
            //print "<span style='color: grey;font-size: 0.8em;'>".$this->getConf('ids_api_author')."</span></p>";
    }  
    
}
// vim:ts=4:sw=4:et:
