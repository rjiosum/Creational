<?php declare(strict_types=1);

namespace App\Factory;

use App\Classes\Email;
use App\Classes\Sms;
use Exception;

class NotifierFactory
{
    /**
     * @param $notifier
     * @param $to
     * @return Email|Sms
     * @throws Exception
     */
    public static function notify($notifier, $to)
    {
        if (empty($notifier)) {
            throw new Exception("No notifier passed.");
        }
        switch ($notifier) {
            case 'SMS':
                return new SMS($to);
                break;
            case 'Email':
                return new Email($to, 'Raj');
                break;
            default:
                throw new Exception("Invalid Notifier.");
                break;
        }
    }
}