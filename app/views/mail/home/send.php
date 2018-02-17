氏名：<?php e($_SESSION['post']['inquries']['name']) ?><?php e("\n") ?>
メールアドレス：<?php e($_SESSION['post']['inquries']['email']) ?><?php e("\n") ?>
電話番号：<?php e($_SESSION['post']['inquries']['tel']) ?><?php e("\n") ?>
都道府県：<?php e($GLOBALS['config']['options']['inquries']['prefectures'][$_SESSION['post']['inquries']['prefecture']]) ?><?php e("\n") ?>
性別：<?php e($GLOBALS['config']['options']['inquries']['genders'][$_SESSION['post']['inquries']['gender']]) ?><?php e("\n") ?>
興味をお持ちの分野：<?php if (!empty($_SESSION['post']['inquries']['interests'])) : $flag = false; ?><?php foreach ($_SESSION['post']['inquries']['interests'] as $interest) : ?><?php h($GLOBALS['config']['options']['inquries']['interests'][$interest]) ?><?php e($flag ? '' : '、') ?><?php $flag = true; endforeach ?><?php endif ?><?php e("\n") ?>
返信：<?php e($GLOBALS['config']['options']['inquries']['replies'][$_SESSION['post']['inquries']['reply']]) ?><?php e("\n") ?>
お問い合わせ内容：
<?php e($_SESSION['post']['inquries']['message']) ?>

<?php e($GLOBALS['config']['mail_signature']) ?>
