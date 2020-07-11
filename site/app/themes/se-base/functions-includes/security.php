<?php

////////////////////////////////////////
// MENU REGISTRATIONS 
////////////////////////////////////////


/**
 * Disable XMLRPC - Security concern!
 */

add_filter( 'xmlrpc_enabled', '__return_false' );