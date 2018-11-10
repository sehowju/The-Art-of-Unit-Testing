<?php

namespace Ch4\Src;

class LogAnalyzerEmailInfo
{
    public $service;
    public $email;
    public $emailInfo;

    public function __construct(WebServiceInterface $service, EmailServiceByEmailInfoInterface $email)
    {
        $this->service = $service;
        $this->email = $email;
    }

    public function analyze(string $fileName)
    {
        if (strlen($fileName) < 8) {
            try {
                $this->service->logError("Filename too short: " . $fileName);
            } catch (\Exception $e) {
                $emailInfo = new EmailInfo();
                $emailInfo->to = "someone@somewhere.com";
                $emailInfo->subject = "can't log";
                $emailInfo->body = $e->getMessage();
                $this->email->sendEmail($emailInfo);
            }
        }
    }
}
