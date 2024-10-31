<?php

if (!class_exists('Rhxgrid_admin'))
{
    class Rhxgrid_admin
    {
        /**
         * Initialize the class
         */
        function __construct()
        {
            $grid_setting = new Rhxgrid_setting();

            new Rhxgrid_menu($grid_setting);
        }
    }
}
