<?php

class GuestBookRecord
{
    protected string $record;

    public function __construct(string $record)
    {
        $this->record = $record;
    }

    public function getRecord(): string
    {
        return $this->record;
    }
}