<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Seo extends CI_Controller {

    function sitemap() {

        $this->load->library('MY_sitemap');
        $this->my_sitemap->create();
    }

    /**
     *  Updates Sitemap.xml when called from the command line. Not available via URL
     */
    public function generate_sitemap() {
        // If not a command line request
        if (!$this->input->is_cli_request()) {
            // 404 error or maybe just redirect somewhere else
            show_404();
        } else {
            $this->load->library('MY_sitemap');
            $this->pp_sitemap->create();
        }
    }

}
