<?php

namespace App\Custom\Helpers;

//https://github.com/amrshawky/laravel-currency
//created by premlamsal2@gmail.com
use AmrShawky\LaravelCurrency\Facade\Currency;

class CustomCurrency
{

    public static function convertCurrency($amount, $from_currency, $to_currency)
    {
        $val =  Currency::convert()
            ->from($from_currency)
            ->to($to_currency)
            ->source('crypto')
            ->amount($amount)
            ->get();

        return $val . " " . $to_currency;
    }
    public static function convertCurrencyOne($amount, $from_currency, $to_currency)
    {
        $val =  Currency::convert()
            ->from($from_currency)
            ->to($to_currency)
            ->source('crypto')
            ->amount($amount)
            ->get();

        return $val;
    }

    public static function prem()
    {
        return "helloprem";
    }
}
