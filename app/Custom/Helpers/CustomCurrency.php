<?php

namespace App\Custom\Helpers;

//https://github.com/amrshawky/laravel-currency
//created by premlamsal2@gmail.com
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Http\Controllers\CoinPaymentController;

class CustomCurrency
{

    public static function convertCurrency($amount, $from_currency, $to_currency)
    {


        $coin_payment_instance = new CoinPaymentController();
        $val_exchange_rate_one_usd_to_btc = $coin_payment_instance->getRates();

        //this $val will get current exchage rate from 1 usd equal to certain btc

        if ($from_currency == 'usd' && $to_currency == 'btc') {
            $cal_val = $amount * $val_exchange_rate_one_usd_to_btc;
            $cal_val = number_format($cal_val, 8, '.', '');
        } elseif ($from_currency == 'btc' && $to_currency == 'usd') {
            $cal_val = $amount / $val_exchange_rate_one_usd_to_btc;
            $cal_val = number_format($cal_val, 8, '.', '');
        } elseif ($from_currency === 'usd' && $to_currency === 'usd') {
            $cal_val = $amount;
            // $cal_val = number_format($cal_val, 8, '.', '');
        } else {
            return 0;
        }


        return $cal_val . " " . $to_currency;






        // return $data;
        //r$val =  Currency::convert()
        //     ->from($from_currency)
        //     ->to($to_currency)
        //     ->source('crypto')
        //     ->amount($amount)
        //     ->get();





    }
    public static function convertCurrencyOne($amount, $from_currency, $to_currency)
    {
        // $val =  Currency::convert()
        //     ->from($from_currency)
        //     ->to($to_currency)
        //     ->source('crypto')
        //     ->amount($amount)
        //     ->get();

        // return $val;


        $coin_payment_instance = new CoinPaymentController();
        $val_exchange_rate_one_usd_to_btc = $coin_payment_instance->getRates();


        //this $val will get current exchage rate from 1 usd equal to certain btc

        if ($from_currency === 'usd' && $to_currency === 'btc') {
            $cal_val = $amount * $val_exchange_rate_one_usd_to_btc;
            $cal_val = number_format($cal_val, 8, '.', '');
        } elseif ($from_currency === 'btc' && $to_currency === 'usd') {
            $cal_val = $amount / $val_exchange_rate_one_usd_to_btc;
            $cal_val = number_format($cal_val, 8, '.', '');
        } elseif ($from_currency === 'usd' && $to_currency === 'usd') {
            $cal_val = $amount;
            // $cal_val = number_format($cal_val, 8, '.', '');
        } else {
            return 0;
        }


        return $cal_val;
    }

    public static function prem()
    {
        return "helloprem";
    }
}
