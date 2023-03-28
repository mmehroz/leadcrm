<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 6/2/2017
 * Time: 10:01 AM
 */
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('site_lang');
        if ($siteLang) {
            $ci->lang->load('message',$siteLang);
        } else {
            $ci->lang->load('message','english');
        }
    }
}