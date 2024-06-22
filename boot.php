<?php

if (rex_addon::get('yform')->isAvailable() && rex_addon::get('phpmailer')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_mailer_profile',
        mailer_profile::class,
    );
}

// Listendarstellung in YForm verbessern

rex_extension::register('YFORM_DATA_LIST', function ($ep) {
    if ($ep->getParam('table')->getTableName()=="rex_mailer_profile") {
        // @var rex_list $list
        $list = $ep->getSubject();

        // Reihenfolge verändern: Zuerst `mailer_type`
        $list->setColumnPosition('mailer', 3);
        $list->setColumnFormat(
            'mailer',
            'custom',
            function ($a) {
                // Gebe den Wert des Mailertyps als Bootstrap-Badge aus, darunter die Werte zu Authentifizierung und Benutzername
                $mailer = $a['list']->getValue('mailer');
                $return = '<div class="text-nowrap">';
                if ($mailer == 'smtp') {
                    $return .= '<table class="table table-sm table-borderless text-nowrap">';
                    if ($a['list']->getValue('smtp_debug') > 0) {
                        $return .= '<tr><th>Debugging:</th><td><i class="fas fa-exclamation-triangle text-danger"></i> aktiviert</td></tr>';
                    }
                    $return .= '<tr><th>Host:</th><td>'. $a['list']->getValue('host') . ':'. $a['list']->getValue('port'). '</td></tr>';
                    $return .= '<tr><th>SMTPSecure:</th><td>'. $a['list']->getValue('smtpsecure'). '</td></tr>';;
                    $return .= '<tr><th>SMTPAuth:</th><td>'. $a['list']->getValue('smtpauth'). '</td></tr>';;
                    $return .= '<tr><th>SMTPAutoTLS:</th><td>'. $a['list']->getValue('smtpautotls'). '</td></tr>';;
                    $return .= '<tr><th>Username:</th><td>'. $a['list']->getValue('username'). '</td></tr>';;
                    $return .= '</table>';
    
                } else {
                    $return .= '<span class="badge badge-primary">'. $mailer .'</span>';
                }
                $return .= '</div>';
                return $return;
            }
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
        $list->setColumnFormat(
            'from',
            'custom',
            function ($a) {
                // fromname, form und Lesebestätigungsoption sowie bcc in einer Tabelle ausgeben
                $return = '<table class="table table-sm table-borderless text-nowrap">';
                $return .= '<tr><th>Name:</th><td>'. $a['list']->getValue('fromname').'</td></tr>';
                $return .= '<tr><th>E-Mail:</th><td>'. $a['list']->getValue('from') .'</td></tr>';
                $return .= '<tr><th>Lesebestätigung:</th><td>'. ($a['list']->getValue('confirmto') ? '<i class="fas fa-times text-danger"></i> '. $a['list']->getValue('confirmto') : '') .'</td></tr>';
                $return .= '<tr><th>BCC:</th><td>'. ($a['list']->getValue('bcc') ? '<i class="fas fa-times text-danger"></i> '. $a['list']->getValue('bcc') : '') .'</td></tr>';
                $return .= '</table>';
                return $return;
            }
        );
        $list->removeColumn('fromname');
        $list->removeColumn('confirmto');
        $list->removeColumn('bcc');

        // Zusätzliche Header als Tabelle ausgeben
        $list->setColumnFormat(
            'header',
            'custom',
            function ($a) {
                // Serialisierten Header umwandeln
                $headers = json_decode($a['list']->getValue('header'), true);
                if(!is_array($headers)) return '';

                $return = '<table class="table table-sm table-borderless text-nowrap">';
                foreach ($headers as $header) {
                    $return .= '<tr><th>'. $header[0] .'</th><td>'. $header[1] .'</td></tr>';
                }
                $return .= '</table>';
                return $return;
            }
        );

        // Zusätzliche Einstellungen des Profils ausgeben, z.B. E-Mail-Log und E-Mail-Archivierung aktiviert
        $list->addColumn('settings', 'Einstellungen', 4);
        $list->setColumnLabel('settings', 'Einstellungen');

        $list->setColumnFormat(
            'settings',
            'custom',
            function ($a) {
                $return = '<table class="table table-sm table-borderless text-nowrap">';
                $return .= '<tr><th>Log:</th><td>'. ($a['list']->getValue('logging') ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>') .'</td></tr>';
                $return .= '<tr><th>Archivierung:</th><td>'. ($a['list']->getValue('archive') ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>') .'</td></tr>';
                $return .= '</table>';
                return $return;
            }
        );

        $list->removeColumn('logging');
        $list->removeColumn('archive');

    }
});
