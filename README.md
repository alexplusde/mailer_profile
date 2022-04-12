# Dummy - Dieses Repository kopieren, anpassen, AddOn-Entwicklung für REDAXO starten

Ein REDAXO-Dummy-Addon für einen schnelleren Start bei der Addon-Entwicklung. 

1. https://github.com/alexplusde/dummy/archive/refs/heads/main.zip ZIP der aktuellen Vorlage herunterladen oder direkt in GitHub ein Repo auf Basis von `alexplusde/dummy` erstellen: https://github.com/new/import und dort `https://github.com/alexplusde/dummy.git` angeben.
2. Mit "Suchen und Ersetzen" alles, was `dummy` heißt, durch den Namen deines Addons ersetzen, z.B. `supi-dupi-kalender`, und speichern. Sowohl Dateinamen, als auch Dateiinhalte. 
3. Alles löschen, was du aktuell nicht brauchst (oder für später auskommentiert lassen)

## Features

### `package.yml`

Bei Bedarf Abhängigkeiten von REDAXO-AddOns (sog. packages) eintragen, Backend-Seiten aus oder einblenden, vordefinierte Konfigurationswerte setzen.

### `boot.php`

Gängige Code-Beispiele wie der Syntax zum Überprüfen einer Addon-Installation, der Unterscheidung zwischen Front- und Backend, dem Registrieren eigener YForm-Dataset-Klasen.

### `install.php`

Gängige Code-Beispiele zum Installieren von YForm-Tablesets, Meta-Infofeldern und dem Verwenden von Extension Points, Cronjobs u.a.

### `dataedit.php` für YForm-Datentabellen

Dein Addon nutzt YForm als Ausgangsbasis? Nutze YForm-Tabellen innerhalb deiner Addon-Seiten via https://friendsofredaxo.github.io/tricks/addons/yform/im-addon

## `update.php`

Gängige Code-Beispiele, die in Abhängigkeit der Vorgänger-Version deines Addons ausgeführt werden.

## `uninstall.php`

Alle Code-Beispiele, die du in der `install.php` nutzt, können hier wieder rückkgängig gemacht werden.

### `lang/`

Blaupause für deine eigene Sprachdatei. Beginne die Addon-Entwicklung direkt so, dass weitere Sprachen ohne Anpassungen ergänzt werden können.

### `fragmente/`

Blaupause für die Nutzung eigener Fragmente.

### Docs-Seite

Passe diese README.md-Datei an und spiele sie als Hilfe-Seite zu deinem Addon aus. Halte dich an die Struktur dieser README.md-Datei für deine eigenen Addons, indem du die wichtigsten Funktionen, Klassen und Methoden sowie den Installationsprozess und die Funktionsweise erklärst. Mit Verweis auf die Autoren, Projekt-Lead und Credits.

### Einstellungs-Seite

Beginne mit einem Konfigurations-Formular, das bereits best practice in REDAXO umsetzt - mit Links zu den wichtigsten API-Docs.

## Lizenz

MIT Lizenz, siehe [LICENSE.md](https://github.com/alexplusde/dummy/blob/master/LICENSE.md)  

## Autoren

**Alexander Walther**  
http://www.alexplus.de  
https://github.com/alexplusde  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)

## Credits

Danke an [Christoph Böcker](https://github.com/christophboecker) für die Basis zur Nutzung von YForm in Addons
