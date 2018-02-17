<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ワンタイムトークン
    if (!token('check')) {
        error('不正なアクセスです。');
    }

    // 入力データを整理
    $post = array(
        'inquries' => normalize_inquries(array(
            'name'       => isset($_POST['name'])       ? $_POST['name']       : '',
            'email'      => isset($_POST['email'])      ? $_POST['email']      : '',
            'tel'        => isset($_POST['tel'])        ? $_POST['tel']        : '',
            'prefecture' => isset($_POST['prefecture']) ? $_POST['prefecture'] : '',
            'gender'     => isset($_POST['gender'])     ? $_POST['gender']     : '',
            'interests'  => isset($_POST['interests'])  ? $_POST['interests']  : array(),
            'reply'      => isset($_POST['reply'])      ? $_POST['reply']      : '',
            'message'    => isset($_POST['message'])    ? $_POST['message']    : '',
        )),
    );

    // 入力データを検証＆登録
    $warnings = validate_inquries($post['inquries']);
    if (isset($_POST['_type']) && $_POST['_type'] === 'json') {
        if (empty($warnings)) {
            ok();
        } else {
            warning($warnings);
        }
    } else {
        if (empty($warnings)) {
            $_SESSION['post']['inquries'] = $post['inquries'];

            // リダイレクト
            redirect('/home/preview');
        } else {
            $_view['inquries'] = $post['inquries'];

            $_view['warnings'] = $warnings;
        }
    }
} elseif (isset($_GET['referer']) && $_GET['referer'] === 'preview') {
    // 入力データを復元
    $_view['inquries'] = $_SESSION['post']['inquries'];
} else {
    // 初期データを取得
    $_view['inquries'] = default_inquries();
}

// お問い合わせの表示用データ作成
$_view['inquries'] = view_inquries($_view['inquries']);
