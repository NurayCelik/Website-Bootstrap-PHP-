<?php
if (extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler")) {
    ini_set("zlib.output_compression", 1);
}

readfile('bootstrap-4.0/style.css');
?>