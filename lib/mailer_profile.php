<?php

class mailer_profile extends rex_yform_manager_dataset
{
    public static function setProfile(rex_extension_point $ep): void
    {
        $mailer = $ep->getSubject();
        $profile = rex_addon::get('mailer_profile')->getConfig('current');

        if ($profile) {
            // $mailer->Timeout = $profile->getTimeout();
            // $mailer->XMailer = $profile->getXMailer();
            $mailer->From = $profile->getFrom();
            $mailer->FromName = $profile->getFromName();
            $mailer->ConfirmReadingTo = $profile->getConfirmReadingTo();
            $mailer->Mailer = $profile->getMailer();
            if ('smtp' == $profile->getMailer() && $mailer->Username = $profile->getUsername()) {
                $mailer->Host = $profile->getHost();
                $mailer->Port = $profile->getPort();
                $mailer->SMTPDebug = $profile->getSMTPDebug();
                $mailer->SMTPSecure = $profile->getSMTPSecure();
                $mailer->SMTPAuth = $profile->getSMTPAuth();
                $mailer->SMTPAutoTLS = $profile->getSMTPAutoTLS();
                $mailer->Username = $profile->getUsername();
                $mailer->Password = $profile->getPassword();
            }
            $mailer->CharSet = $profile->getCharset();
            $mailer->WordWrap = $profile->getWordWrap();
            $mailer->Encoding = $profile->getEncoding();
            $mailer->Priority = $profile->getPriority();
            // $mailer->archive = $profile->getArchive();
            // dump($mailer);
        }
    }

    public function getName(): string
    {
        return $this->getValue('name');
    }

    public function getTimeout(): int
    {
        return $this->getValue('timeout');
    }

    public function getArchive(): string
    {
        return $this->getValue('archive');
    }

    public function getFrom(): string
    {
        return $this->getValue('from');
    }

    public function getFromName(): string
    {
        return $this->getValue('fromname');
    }

    public function getConfirmReadingTo(): string
    {
        return $this->getValue('confirmto');
    }

    public function getMailer(): string
    {
        return $this->getValue('mailer');
    }

    public function getHost(): string
    {
        return $this->getValue('host');
    }

    public function getPort(): int
    {
        return $this->getValue('port');
    }

    public function getCharSet(): string
    {
        return $this->getValue('charset');
    }

    public function getWordWrap(): int
    {
        return $this->getValue('wordwrap');
    }

    public function getEncoding(): string
    {
        return $this->getValue('encoding');
    }

    public function getSMTPDebug(): bool
    {
        return $this->getValue('smtp_debug');
    }

    public function getSMTPSecure(): string
    {
        return $this->getValue('smtpsecure');
    }

    public function getSMTPAuth(): bool
    {
        return $this->getValue('smtpauth');
    }

    public function getSMTPAutoTLS(): bool
    {
        return $this->getValue('security_mode');
    }

    public function getUsername(): string
    {
        return $this->getValue('username');
    }

    public function getPassword(): string
    {
        return $this->getValue('password');
    }

    public function getPriority(): ?int
    {
        if (0 == $this->getValue('priority')) {
            return null;
        }
        return $this->getValue('priority');
    }

    public function getHeader(): array
    {
        if(!$this->getValue('header')) {
            return null;
        }
        return json_decode($this->getValue('header'), true);
    }
}
