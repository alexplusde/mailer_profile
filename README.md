# Mailer Profile für REDAXO 5

Erweitert das Core-Addon `phpmailer` um die Möglichkeit, unterschiedliche Absende-Profile und Postfächer-Konfigurationen vorzunehmen. 

![image](https://github.com/alexplusde/mailer_profile/assets/3855487/5fc79c3d-ef02-4e06-bf40-377287f2e3d6)

## Features

* Lege unterschiedliche Absendeprofile, z.B. mit unterschiedlichen Absendeadressen, Absendenamen und SMTP-Zugangsdaten an.
* Verwalte und verknüpfe diese Informationen bequem mit YForm

> **Hinweis:** Weitere Features wie der Testversand sind noch nicht in Planung. Beteilige dich an der Entwicklung unter https://github.com/alexplusde/mailer_profile/, dann wird dieses Addon vielleicht ein FriendsOfREDAXO-Addon. :)

### Installation und Konfiguration

Nach Installation dieses Addons über den Installer stehen im Backend unter `PHPMAiler` > `Profile` eine YForm-Eingabe zur Verfügung.

* Erstelle ein neues Profil über `+`
* Trage die gewünschten Informationen ein und bestätige mit Speichern
* Verwende die Action `action|mailer_profile|#` vor deiner E-Mail-Action (z.B. `tpl2email`) mit der gewünschten Profil-ID in deinem YForm-Formular oder verwende den offiziellen EP wie folgt an der passenden Stelle deines Codes:

```
$profile = mailer_profile::get($profile_id); // Profil-ID anpassen
if ($profile) {
    rex_extension::register('PHPMAILER_CONFIG', function (rex_extension_point $ep, $profile) {
        $subject = $ep->getSubject();
        mailer_profile::setProfile($subject, $profile);
    });
}
```

> **Hinweis:** Angaben in YForm E-Mail-Templates (Absender/Empfänger) gewinnen gegenüber den Einstellungen in Mailer Profile.

> **Tipp** Verwende die Action `mailer_profile` mehrfach zwischen unterschiedlichen E-Mail-Actions (z.B. `tpl2email`), wenn verschiedene Konfigurationen pro E-Mail-Action benötigt werden.

> **Tipp** Wird SMTP ausgewählt, jedoch kein Nutzername angegeben, so werden die Einstellungen von der Hauptkonfiguration in PHPMailer übernommen.

### Mailer Profile erweitern

> **Hinweis:** Weitere Features wie der Testversand sind noch nicht in Planung. Beteilige dich an der Entwicklung unter https://github.com/alexplusde/mailer_profile/, dann wird dieses Addon vielleicht ein FriendsOfREDAXO-Addon. :)

## Lizenz

MIT Lizenz, siehe [LICENSE.md](https://github.com/alexplusde/mailer_profile/blob/master/LICENSE.md)  

## Autoren

**Alexander Walther**  

* http://www.alexplus.de  
* https://github.com/alexplusde  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)

## Credits

* Danke an [Stefan Dannfald](https://github.com/dpf-dd) für die Vorbereitung des passenden YForm Tablesets.

* Danke an [Thomas Skerbis](https://github.com/skerbis) für die unfassbar gute Vorarbeit beim REDAXO-Mailer, ohne die es dieses Addon nicht geben würde.
