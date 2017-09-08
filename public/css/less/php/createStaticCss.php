<?php
    $path = getcwd();

    require $path . "/public/css/less/php/lessc.inc.php";

    try {
        lessc::ccompile(
            $path . "/public/css/less/main.less",
            $path . "/public/css/less.css"
        );
    }
    catch (exception $ex) {
        exit("lessc fatal error:" . $ex->getMessage());
    }

    echo "Your file is create or re-create.\n";
?>
