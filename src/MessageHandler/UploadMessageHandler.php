<?php

namespace App\MessageHandler;

use App\Message\UploadMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UploadMessageHandler implements MessageHandlerInterface
{
    // example if symfony app must consume the messages
    public function __invoke(UploadMessage $message)
    {
        dd($message);
    }
}