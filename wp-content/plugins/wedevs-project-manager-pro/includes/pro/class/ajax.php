<?php

/**
 * Description of ajax
 *
 * @author tareq
 */
class CPM_Pro_Ajax extends CPM_Ajax {
	private static $_instance;

	public static function getInstance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
    	add_action( 'wp_ajax_cpm_get_events', array( $this, 'get_events' ) );
    }

    function get_events() {

        $events = CPM_Pro_Calendar::getInstance()->get_events();

        if ( $events ) {
            echo json_encode( $events );
        } else {
            echo json_encode( array(
                'success' => false
            ) );
        }
        exit;
    }

}


