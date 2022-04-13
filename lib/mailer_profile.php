<?php
class mailer_profile extends \rex_yform_manager_dataset
{
    public static function setProfile($ep)
    {
        $mailer = $ep->getSubject();
        $profile = rex_addon::get("mailer_profile")->getConfig("current");

        if ($profile) {
            // $mailer->Timeout = $profile->getTimeout();
            // $mailer->XMailer = $profile->getXMailer();
            $mailer->From = $profile->getFrom();
            $mailer->FromName = $profile->getFromName();
            $mailer->ConfirmReadingTo = $profile->getConfirmReadingTo();
            $mailer->Mailer = $profile->getMailer();
            $mailer->Host = $profile->getHost();
            $mailer->Port = $profile->getPort();
            $mailer->CharSet = $profile->getCharset();
            $mailer->WordWrap = $profile->getWordWrap();
            $mailer->Encoding = $profile->getEncoding();
            $mailer->Priority = $profile->getPriority();
            $mailer->SMTPDebug = $profile->getSMTPDebug();
            $mailer->SMTPSecure = $profile->getSMTPSecure();
            $mailer->SMTPAuth = $profile->getSMTPAuth();
            $mailer->SMTPAutoTLS = $profile->getSMTPAutoTLS();
            $mailer->Username = $profile->getUsername();
            $mailer->Password = $profile->getPassword();
            // $mailer->archive = $profile->getArchive();
            dump($mailer);
        }
    }

    public function getName() :string
    {
        return $this->getValue('name');
    }
    public function getTimeout() :int
    {
        return $this->getValue('timeout');
    }
    public function getArchive() :string
    {
        return $this->getValue('archive');
    }
    public function getFrom()
    {
        return $this->getValue('from');
    }
    public function getFromName()
    {
        return $this->getValue('fromname');
    }
    public function getConfirmReadingTo()
    {
        return $this->getValue('confirmto');
    }
    public function getMailer()
    {
        return $this->getValue('mailer');
    }
    public function getHost()
    {
        return $this->getValue('host');
    }
    public function getPort()
    {
        return $this->getValue('port');
    }
    public function getCharSet()
    {
        return $this->getValue('charset');
    }
    public function getWordWrap()
    {
        return $this->getValue('wordwrap');
    }
    public function getEncoding()
    {
        return $this->getValue('encoding');
    }
    public function getSMTPDebug()
    {
        return $this->getValue('smtp_debug');
    }
    public function getSMTPSecure()
    {
        return $this->getValue('smtpsecure');
    }
    public function getSMTPAuth()
    {
        return $this->getValue('smtpauth');
    }
    public function getSMTPAutoTLS()
    {
        return $this->getValue('security_mode');
    }
    public function getUsername()
    {
        return $this->getValue('username');
    }
    public function getPassword()
    {
        return $this->getValue('password');
    }
    public function getPriority()
    {
        if (0 == $this->getValue('priority')) {
            return null;
        }
        return $this->getValue('priority');
    }
}
