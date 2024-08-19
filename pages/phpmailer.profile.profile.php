<?php

$addon = rex_addon::get('mailer_profile');

$yform = $addon->getProperty('yform', []);
$yform = $yform[rex_be_controller::getCurrentPage()] ?? [];

$table_name = 'rex_mailer_profile';

rex_extension::register(
    'YFORM_MANAGER_DATA_PAGE_HEADER',
    static function (rex_extension_point $ep) {
        if ($ep->getParam('yform')->table->getTableName() === $ep->getParam('table_name')) {
            return '';
        }
    },
    rex_extension::EARLY,
    ['table_name' => $table_name],
);

$_REQUEST['table_name'] = $table_name;

include rex_path::plugin('yform', 'manager', 'pages/data_edit.php');