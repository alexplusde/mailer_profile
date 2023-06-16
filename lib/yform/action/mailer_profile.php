<?php

class rex_yform_action_mailer_profile extends rex_yform_action_abstract
{
    public function executeAction(): void
    {
        $profile_id = (int) $this->getElement(2);
        if ($profile_id > 0) {
            $profile = mailer_profile::get($profile_id);
            if ($profile) {
                rex_addon::get('mailer_profile')->setConfig('current', $profile);
                rex_extension::register('PHPMAILER_CONFIG', ['mailer_profile', 'setProfile']);
            }
        }
    }

    public function getDescription(): string
    {
        return 'action|mailer_profile|profile_id|';
    }
}
