<?php

/**
 * Installer class
 */
if (!class_exists('Rhxgrid_installer')){
class Rhxgrid_installer {

    /**
     * Run the installer
     *
     * @return void
     */
    public function rhxgrid_run() {
        $this->rhxgrid_add_version();

    }

    /**
     * Add time and version on DB
     */
    public function rhxgrid_add_version() {
        $installed = get_option( 'rhxp_grid_installed' );

        if ( ! $installed ) {
            update_option( 'rhxp_grid_installed', time() );
        }

        update_option( 'rhxp_grid_version', RHXP_GRID_VERSION );
    }

}
}
