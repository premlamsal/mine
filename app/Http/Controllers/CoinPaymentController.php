<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\Helpers\CoinPaymentsAPI;
use App\Models\CoinWithdrawal;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CoinPaymentController extends Controller
{
    private $coin;

    //initializing the payment
    public function __construct()
    {
        $this->coin = new CoinPaymentsAPI();
        $this->coin->Setup("f556E66713133ACA41800AAC085028Dc2d37daCe90B2170F9afcfD1d3B08e6dd", "c12eb3fd2029fcbfb9bd6679701d35533eb297b484a701aadd1c2b418fc4f6ad");
    }
    public function payment()
    {
        return view('Pages.Payment.FormPayment');
    }
    //this will the process the coin
    public function processPayment(Request $request)
    {


        $basicInfo = $this->coin->GetBasicProfile();

        // var_dump($basicInfo);
        $username = $basicInfo['result']['public_name'];

        $amount = $request->input('amount');
        $email = $request->input('email');

        $scurrency = "USD";
        $rcurrency = "BTC";

        $request = [
            'amount' => $amount,
            'currency1' => $scurrency,
            'currency2' => $rcurrency,
            'buyer_email' => $email,
            'item' => "Donate to Prem Notes new",
            'address' => "",
            'ipn_url' => "http://localhost:8000/payment-hook"   //callback url to make update status for the payment
        ];

        $result = $this->coin->CreateTransaction($request);



        if ($result['error'] == "ok") {
            $payment = new Payment;
            $payment->email = $email;
            $payment->entered_amount = $amount;
            $payment->amount = $result['result']['amount'];
            $payment->from_currency = $scurrency;
            $payment->to_currency = $rcurrency;
            $payment->status = "initialized";
            $payment->gateway_id = $result['result']['txn_id'];
            $payment->gateway_url = $result['result']['status_url'];
            $payment->save();


            return view('Pages.Payment.ConfirmPayment')->with(['username' => $username, 'rcurrency' => $rcurrency, 'result' => $result]);
        } else {
            print 'Error: ' . $result['error'] . "\n";
            die();
        }
    }

    //this is the call back to update the status of payment
    public function paymentHook(Request $request)
    {
        $merchant_id = "9f986714667d561c58ea16d9494cc04c";
        $ipn_secret = "pinnacle";
        $debug_email = "pinnacleprem@gmail.com";

        $txn_id = $request->input('txn_id');
        $payment = Payment::where("gateway_id", $txn_id)->first();
        $order_currency = $payment->to_currency; //BTC
        $order_total = $payment->amount; //BTC

        function edie($error_msg)
        {
            global $debug_email;
            $report =  "ERROR : " . $error_msg . "\n\n";
            $report .= "POST DATA\n\n";
            foreach ($_POST as $key => $value) {
                $report .= "|$key| = |$value| \n";
            }
            mail($debug_email, "Payment Error", $report);
            die($error_msg);
        }

        if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') {
            edie("IPN Mode is not HMAC");
        }

        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
            edie("No HMAC Signature Sent.");
        }

        $request = file_get_contents('php://input');
        if ($request === false || empty($request)) {
            edie("Error in reading Post Data");
        }

        if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($merchant_id)) {
            edie("No or incorrect merchant id.");
        }

        $hmac =  hash_hmac("sha512", $request, trim($ipn_secret));
        if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) {
            edie("HMAC signature does not match.");
        }

        // $ipn_type = $_POST['ipn_type'];
        // $txn_id = $_POST['txn_id'];
        // $item_name = $_POST['item_name'];
        // $item_number = $_POST['item_number'];
        // $status_text = $_POST['status_text'];


        $amount1 = floatval($_POST['amount1']); //IN USD
        $amount2 = floatval($_POST['amount2']); //IN BTC
        $currency1 = $_POST['currency1']; //USD
        $currency2 = $_POST['currency2']; //BTC
        $status = intval($_POST['status']);

        if ($currency2 != $order_currency) {
            edie("Currency Mismatch");
        }

        if ($amount2 < $order_total) {
            edie("Amount is lesser than order total");
        }

        if ($status >= 100 || $status == 2) {
            // Payment is complete
            $payment->status = "success";
            $payment->save();
        } else if ($status < 0) {
            // Payment Error
            $payment->status = "error";
            $payment->save();
        } else {
            // Payment Pending
            $payment->status = "pending";
            $payment->save();
        }
        die("IPN OK");
    }
    public function processWithDrawal(Request $request)
    {


        $basicInfo = $this->coin->GetBasicProfile();

        // var_dump($basicInfo);
        $username = $basicInfo['result']['public_name'];

        $amount = $request->input('amount');

        $address = $request->input('withdraw_address');
        $email = $request->input('email');

        $currency = "USD";

        $auto_confirm = true;

        $ipn_url = "http://localhost:8000/withdrawal-hook";



        $result = $this->coin->CreateWithdrawal($amount, $currency, $address, $auto_confirm, $ipn_url);



        if ($result['error'] == "ok") {
            $withdraw = new CoinWithdrawal();
            $withdraw->status = "initialized";
            $withdraw->transaction_id = $result['result']['id'];
            $withdraw->status = $result['result']['status'];
            $withdraw->amount = $result['result']['amount'];


            if ($withdraw->save()) {
                //now deduct user balance 

                $user = User::where('id', Auth::user()->id)->first();
                $user->balance = $user->balance - $amount;

                if ($user->save()) {

                    // display success message
                    // return view('Pages.Payment.ConfirmWithdraw')->with(['username' => $username, 'currency' => $currency, 'result' => $result]);
                } else {
                    //error while deducting balance from user wallet

                }
            } else {

                //error while creating coinwithdrawl


            }
        } else {
            print 'Error: ' . $result['error'] . "\n";
            die();
        }
    }


    public function withDrawalHook()
    {
    }

    public function getRates()
    {
        // $basicInfo = $this->coin->GetBasicProfile();
        $result = $this->coin->GetRates();

        $res = $result['result']['USD'];
        return $res['rate_btc'];
    }
}
