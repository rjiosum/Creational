<?php declare(strict_types=1);

namespace App\Classes;

use App\Abstracts\Notifier;

class Email extends Notifier
{
    protected $from;

    public function __construct($to, $from)
    {
        parent::__construct($to);

        if (isset($from)) {
            $this->from = $from;
        } else {
            $this->from = 'Anonymous';
        }
    }

    public function validate(): bool
    {
        $isEmail = filter_var($this->to, FILTER_VALIDATE_EMAIL);
        return $isEmail ? true : false;
    }

    public function send(): string
    {
        if (!$this->validate()) {
            throw new \InvalidArgumentException(
                sprintf("%s is an invalid email address", $this->to)
            );
        }
        return "This is an " .get_class($this)." to " . $this->to . " from " . $this->from . PHP_EOL;
    }
}