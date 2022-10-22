<?php

function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function go_to($path){
    header('location: ' .$path);
    exit();
}

function set_session_message($type, $message)
{
    $_SESSION['message'] = $message;
    $_SESSION['type'] = $type;
}

function get_session_message($type)
{
    if (isset($_SESSION['message'])) {
        $message = '';
        if ($type == SESSION_TYPE_SUCCESS) {
            $message .= '<div class="alert alert-success" role="alert"> <strong>';
        } else if ($type == SESSION_TYPE_ERROR) {
            $message .= '<div class="alert alert-danger" role="alert"> <strong>';
        }
        $message .=
            $_SESSION['message'] .
            '</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

        echo $message;

        unset($_SESSION['message']);
        unset($_SESSION['type']);
    }
}

function dd($data){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}