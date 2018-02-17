<?php

// 設定ファイル
import('app/config.php');

if (is_file(MAIN_PATH . MAIN_APPLICATION_PATH . 'app/config.local.php')) {
    import('app/config.local.php');
}

// プラグイン
import('libs/plugins/loader.php');
