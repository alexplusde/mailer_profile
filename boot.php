<?php
if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_mailer_profile',
        mailer_profile::class
    );

    rex_extension::register('PHPMAILER_CONFIG', ['mailer_profile','epMailerProfile']);
}
