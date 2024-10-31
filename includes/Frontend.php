<?php
/**
 * Frontend handler class
 */
if (!class_exists('Rhxgrid_frontend')){
class Rhxgrid_frontend {

    /**
     * Initialize the class
     */
    function __construct() {
        new Rhxgrid_shortcode();
    }
}
}
