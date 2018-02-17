<?php import('app/views/header.php') ?>

        <p>お問い合わせを承ります。</p>

        <?php if (isset($_view['warnings'])) : ?>
        <ul class="warning">
            <?php foreach ($_view['warnings'] as $warning) : ?>
            <li><?php h($warning) ?></li>
            <?php endforeach ?>
        </ul>
        <?php endif ?>

        <form action="<?php t(MAIN_FILE) ?>/" method="post" class="register validate">
            <fieldset>
                <legend>送信フォーム</legend>
                <input type="hidden" name="_token" value="<?php t($_view['token']) ?>" class="token">
                <input type="hidden" name="view" value="">
                <dl>
                    <dt>氏名<em>【必須】</em></dt>
                        <dd><input type="text" name="name" value="<?php t($_view['inquries']['name']) ?>"></dd>
                    <dt>メールアドレス<em>【必須】</em></dt>
                        <dd><input type="text" name="email" value="<?php t($_view['inquries']['email']) ?>"></dd>
                    <dt>電話番号</dt>
                        <dd>
                            <div id="validate_tel">
                                <input type="text" name="tel[]" size="6" value="<?php t($_view['inquries']['tel'][0]) ?>">
                                -
                                <input type="text" name="tel[]" size="6" value="<?php t($_view['inquries']['tel'][1]) ?>">
                                -
                                <input type="text" name="tel[]" size="6" value="<?php t($_view['inquries']['tel'][2]) ?>">
                            </div>
                        </dd>
                    <dt>都道府県<em>【必須】</em></dt>
                        <dd>
                            <select name="prefecture">
                                <option value=""></option>
                                <?php foreach ($GLOBALS['config']['options']['inquries']['prefectures'] as $key => $value) : ?>
                                <option value="<?php t($key) ?>"<?php e($key == $_view['inquries']['prefecture'] ? ' selected="selected"' : '') ?>><?php t($value) ?></option>
                                <?php endforeach ?>
                            </select>
                        </dd>
                    <dt>性別</dt>
                        <dd>
                            <div id="validate_gender">
                                <?php foreach ($GLOBALS['config']['options']['inquries']['genders'] as $key => $value) : ?>
                                <label><input type="radio" name="gender" value="<?php t($key) ?>"<?php e($key == $_view['inquries']['gender'] ? ' checked="checked"' : '') ?>> <?php t($value) ?></label>　
                                <?php endforeach ?>
                            </div>
                        </dd>
                    <dt>興味をお持ちの分野</dt>
                        <dd>
                            <div id="validate_interest">
                                <?php foreach ($GLOBALS['config']['options']['inquries']['interests'] as $key => $value) : ?>
                                <label><input type="checkbox" name="interests[]" value="<?php t($key) ?>"<?php e(in_array($key, $_view['inquries']['interests']) ? ' checked="checked"' : '') ?>> <?php t($value) ?></label>　
                                <?php endforeach ?>
                            </div>
                        </dd>
                    <dt>返信</dt>
                        <dd>
                            <div id="validate_reply">
                                <?php foreach ($GLOBALS['config']['options']['inquries']['replies'] as $key => $value) : ?>
                                <label><input type="radio" name="reply" value="<?php t($key) ?>"<?php e($key == $_view['inquries']['reply'] ? ' checked="checked"' : '') ?>> <?php t($value) ?></label>　
                                <?php endforeach ?>
                            </div>
                        </dd>
                    <dt>お問い合わせ内容<em>【必須】</em></dt>
                        <dd><textarea name="message" cols="50" rows="10"><?php t($_view['inquries']['message']) ?></textarea></dd>
                </dl>
                <p><input type="submit" value="確認画面へ"></p>
            </fieldset>
        </form>

<?php import('app/views/footer.php') ?>
