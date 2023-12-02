<?php
if (class_exists('ZipArchive')) {
    echo phpinfo();
} else {
    echo 'ZipArchive class is not available. Extension is not loaded.';
}
?>
