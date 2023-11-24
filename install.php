<?php

$addon = rex_addon::get('mailer_profile');

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(rex_path::addon($addon->getName(), 'install/rex_mailer_profile.tableset.json')));
    rex_yform_manager_table::deleteCache();
}
