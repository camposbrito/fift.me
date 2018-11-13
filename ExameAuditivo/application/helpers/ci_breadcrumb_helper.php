<?php

if (!function_exists('create_breadcrumb')) {

    function create_breadcrumb() {
        $ci = &get_instance();
        $i = 1;
        $uri = $ci->uri->segment($i);
        $link = '<ol class="breadcrumb  main">';

        while ($uri != '') {
            $prep_link = 'index.php/';
            for ($j = 1; $j <= $i; $j++) {
                $prep_link .= $ci->uri->segment($j) . '/';
            }

            if ($ci->uri->segment($i + 1) == '') {
                $link.='<li><a href="' . site_url($prep_link) . '"><b>';
                $link.=$ci->uri->segment($i) . '</b></a></li> ';
            } else {
                $link.='<li><a href="' . site_url($prep_link) . '">';
                $link.=$ci->uri->segment($i) . '</a></li> ';
            }

            $i++;
            $uri = $ci->uri->segment($i);
        }
        $link .= '</ol>';
        return $link;
    }

}
?>