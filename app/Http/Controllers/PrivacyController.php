<?php

namespace App\Http\Controllers;


use FacebookResponseException;
use Facebook\Facebook;
use Facebook\FacebookApp;
use Facebook\FacebookRequest;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function showPrivacy() {
        echo 'This is privacy';
    }

}