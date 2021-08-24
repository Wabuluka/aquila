<?php

    /**
     * Enqueue Assets
     * @package Aquila
     */

     namespace Aquila_Theme\Inc;

     use AQUILA_THEME\Inc\Traits\Singleton;

     class Assets{
         use Singleton;

         protected function __construct() {
            // load class.
            $this->setup_hooks();
        }
    
        protected function setup_hooks() {
            // actions and filters
    
            /**
             * Actions
             */
            add_action('wp_enqueue_scripts', [$this, 'register_styles']);
            add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        }
    
        public function register_styles(){
            $uri = get_theme_file_uri();
            wp_register_style('bootstrap', AQUILA_DIR_URI .'/assets/src/library/css/bootstrap.min.css', [], false, 'all' );
            wp_register_style('stylesheet', AQUILA_DIR_URI .'/assets/src/css/style.css', [], filemtime(AQUILA_DIR_PATH .'/assets/src/css/style.css'), 'all');
            wp_register_style('stylesheet-sub', AQUILA_DIR_URI .'/style.css', ['stylesheet'], filemtime(AQUILA_DIR_PATH .'/style.css'), 'all');
            // enqueue scripts
            wp_enqueue_style('bootstrap');
            wp_enqueue_style('stylesheet');
            wp_enqueue_style('stylesheet-sub');
        }
    
        public function register_scripts(){
            $uri = get_theme_file_uri();
            wp_register_script('bootstrap-js', AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);
            wp_register_script('main-js', AQUILA_DIR_URI . '/assets/js/main.js', [], filemtime(AQUILA_DIR_PATH .'/assets/js/main.js'), true);
            wp_enqueue_script('bootstrap-js');
            wp_enqueue_script('main-js');
        }
     }
