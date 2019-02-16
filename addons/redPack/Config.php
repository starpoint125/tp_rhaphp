<?php
return array(
    'name' => '微信红包',
    'addon' => 'redPack',
    'desc' => '有钱就任性，活动营销-红包爱怎么发就怎么发',
    'version' => '1.0',
    'author' => 'Geeson',
    'logo' => 'logo.jpg',
    'menu_show' => '1',
    'entry_url' => '',
    //  'install_sql' => 'install.sql',
    'upgrade_sql' => '',
    'menu' => [
        [
            'name' => '红包记录',
            'url' => 'redPack/Index/index',
            'icon' => ''
        ],
    ],
    'config' => array(
        [
            'name' => 'amount',
            'title' => '红包总额',
            'type' => 'text',
            'value' => '0',
            'placeholder' => '',
            'tip' => '单位/元',
        ],
        [
            'name' => 'money',
            'title' => '红包金额',
            'type' => 'text',
            'value' => '1',
            'placeholder' => '',
            'tip' => '领取红包份额，注意红包金额微信不能低于1蚊鸡（1元钱）。',
        ],
        [
            'name' => 'nick_name',
            'title' => '提供方名',
            'type' => 'text',
            'value' => '',
            'placeholder' => '',
            'tip' => '列如：绮梦科技、 RhaPHP、冰冰工作室等等。',
        ],
        [
            'name' => 'send_name',
            'title' => '红包发送者名',
            'type' => 'text',
            'value' => '',
            'placeholder' => '',
            'tip' => '例如：冰冰、努力就有希望、有钱的二狗子等等，字数尽量不要太多。',
        ],
        [
            'name' => 'wishing',
            'title' => '红包祝福语',
            'type' => 'text',
            'value' => '',
            'placeholder' => '',
            'tip' => '例如：恭喜发财、早生贵子、早日分手、你想对领取红包的人说的话。',
        ],
        [
            'name' => 'reply_msg',
            'title' => '成功回复',
            'type' => 'text',
            'value' => '红包发放成功，请你继续关注活动，后面福利多多！',
            'placeholder' => '',
            'tip' => '红包发送成功，回复的消息内容。',
        ],
        [
            'name' => 'act_name',
            'title' => '活动名称',
            'type' => 'text',
            'value' => '',
            'placeholder' => '',
            'tip' => '例如：五一假日活动、三周年庆、等等。',
        ],
        [
            'name' => 'start_time',
            'title' => '开始时间',
            'type' => 'date',
            'value' => '',
            'placeholder' => '',
            'tip' => '',
        ],
        [
            'name' => 'end_time',
            'title' => '结束时间',
            'type' => 'date',
            'value' => '',
            'placeholder' => '',
            'tip' => '',
        ],
        [
            'name' => 'number_of_times',
            'title' => '领取次数',
            'type' => 'text',
            'value' => '1',
            'placeholder' => '',
            'tip' => '每人领取红包次数，默认1次',
        ],
    ),

);