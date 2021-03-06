<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
if ( ! function_exists('uuid_generator'))
{
    function uuid_generator()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
    
}
*/

if ( ! function_exists('uuid_generator'))
{
    function uuid_generator()
    {
        return uniqid (rand(), true);
    }
    
}

if ( ! function_exists('username_generator'))
{
    function username_generator()
    {
        return uniqid ();
    }
    
}