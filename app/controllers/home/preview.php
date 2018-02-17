<?php

// 投稿データを確認
if (empty($_SESSION['post']['inquries'])) {
    // リダイレクト
    redirect('/');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ワンタイムトークン
    if (!token('check')) {
        error('不正なアクセスです。');
    }

    // フォワード
    forward('/home/send');
} else {
    $_view['inquries'] = $_SESSION['post']['inquries'];
}

// タイトル
$_view['title'] = '確認';
