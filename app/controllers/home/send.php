<?php

import('app/services/mail.php');

//ワンタイムトークン
if (!token('check')) {
    error('不正なアクセスです。');
}

// 投稿データを確認
if (empty($_SESSION['post']['inquries'])) {
    // リダイレクト
    redirect('/');
}

// メールの送信内容を定義
$to      = $GLOBALS['config']['mail_to'];
$subject = $GLOBALS['config']['mail_subject'];
$message = view('mail/home/send.php', true);
$headers = $GLOBALS['config']['mail_headers'];

// メールを送信
if (service_mail_send($to, $subject, $message, $headers) === false) {
    error('メールを送信できません。');
}

// 投稿セッションを初期化
unset($_SESSION['post']);

// リダイレクト
redirect('/home/complete');
