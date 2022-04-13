<?php
class rex_yform_action_mailer_profile extends rex_yform_action_abstract
{
    public function executeAction() :void
    {
        $profile_id = $this->getElement(2);
        if ((int) $this->getElement(2) > 0) {
            $profile = mailer_profile::get($profile_id);
            if ($profile) {
                rex_extension::register('PHPMAILER_CONFIG', function (rex_extension_point $ep, $profile) {
                    $subject = $ep->getSubject();
                    mailer_profile::setProfile($subject, $profile);
                });
            }
        }
    }

    public function getDescription() :string
    {
        return 'action|mailer_profile|profile_id|';
    }
}
