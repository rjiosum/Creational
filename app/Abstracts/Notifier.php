<?php declare(strict_types=1);

namespace App\Abstracts;


abstract class Notifier
{
    protected $to;
    public function __construct($to)
    {
        $this->to = $to;
    }
    abstract public function validate() : bool;
    abstract public function send(string $message) : string;
}