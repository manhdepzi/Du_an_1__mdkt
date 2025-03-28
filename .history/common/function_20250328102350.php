<?php

// Hàm view dùng để render view
function view($path_view, $data=[]) {
    // thay thế dấu . -> /
    $path_view = str_replace("." , "/", $path_view);
    //include
    include_once ROOT_DIR . "views/$path_view.php";
}

// Hàm đ dùng để debug
function dd($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}