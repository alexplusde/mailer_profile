<?php

class mailer_profile extends rex_yform_manager_dataset
{
    public static function setProfile(rex_extension_point $ep): void
    {
        $mailer = $ep->getSubject();
        /* @var rex_mailer $mailer */
        $profile = rex_addon::get('mailer_profile')->getConfig('current');
        /* @var mailer_profile $profile */

        if ($profile) {
            // $mailer->Timeout = $profile->getTimeout();
            // $mailer->XMailer = $profile->getXMailer();
            $mailer->From = $profile->getFrom();
            $mailer->FromName = $profile->getFromName();
            $mailer->ConfirmReadingTo = $profile->getConfirmReadingTo();
            $mailer->Sender = $profile->getReturnto();
            $mailer->Mailer = $profile->getMailer();
            if ('smtp' == $profile->getMailer() && $mailer->Username = $profile->getUsername()) {
                $mailer->Host = $profile->getHost();
                $mailer->Port = $profile->getPort();
                $mailer->SMTPDebug = $profile->getSmtpDebug();
                $mailer->SMTPSecure = $profile->getSmtpSecure();
                $mailer->SMTPAuth = $profile->getSmtpAuth();
                $mailer->SMTPAutoTLS = $profile->getSmtpAutoTls();
                $mailer->Username = $profile->getUsername();
                $mailer->Password = $profile->getPassword();
            }
            if ($profile->getHeader()) {
                foreach ($profile->getHeader() as $key => $value) {
                    $mailer->addCustomHeader($key, $value);
                }
            }
            $mailer->CharSet = $profile->getCharset();
            $mailer->WordWrap = $profile->getWordWrap();
            $mailer->Encoding = $profile->getEncoding();
            $mailer->Priority = $profile->getPriority();
            // $mailer->archive = $profile->getArchive();
            // dump($mailer);
        }
    }

    /* Absendername */
    /** @api */
    public function getFromName(): ?string
    {
        return $this->getValue('fromname');
    }

    /** @api */
    public function setFromName(mixed $value): self
    {
        $this->setValue('fromname', $value);
        return $this;
    }

    /* Absenderadresse */
    /** @api */
    public function getFrom(): ?string
    {
        return $this->getValue('from');
    }

    /** @api */
    public function setFrom(mixed $value): self
    {
        $this->setValue('from', $value);
        return $this;
    }

    /* Lesebestätigung an */
    /** @api */
    public function getConfirmReadingTo(): ?string
    {
        return $this->getValue('confirmto');
    }

    /** @api */
    public function setConfirmReadingTo(mixed $value): self
    {
        $this->setValue('confirmto', $value);
        return $this;
    }

    /* Blindkopie(BCC) an */
    /** @api */
    public function getBcc(): ?string
    {
        return $this->getValue('bcc');
    }

    /** @api */
    public function setBcc(mixed $value): self
    {
        $this->setValue('bcc', $value);
        return $this;
    }

    /* Mailer-Typ */
    /** @api */
    public function getMailer(): ?string
    {
        return $this->getValue('mailer');
    }

    /** @api */
    public function setMailer(mixed $value): self
    {
        $this->setValue('mailer', $value);
        return $this;
    }

    /* Host */
    /** @api */
    public function getHost(): ?string
    {
        return $this->getValue('host');
    }

    /** @api */
    public function setHost(mixed $value): self
    {
        $this->setValue('host', $value);
        return $this;
    }

    /* Port */
    /** @api */
    public function getPort(): ?float
    {
        return $this->getValue('port');
    }

    /** @api */
    public function setPort(float $value): self
    {
        $this->setValue('port', $value);
        return $this;
    }

    /* Verschlüsselung */
    /** @api */
    public function getSmtpAutoTls(): ?string
    {
        return $this->getValue('security_mode');
    }

    public function setSmtpAutoTls(mixed $value): self
    {
        $this->setValue('security_mode', $value);
        return $this;
    }

    public function getReturnto(): string
    {
        return $this->getValue('returnto');
    }


    /* Verschlüsselungstyp */
    /** @api */
    public function getSmtpsecure(): ?string
    {
        return $this->getValue('smtpsecure');
    }

    /** @api */
    public function setSmtpsecure(mixed $value): self
    {
        $this->setValue('smtpsecure', $value);
        return $this;
    }

    /* Authentifizierung */
    /** @api */
    public function getSmtpAuth(): ?string
    {
        return $this->getValue('smtpauth');
    }

    /** @api */
    public function setSmtpAuth(mixed $value): self
    {
        $this->setValue('smtpauth', $value);
        return $this;
    }

    /* Benutzername */
    /** @api */
    public function getUsername(): ?string
    {
        return $this->getValue('username');
    }

    /** @api */
    public function setUsername(mixed $value): self
    {
        $this->setValue('username', $value);
        return $this;
    }

    /* Passwort */
    /** @api */
    public function getPassword(): ?string
    {
        return $this->getValue('password');
    }

    /** @api */
    public function setPassword(mixed $value): self
    {
        $this->setValue('password', $value);
        return $this;
    }

    /* Zeichensatz */
    /** @api */
    public function getCharset(): ?string
    {
        return $this->getValue('charset');
    }

    /** @api */
    public function setCharset(mixed $value): self
    {
        $this->setValue('charset', $value);
        return $this;
    }

    /* Zeilenumbruch */
    /** @api */
    public function getWordwrap(): ?float
    {
        return $this->getValue('wordwrap');
    }

    /** @api */
    public function setWordwrap(float $value): self
    {
        $this->setValue('wordwrap', $value);
        return $this;
    }

    /* Kodierung */
    /** @api */
    public function getEncoding(): ?string
    {
        return $this->getValue('encoding');
    }

    /** @api */
    public function setEncoding(mixed $value): self
    {
        $this->setValue('encoding', $value);
        return $this;
    }

    /* Priorität */
    /** @api */
    public function getPriority(): ?string
    {
        return $this->getValue('priority');
    }

    /** @api */
    public function setPriority(mixed $value): self
    {
        $this->setValue('priority', $value);
        return $this;
    }

    /* Debug */
    /** @api */
    public function getSmtpDebug(): ?string
    {
        return $this->getValue('smtp_debug');
    }

    /** @api */
    public function setSmtpDebug(mixed $value): self
    {
        $this->setValue('smtp_debug', $value);
        return $this;
    }

    /* E-Mail-Log */
    /** @api */
    public function getLogging(): ?string
    {
        return $this->getValue('logging');
    }

    /** @api */
    public function setLogging(mixed $value): self
    {
        $this->setValue('logging', $value);
        return $this;
    }

    /* E-Mail-Archivierung */
    /** @api */
    public function getArchive(): ?string
    {
        return $this->getValue('archive');
    }

    /** @api */
    public function setArchive(mixed $value): self
    {
        $this->setValue('archive', $value);
        return $this;
    }

    /* Zusätzliche (X-)Header */
    /** @api */
    public function getHeader(): ?array
    {
        return json_decode($this->getValue('header'), true);
    }

    /** @api */
    public function setHeader(array|string $value): self
    {
        if (is_array($value)) {
            $value = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRESERVE_ZERO_FRACTION | JSON_PRETTY_PRINT | JSON_UNESCAPED_LINE_TERMINATORS | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
        }
        $this->setValue('header', $value);
        return $this;
    }
}
