<?php

namespace App\Message;

class UploadMessage
{
    public function __construct(private string $upload, private string $user)
    {
    }

    public function getUpload(): string
    {
        return $this->upload;
    }

    public function getUser(): string
    {
        return $this->user;
    }


}