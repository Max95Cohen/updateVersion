<?php

const PWD = __DIR__ . '/';

$files = [
    'a.js',
    'index.php',
];

foreach ($files as $file) {
    updateFiles($file);
}

function updateFiles($filename) {
    $sourceDirectory = PWD . 'source/';

    $data = file_get_contents($sourceDirectory . $filename);

    preg_match_all('#\?a\=(\d+)#', $data, $matches, PREG_SET_ORDER);

    if ($matches) {
        foreach ($matches as $item) {
            $version = $item[1];
            $version++;

            $data = str_replace($item[0], '?a=' . $version, $data);
        }
    }

    file_put_contents($sourceDirectory . $filename, $data);
}
