<?php

if (rex_addon::get('yform')->isAvailable() && rex_addon::get('phpmailer')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_mailer_profile',
        mailer_profile::class,
    );
}

// Listendarstellung in YForm verbessern

rex_extension::register('YFORM_DATA_LIST', static function ($ep) {
    if ('rex_mailer_profile' == $ep->getParam('table')->getTableName()) {
        /** @var rex_list $list */
        $list = $ep->getSubject();

        // Reihenfolge verändern: Zuerst `mailer_type`
        $list->setColumnPosition('mailer', 2);
        $list->setColumnFormat(
            'mailer',
            'custom',
            static function ($a) {
                // Gebe den Wert des Mailertyps als Bootstrap-Badge aus, darunter die Werte zu Authentifizierung und Benutzername
                $mailer = $a['list']->getValue('mailer');
                $return = '<div class="text-nowrap">';
                if ('smtp' == $mailer) {
                    $return .= '<table class="table table-sm table-borderless text-nowrap">';
                    if ($a['list']->getValue('smtp_debug') > 0) {
                        $return .= '<tr><th>Debugging:</th><td><i class="fas fa-exclamation-triangle text-danger"></i> aktiviert</td></tr>';
                    }
                    $return .= '<tr><th>' . rex_i18n::msg('phpmailer_host') . '</th><td>' . $a['list']->getValue('host') . ':' . $a['list']->getValue('port') . '</td></tr>';

                    if (0 == $a['list']->getValue('security_mode')) {
                        $return .= '<tr><th>' . rex_i18n::msg('phpmailer_security_mode') . '</th><td>' . rex_i18n::msg('phpmailer_security_mode_manual') . '</td></tr>';
                    } else {
                        $return .= '<tr><th>' . rex_i18n::msg('phpmailer_security_mode') . '</th><td>' . rex_i18n::msg('phpmailer_security_mode_auto') . '</td></tr>';
                    }

                    $return .= '<tr><th>' . rex_i18n::msg('phpmailer_smtp_secure') . '</th><td>' . $a['list']->getValue('smtpsecure') . '</td></tr>';

                    if (0 == $a['list']->getValue('smtpauth')) {
                        $return .= '<tr><th>' . rex_i18n::msg('phpmailer_smtp_auth') . '</th><td>' . rex_i18n::msg('phpmailer_disabled') . '</td></tr>';
                    } else {
                        $return .= '<tr><th>' . rex_i18n::msg('phpmailer_smtp_auth') . '</th><td>' . rex_i18n::msg('phpmailer_enabled') . '</td></tr>';
                    }

                    $return .= '<tr><th>' . rex_i18n::msg('phpmailer_smtp_username') . '</th><td>' . $a['list']->getValue('username') . '</td></tr>';
                    $return .= '</table>';
                } else {
                    $return .= '<span class="badge badge-primary">' . $mailer . '</span>';
                }
                $return .= '</div>';
                return $return;
            },
        );

        // Überflüssige Columns entfernen
        $list->removeColumn('host');
        $list->removeColumn('port');
        $list->removeColumn('smtpsecure');
        $list->removeColumn('smtpauth');
        $list->removeColumn('smtpautotls');
        $list->removeColumn('smtp_debug');
        $list->removeColumn('username');

        // Kombiniere Absendername und Absenderadresse in einer Spalte
        $list->setColumnPosition('from', 2);
        $list->setColumnFormat(
            'from',
            'custom',
            static function ($a) {
                // fromname, form und Lesebestätigungsoption sowie bcc in einer Tabelle ausgeben
                $return = '<table class="table table-sm table-borderless text-nowrap">';
                $return .= '<tr><th>' . rex_i18n::msg('phpmailer_sender_name') . '</th><td>' . $a['list']->getValue('fromname') . '</td></tr>';
                $return .= '<tr><th>' . rex_i18n::msg('phpmailer_sender_email') . '</th><td>' . $a['list']->getValue('from') . '</td></tr>';
                $return .= '<tr><th>' . rex_i18n::msg('phpmailer_confirm') . '</th><td>' . ($a['list']->getValue('confirmto') ? '<i class="fas fa-times text-danger"></i> ' . $a['list']->getValue('confirmto') : '') . '</td></tr>';
                $return .= '<tr><th>' . rex_i18n::msg('phpmailer_bcc') . '</th><td>' . ($a['list']->getValue('bcc') ? '<i class="fas fa-times text-danger"></i> ' . $a['list']->getValue('bcc') : '') . '</td></tr>';
                $return .= '<tr><th>' . rex_i18n::msg('mailer_profile_returnto_email') . '</th><td>' . ($a['list']->getValue('returnto') ? '<i class="fas fa-times text-danger"></i> ' . $a['list']->getValue('returnto') : '') . '</td></tr>';
                $return .= '</table>';
                return $return;
            },
        );
        $list->removeColumn('fromname');
        $list->removeColumn('confirmto');
        $list->removeColumn('bcc');
        $list->removeColumn('returnto');

        // Zusätzliche Einstellungen des Profils ausgeben, z.B. E-Mail-Log und E-Mail-Archivierung aktiviert
        $list->addColumn('settings', 'Einstellungen', 4);
        $list->setColumnLabel('settings', 'Einstellungen und zusätzliche Header');

        $list->setColumnFormat(
            'settings',
            'custom',
            static function ($a) {
                $return = '<table class="table table-sm table-borderless text-nowrap">';
                $return .= '<tr><th>' . rex_i18n::msg('phpmailer_logging') . '</th><td>' . ($a['list']->getValue('logging') ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>') . '</td></tr>';
                $return .= '<tr><th>' . rex_i18n::msg('phpmailer_archive') . '</th><td>' . ($a['list']->getValue('archive') ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>') . '</td></tr>';
                $return .= '</table>';

                $headers = json_decode($a['list']->getValue('header'), true);
                if (!is_array($headers)) {
                    return $return;
                }

                $return .= '<table class="table table-sm table-borderless text-nowrap">';
                foreach ($headers as $header) {
                    $return .= '<tr><th>' . $header[0] . '</th><td>' . $header[1] . '</td></tr>';
                }
                $return .= '</table>';
                return $return;
            },
        );
        $list->removeColumn('header');
        $list->removeColumn('logging');
        $list->removeColumn('archive');
    }
});
