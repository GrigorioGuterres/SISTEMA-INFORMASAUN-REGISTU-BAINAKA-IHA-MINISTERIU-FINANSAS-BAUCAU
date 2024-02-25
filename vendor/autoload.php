<?php
spl_autoload_register(function ($class) {
    // Define the base directory for your classes
    $baseDir = __DIR__ . '/classes/';

    // Replace backslashes with forward slashes (for Windows compatibility)
    $class = str_replace('\\', '/', $class);

    // Construct the full path to the class file
    $file = $baseDir . $class . '.php';

    // Check if the file exists
    if (file_exists($file)) {
        require $file;
    }
});
