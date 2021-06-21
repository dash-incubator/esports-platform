<?php declare(strict_types=1);

namespace System\Mail;

use Contracts\Mail\{Mail, Mailer as Contract};
use Mail as PEARMail;
Use PEAR;

class Mailer implements Contract
{

    private $host;

    private $persist;

    private $port;

    private $smtp;


    public function __construct(string $host, bool $persist, int $port)
    {
        $this->host = $host;
        $this->persist = $persist;
        $this->port = $port;
    }


    private function getSMTP()
    {
        if (is_null($this->smtp)) {
            $this->smtp = PEARMail::factory('smtp', [
                'host' => $this->host,
                'persist' => $this->persist,
                'port' => $this->port
            ]);
        }

        return $this->smtp;
    }


    public function send(Mail $mail) : bool
    {
        return !PEAR::isError(
            $this->getSMTP()->send(
                $mail->getTo(),
                $mail->getHeaders(),
                $mail->getBody()
            )
        );
    }
}
