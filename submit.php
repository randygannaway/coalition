<?php

//Takes form submission data from ajax and appends to existing product data in JSON format

if (is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) { 
        $action = $_POST["action"];
        switch($action) { //Switch case for value of action
            case "write":
                $return = $_POST;
                $file = __DIR__ . '/products.json';
                $content = file_get_contents($file);
                $json    = json_decode($content, true);
                $json[time()] = $return;
                $str     = json_encode($json);
                file_put_contents($file, $str );
                write_function();
                break;
        }
    }
}

//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
?>