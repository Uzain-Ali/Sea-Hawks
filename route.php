<?php
$config = require 'config.php';

$page = isset($_GET['page']) ? $_GET['page'] : '';
if (isset($config[$page])) {
    $path = $config[$page];
    // Only allow .php or .html files in your config for security
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    if (in_array($ext, ['php', 'html'])) {
        // For .php files, include and capture output
        if ($ext === 'php') {
            ob_start();
            include $path;
            $content = ob_get_clean();
            echo $content;
        } else {
            // For .html files, just read and output
            echo file_get_contents($path);
        }
        exit;
    }
}
http_response_code(404);
echo "Page not found.";
?>