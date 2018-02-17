<?php

import('libs/plugins/validator.php');

/**
 * お問い合わせの正規化
 *
 * @param array $queries
 * @param array $options
 *
 * @return array
 */
function normalize_inquries($queries, $options = array())
{
    // 電話番号
    if (isset($queries['tel'])) {
        if (is_array($queries['tel'])) {
            $queries['tel'] = $queries['tel'][0] . '-' . $queries['tel'][1] . '-' . $queries['tel'][2];

            if ($queries['tel'] === '--') {
                $queries['tel'] = '';
            }
        }
        $queries['tel'] = mb_convert_kana($queries['tel'], 'n', MAIN_INTERNAL_ENCODING);
    }

    return $queries;
}

/**
 * お問い合わせの検証
 *
 * @param array $queries
 * @param array $options
 *
 * @return array
 */
function validate_inquries($queries, $options = array())
{
    $messages = array();

    // 氏名
    if (isset($queries['name'])) {
        if (!validator_required($queries['name'])) {
            $messages['name'] = '氏名が入力されていません。';
        } elseif (!validator_max_length($queries['name'], 50)) {
            $messages['name'] = '氏名は50文字以内で入力してください。';
        }
    }

    // メールアドレス
    if (isset($queries['email'])) {
        if (!validator_required($queries['email'])) {
            $messages['email'] = 'メールアドレスが入力されていません。';
        } elseif (!validator_email($queries['email'])) {
            $messages['email'] = 'メールアドレスの入力内容が正しくありません。';
        } elseif (!validator_max_length($queries['email'], 80)) {
            $messages['email'] = 'メールアドレスは80文字以内で入力してください。';
        }
    }

    // 電話番号
    if (isset($queries['tel'])) {
        if (!validator_required($queries['tel'])) {
        } elseif (!validator_regexp($queries['tel'], '^\d+-\d+-\d+$')) {
            $messages['tel'] = '電話番号の書式が不正です。';
        } elseif (!validator_max_length($queries['tel'], 20)) {
            $messages['tel'] = '電話番号は20文字以内で入力してください。';
        }
    }

    // 都道府県
    if (isset($queries['prefecture'])) {
        if (!validator_required($queries['prefecture'])) {
            $messages['prefecture'] = '都道府県が入力されていません。';
        } elseif (!validator_list($queries['prefecture'], $GLOBALS['config']['options']['inquries']['prefectures'])) {
            $messages['prefecture'] = '都道府県の選択内容が不正です。';
        }
    }

    // 性別
    if (isset($queries['gender'])) {
        if (!validator_required($queries['gender'])) {
        } elseif (!validator_list($queries['gender'], $GLOBALS['config']['options']['inquries']['genders'])) {
            $messages['gender'] = '性別の選択内容が不正です。';
        }
    }

    // 興味をお持ちの分野
    if (isset($queries['interests'])) {
        if (!validator_required($queries['interests'])) {
        } elseif (!validator_list($queries['interests'], $GLOBALS['config']['options']['inquries']['interests'])) {
            $messages['interests'] = '興味をお持ちの分野の選択内容が不正です。';
        }
    }

    // 返信
    if (isset($queries['reply'])) {
        if (!validator_required($queries['reply'])) {
        } elseif (!validator_list($queries['reply'], $GLOBALS['config']['options']['inquries']['replies'])) {
            $messages['reply'] = '返信の選択内容が不正です。';
        }
    }

    // お問い合わせ内容
    if (isset($queries['message'])) {
        if (!validator_required($queries['message'])) {
            $messages['message'] = 'お問い合わせ内容が入力されていません。';
        } elseif (!validator_max_length($queries['message'], 5000)) {
            $messages['message'] = 'お問い合わせ内容は5000文字以内で入力してください。';
        }
    }

    return $messages;
}

/**
 * お問い合わせの表示用データ作成
 *
 * @param array $data
 *
 * @return array
 */
function view_inquries($data)
{
    // 電話番号
    if (isset($data['tel'])) {
        $data['tel'] = explode('-', $data['tel']);

        if (!isset($data['tel'][0])) {
            $data['tel'][0] = '';
        }
        if (!isset($data['tel'][1])) {
            $data['tel'][1] = '';
        }
        if (!isset($data['tel'][2])) {
            $data['tel'][2] = '';
        }
    }

    return $data;
}

/**
 * お問い合わせの初期値
 *
 * @return array
 */
function default_inquries()
{
    return array(
        'name'       => '',
        'email'      => '',
        'tel'        => '',
        'prefecture' => '',
        'gender'     => 'none',
        'interests'  => array(),
        'reply'      => 0,
        'message'    => '',
    );
}
