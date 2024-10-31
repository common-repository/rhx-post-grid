<?php

/**
 * The Menu handler class
 */
if (!class_exists('Rhxgrid_menu'))
{
    class Rhxgrid_menu
    {
        public $gridmain_setting;

        /**
         * Initialize the class
         */
        function __construct($grid_setting)
        {
            $this->gridmain_setting = $grid_setting;

            add_action("admin_menu", [$this, "admin_menu"]);
        }

        /**
         * Register admin menu
         *
         * @return void
         */
        public function admin_menu()
        {
            $parent_slug = "rhxpost-grid";
            $capability = "manage_options";

            $hook = add_menu_page(__("RHX Post Grid", "rhxpost-grid") , __("RHX Post Grid", "rhxpost-grid") , $capability, $parent_slug, [$this->gridmain_setting, "settings_page"], "dashicons-welcome-write-blog");


            add_action( 'admin_head-' . $hook, [ $this, 'enqueue_assets' ] );

        }


        /**
         * Enqueue scripts and styles
         *
         * @return void
         */
        public function enqueue_assets() {
            wp_enqueue_style( 'rhxgrid-admin-style' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
            wp_enqueue_script('rhxgrid-cpactive-script');
        }
    }
}
