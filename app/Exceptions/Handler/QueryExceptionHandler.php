<?php

namespace App\Exceptions\Handler;

class QueryExceptionHandler
{
    public const INTEGRITY_CONSTRAINT_VIOLATION = "23000";
    private string $code;
    private string $agent;
    private string $target;


    public function __construct(string $code, string $agent, string $targert)
    {
        $this->code = $code;
        $this->agent = $agent;
        $this->target = $targert;
    }

    public function getMessage(): string
    {
        $messages = [
            "23000" => "Erro! Existe um {$this->target} vinculado este {$this->agent}! Será necessário sua desvinculação!"
        ];

        return $messages[$this->code];
    }
}
