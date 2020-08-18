<?php namespace Config;

class Auth extends \Myth\Auth\Config\Auth
{
    //--------------------------------------------------------------------
    // Layout for the views to extend
    //--------------------------------------------------------------------

    public $viewLayout = 'layout';

    //--------------------------------------------------------------------
    // Allow Persistent Login Cookies (Remember me)
    //--------------------------------------------------------------------
    // While every attempt has been made to create a very strong protection
    // with the remember me system, there are some cases (like when you
    // need extreme protection, like dealing with users financials) that
    // you might not want the extra risk associated with this cookie-based
    // solution.
    //
    public $allowRemembering = true;
}
