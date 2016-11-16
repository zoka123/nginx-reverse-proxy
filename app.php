<?php

$configFilename = 'config.php';
if (!is_file($configFilename)) {
    exit('Please create config.php file' . PHP_EOL);
}

$configs = require $configFilename;

$templateFilename = 'template.conf';
if (is_file('template.override.conf')) {
    $templateFilename = 'template.override.conf';
}

$template = file_get_contents($templateFilename);

$output = '';

foreach ($configs as $config) {

    $replacements = [
        '%SERVER_NAMES%' => $config['serverName'],
        '%PROXY_PASS%'   => $config['proxyPass'],
    ];

    $currentConfig = str_replace(
        array_keys($replacements),
        array_values($replacements),
        $template
    );

    $output .= $currentConfig . PHP_EOL;

}

echo PHP_EOL;
echo $output;
echo PHP_EOL;
