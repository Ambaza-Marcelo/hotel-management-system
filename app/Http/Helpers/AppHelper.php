<?php

namespace App\Http\Helpers;

use App\SiteMeta;
use Carbon\Carbon;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;


class AppHelper
{


    const weekDays = [
        0 => "Sunday",
        1 => "Monday",
        2 => "Tuesday",
        3 => "Wednesday",
        4 => "Thursday",
        5 => "Friday",
        6 => "Saturday",
    ];

    const GENDER = [
        1 => 'Male',
        2 => 'Female'
    ];


    public static function sendNotificationToUsers($users, $type, $message)
    {
        Notification::send($users, new UserActivity($type, $message));

        return true;
    }

}
