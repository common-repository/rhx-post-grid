<?php

/**
 * Assets handlers class
 */
if (!class_exists('Rhxgrid_assets')){

class Rhxgrid_assets {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'rhxgrid_register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'rhxgrid_register_assets' ] );
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function rhxgrid_get_scripts() {
        return [
            'rhxgrid-script' => [
                'src'     => RHXP_GRID_ASSETS . '/js/frontend.js',
                'version' => filemtime( RHXP_GRID_PATH . '/assets/js/frontend.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'rhxgrid-cpactive-script' => [
                'src'     => RHXP_GRID_ASSETS . '/js/cp-active.js',
                'version' => filemtime( RHXP_GRID_PATH . '/assets/js/cp-active.js' ),
                'deps'    => [ 'jquery' ]
            ],
             'isotope-script' => [
                'src'     => RHXP_GRID_ASSETS . '/js/plugin/isotope.pkgd.min.js',
                'version' => filemtime( RHXP_GRID_PATH . '/assets/js/plugin/isotope.pkgd.min.js' ),
                'deps'    => [ 'jquery' ]
            ],

           'bootstrap-min-js' => [
              'src'     => RHXP_GRID_ASSETS . '/js/bootstrap.min.js',
              'version' => filemtime( RHXP_GRID_PATH . '/assets/js/bootstrap.min.js' ),
              'deps'    => [ 'jquery' ]
          ],

        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function rhxgrid_get_styles() {
        return [
            'rhxgrid-frontend-style' => [
                'src'     => RHXP_GRID_ASSETS . '/css/frontend.css',
                'version' => filemtime( RHXP_GRID_PATH . '/assets/css/frontend.css' )
            ],
            'rhxgrid-admin-style' => [
                'src'     => RHXP_GRID_ASSETS . '/css/admin.css',
                'version' => filemtime( RHXP_GRID_PATH . '/assets/css/admin.css' )
            ],
            'bootstrap-min-css' => [
                'src'     => RHXP_GRID_ASSETS . '/css/bootstrap.min.css',
                'version' => filemtime( RHXP_GRID_PATH . '/assets/css/bootstrap.min.css' )
            ],

        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function rhxgrid_register_assets() {
        $scripts = $this->rhxgrid_get_scripts();
        $styles  = $this->rhxgrid_get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, $style['version'] );
        }

    }
}
}
