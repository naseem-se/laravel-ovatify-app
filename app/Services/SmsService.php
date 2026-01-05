<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;

class SmsService
{
    public function send(string $phone, string $message): bool
    {
        // implement using provider API (Twilio/Nexmo etc)
        // return true on success, false on fail or throw exception
        Log::info("SMS to {$phone}: {$message}");
        return true;
    }
}
