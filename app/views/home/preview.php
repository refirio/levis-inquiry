<?php import('app/views/header.php') ?>

        <p>以下の内容で送信します。</p>

        <form action="<?php t(MAIN_FILE) ?>/home/preview" method="post">
            <dl>
                <dt>氏名</dt>
                    <dd><?php h($_view['inquries']['name']) ?></dd>
                <dt>メールアドレス</dt>
                    <dd><?php h($_view['inquries']['email']) ?></dd>
                <dt>電話番号</dt>
                    <dd><?php h($_view['inquries']['tel']) ?></dd>
                <dt>都道府県</dt>
                    <dd><?php h($GLOBALS['config']['options']['inquries']['prefectures'][$_view['inquries']['prefecture']]) ?></dd>
                <dt>性別</dt>
                    <dd><?php h($GLOBALS['config']['options']['inquries']['genders'][$_view['inquries']['gender']]) ?></dd>
                <dt>興味をお持ちの分野</dt>
                    <dd>
                        <?php if (!empty($_view['inquries']['interests'])) : ?>
                            <?php foreach ($_view['inquries']['interests'] as $interest) : ?>
                                <?php h($GLOBALS['config']['options']['inquries']['interests'][$interest]) ?><br>
                            <?php endforeach ?>
                        <?php endif ?>
                    </dd>
                <dt>返信</dt>
                    <dd><?php h($GLOBALS['config']['options']['inquries']['replies'][$_view['inquries']['reply']]) ?></dd>
                <dt>お問い合わせ内容</dt>
                    <dd><?php h($_view['inquries']['message']) ?></dd>
            </dl>
            <fieldset>
                <legend>お問い合わせフォーム</legend>
                <input type="hidden" name="_token" value="<?php t($_view['token']) ?>" class="token">
                <p>
                    <input type="button" value="戻る" onclick="window.location.href='<?php t(MAIN_FILE) ?>/?referer=preview'">
                    <input type="submit" value="送信する">
                </p>
            </fieldset>
        </form>

<?php import('app/views/footer.php') ?>
