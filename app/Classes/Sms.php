<?php declare(strict_types=1);

namespace App\Classes;

use App\Abstracts\Notifier;

class Sms extends Notifier
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        $pattern = '/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/';
        $isPhone = preg_match($pattern, $this->to);
        return $isPhone ? true : false;
    }

    /**
     * @return string
     * @throws \InvalidArgumentException
     */
    public function send() : string
    {
        if(!$this->validate()){
            throw new \InvalidArgumentException(
                sprintf("%s is an invalid phone number.", $this->to)
            );
        }
        return "This is a ".get_class($this)." to ".$this->to ."." . PHP_EOL;
    }
}