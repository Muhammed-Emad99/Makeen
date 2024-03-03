<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\Setting;


class SiteSetting
{
    public static function getSetting($key, $lang = null)
    {

        if ($lang == null) {

            $setting = Setting::where('key', $key)->first();
        } else {

            $setting = Setting::where('key', $key . '_' . $lang)->first();
        }

        return $setting;
    }
    public static function setLang($lang)
    {
        if ($lang) {

            app()->setLocale($lang);
        } else {
            app()->setLocale('ar');
        }
        Carbon::setLocale($lang);
    }
}

//function getSetting($key, $lang = null)
//{
//
//    if ($lang == null) {
//
//        $setting = Setting::where('key', $key)->first();
//    } else {
//
//        $setting = Setting::where('key', $key . '_' . $lang)->first();
//    }
//
//    return $setting;
//}
//function setLang($lang)
//{
//    if ($lang) {
//
//        app()->setLocale($lang);
//    } else {
//        app()->setLocale('ar');
//    }
//    Carbon::setLocale($lang);
//}
