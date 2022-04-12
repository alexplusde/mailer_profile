<?php
class mailer_profile extends \rex_yform_manager_dataset
{
    public static function epMailerProfile($profile)
    {
        self::get($profile);

        $profile->Timeout = $this->getTimeout();
        $profile->XMailer = $this->getXMailer();
        $profile->From = $this->getFrom();
        $profile->FromName = $this->getFromName();
        $profile->ConfirmReadingTo = $this->getConfirmReadingTo();
        $profile->Mailer = $this->getMailer();
        $profile->Host = $this->getHost();
        $profile->Port = $this->getPort();
        $profile->CharSet = $this->getCharset();
        $profile->WordWrap = $this->getWordWrap();
        $profile->Encoding = $this->getEncoding();
        $profile->Priority = $this->getPriority();
        $profile->SMTPDebug = $this->getSMTPDebug();
        $profile->SMTPSecure = $this->getSMTPSecure();
        $profile->SMTPAuth = $this->getSMTPAuth();
        $profile->SMTPAutoTLS = $this->getSMTPAutoTLS();
        $profile->Username = $this->getUsername();
        $profile->Password = $this->getPassword();
        $profile->archive = $this->getArchive();

        return $profile;
    }

    public function getName() :string
    {
        return $this->getValue('name');
    }
    public function getArchive() :string
    {
        return $this->getValue('name');
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
