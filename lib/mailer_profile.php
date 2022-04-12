<?php
class mailer_profile extends \rex_yform_manager_dataset
{
    public static function epMailerProfile($ep)
    {
        $current = $ep->getSubject();
        $profile = self::get(1); // TODO: Richtige ID in Abhängig von xyz laden.

        $current->Timeout = $profile->getTimeout();
        $current->XMailer = $profile->getXMailer();
        $current->From = $profile->getFrom();
        $current->FromName = $profile->getFromName();
        $current->ConfirmReadingTo = $profile->getConfirmReadingTo();
        $current->Mailer = $profile->getMailer();
        $current->Host = $profile->getHost();
        $current->Port = $profile->getPort();
        $current->CharSet = $profile->getCharset();
        $current->WordWrap = $profile->getWordWrap();
        $current->Encoding = $profile->getEncoding();
        $current->Priority = $profile->getPriority();
        $current->SMTPDebug = $profile->getSMTPDebug();
        $current->SMTPSecure = $profile->getSMTPSecure();
        $current->SMTPAuth = $profile->getSMTPAuth();
        $current->SMTPAutoTLS = $profile->getSMTPAutoTLS();
        $current->Username = $profile->getUsername();
        $current->Password = $profile->getPassword();
        $current->archive = $profile->getArchive();

        return $current;
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
