<?php

if (rex_addon::get('yform')->isAvailable() && rex_addon::get('phpmailer')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_mailer_profile',
        mailer_profile::class,
    );
}
