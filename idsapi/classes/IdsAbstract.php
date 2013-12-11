<?php


/**
 * Description of IdsInterface
 *
 * @author <daniele.centamore@gmail.com>
 */

abstract class IdsAbstract {
        
    /**
     * set IDS API constants.
     */
       
    const IDS_API_KEY_PAR = '_token_guid';
    const IDS_DEFAULT_FORMAT = 'full';
    const IDS_DEFAULT_TYPE_REQUEST = 'search';
    const IDS_TYPE_REQUEST_SEARCH = 'search';
    const IDS_TYPE_REQUEST_GET_ALL = 'get_all';
    const IDS_ERROR_CONNECTION = 'ids_error_connection';
    const IDS_ERROR_API = 'ids_error_api';
    const IDS_ERROR_RESPONSE = 'ids_error_response';
    const IDS_ERROR_DATA = 'ids_error_data';
    
    
    
}

