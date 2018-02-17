<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php t(MAIN_CHARSET) ?>">
        <title><?php isset($_view['title']) ? h($_view['title'] . ' | ') : '' ?>お問い合わせ</title>
        <link rel="stylesheet" href="<?php t($GLOBALS['config']['http_path']) ?><?php t(loader_css('common.css')) ?>">
        <?php isset($_view['link']) ? e($_view['link']) : '' ?>
        <script src="<?php t($GLOBALS['config']['http_path']) ?><?php t(loader_js('jquery.js')) ?>"></script>
        <script src="<?php t($GLOBALS['config']['http_path']) ?><?php t(loader_js('common.js')) ?>"></script>
        <?php isset($_view['script']) ? e($_view['script']) : '' ?>
    </head>
    <body>
        <div id="container">
            <h1>お問い合わせ</h1>
