<?php

# in der uninstall.php sollten Befehle ausgeführt werden, die alle Änderungen, die mit der Installation kamen, entfernen.

# Konfiguration entfernen
# rex_config::removeNamespace("dummy");

# Installierte Metainfos entfernen
# rex_metainfo_delete_field('art_dummy');
# rex_metainfo_delete_field('cat_dummy');
# rex_metainfo_delete_field('med_dummy');
# rex_metainfo_delete_field('clang_dummy');

# Zusäzliche Verzeichnisse entfernen, z.B.
# rex_dir::delete(rex_path::get('dummy'), true);

# YForm-Tabellen löschen (die YForm-Tabellendefinition wird gelöscht, nicht die Datenbank-Tabellen)
# rex_yform_manager_table_api::removeTable('rex_dummy');

# Weitere Vorgänge
# ...
