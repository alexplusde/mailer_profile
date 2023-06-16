<?php

rex_config::removeNamespace('mailer_profile');
if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::removeTable('rex_mailer_profile');
}
