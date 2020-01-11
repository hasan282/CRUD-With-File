<?php

function BaseURL($url = '')
{
    $baseSSL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
    $baseHOST = $_SERVER['HTTP_HOST'];
    $customURL = ($url != '') ? '/' . $url : '';
    if (WEB_HOSTING) {
        return $baseSSL . '://' . $baseHOST . $customURL;
    } else {
        return $baseSSL . '://' . $baseHOST . '/' . HTDOCS_FOLDER . $customURL;
    }
}

function Redirect($url = '')
{
    $directTo = BaseURL($url);
    header('location: ' . $directTo);
}
