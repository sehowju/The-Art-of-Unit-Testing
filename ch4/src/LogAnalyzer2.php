<?php

namespace Ch4\Src;

class LogAnalyzer2
{
    public $service;
    public $email;

    public function __construct(WebServiceInterface $service, EmailServiceInterface $email)
    {
        $this->service = $service;
        $this->email = $email;
    }

    public function analyze(string $fileName)
    {
        if (strlen($fileName) < 8) {
            // try {
                $this->service->logError("Filename too short: " . $fileName);
            // } catch (\Exception $e) {
                $this->email->sendEmail("someone@somewhere.com", "can't log", $e->getMessage());
            // }
        }
    }
}
