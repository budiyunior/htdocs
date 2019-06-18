<?php

defined('BASEPATH') or exit('NO direct script access aloowed');

    function json_output($statusHeader, $response){
        $ci =& get_instance();
        $ci->output->set_content_type('application/json')
    }
