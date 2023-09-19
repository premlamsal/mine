<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Custom\Helpers\CoinPaymentsAPI;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPurchaseController extends Controller
{
    private $coin;

    public function __construct()
    {
        $this->middleware('auth');
        $this->coin = new CoinPaymentsAPI();
        $this->coin->Setup("f556E66713133ACA41800AAC085028Dc2d37daCe90B2170F9afcfD1d3B08e6dd", "c12eb3fd2029fcbfb9bd6679701d35533eb297b484a701aadd1c2b418fc4f6ad");
    }

    public function randomString($length = 10)
    {
        // Set the chars
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Count the total chars
        $totalChars = strlen($chars);

        // Get the total repeat
        $totalRepeat = ceil($length / $totalChars);

        // Repeat the string
        $repeatString = str_repeat($chars, $totalRepeat);

        // Shuffle the string result
        $shuffleString = str_shuffle($repeatString);

        // get the result random string
        return substr($shuffleString, 1, $length);
    }
    public function purchaseProcess(Request $request)
    {
        //if purchase payment mthod is user earning

        if ($request->input('payment_method') === 'btc') {


            $basicInfo = $this->coin->GetBasicProfile();

            // var_dump($basicInfo);
            $username = $basicInfo['result']['public_name'];

            $amount = $request->input('purchase_amount');
            $email = Auth::user()->email;

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
                $transaction = new Transaction();
                $transaction->user_id = Auth::user()->id;
                $transaction->email = $email;
                $transaction->entered_amount = $amount;
                $transaction->amount = $result['result']['amount'];
                $transaction->from_currency = $scurrency;
                $transaction->to_currency = $rcurrency;
                $transaction->transaction_type = 'purchase';
                $transaction->status = "initialized";
                $transaction->gateway_id = $result['result']['txn_id'];
                $transaction->gateway_url = $result['result']['status_url'];
                $transaction->save();

                return view('Pages.User.ConfirmPurchase')->with(['username' => $username, 'rcurrency' => $rcurrency, 'result' => $result]);
            } else {
                print 'Error: ' . $result['error'] . "\n";
                die();
            }
        }
        //elsif purchase payemtn method is user btc 
        elseif (($request->input('payment_method') === 'user_earning')) {
            // echo "user_earning";

            if (Auth::user()->balance > $request->input('purchase_amount')) {
                $calculated_mining_power_for_purchase = ($request->input('purchase_amount') * (1 / 3.05));
                $calculated_mining_power_for_purchase = number_format($calculated_mining_power_for_purchase, 2, '.', '');
                $calculated_mining_unit_for_purchase = 'TH/s';

                $user = User::where('id', Auth::user()->id)->first();
                $user->balance = $user->balance - $request->input('purchase_amount');
                $user->active_mining_power  = $user->active_mining_power + $calculated_mining_power_for_purchase;
                $user->active_mining_power_unit = $calculated_mining_unit_for_purchase;

                if ($user->save()) {
                    //now create purchase

                    $purchase = new Purchase();
                    $purchase->transaction_id = $this->randomString();
                    $purchase->payment_method = 'User Earning';
                    $purchase->currency = 'USD';
                    $purchase->mining_power = $calculated_mining_power_for_purchase;
                    $purchase->mining_unit = $calculated_mining_unit_for_purchase;
                    $purchase->price = $request->input('purchase_amount');
                    $purchase->user_id = Auth::user()->id;
                    $purchase->status = 'success';

                    if ($purchase->save()) {
                        //sucess

                        return back()->with('message', 'Congrats you have successfully purchased this mining power');
                    } else {
                        //failed creating purchase
                        return back()->with('error', 'Failed creating purchase');
                    }
                } else {
                    //deducing failed 
                    return back()->with('error', 'Error while deducing user wallet balance for purchase');
                }
            } else {
                return back()->with('error', 'You dont have enough balance to purchase');
            }
        } else {
            //else purchase payemnt method not supported
            return back()->with('error', 'Some undefined error occured. Please contact admin for more');
        }
    }

    //this is the call back to update the status of payment
    public function paymentHook(Request $request)
    {
        $merchant_id = "9f986714667d561c58ea16d9494cc04c";
        $ipn_secret = "pinnacle";
        // $debug_email = "pinnacleprem@gmail.com";

        $txn_id = $request->input('txn_id');
        $transaction = Transaction::where("gateway_id", $txn_id)->first();
        $order_currency = $transaction->to_currency; //BTC
        $order_total = $transaction->amount; //BTC

        function edie($error_msg)
        {
            $debug_email = "pinnacleprem@gmail.com";
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
            $transaction->status = "success";
            if ($transaction->save()) {
                $calculated_mining_power_for_purchase = (($amount1) * (1 / 3.05));
                $calculated_mining_power_for_purchase = number_format($calculated_mining_power_for_purchase, 2, '.', '');
                $calculated_mining_unit_for_purchase = 'TH/s';

                $user = User::where('id', $transaction->user_id)->first();
                $user->balance = $user->balance - $amount1;
                $user->active_mining_power  = $user->active_mining_power + $calculated_mining_power_for_purchase;
                $user->active_mining_power_unit = $calculated_mining_unit_for_purchase;
                if ($user->save()) {
                    $purchase = new Purchase();
                    $purchase->transaction_id = $this->randomString();
                    $purchase->payment_method = 'Coin Payment';
                    $purchase->currency = $currency1;
                    $purchase->mining_power = $calculated_mining_power_for_purchase;
                    $purchase->mining_unit = $calculated_mining_unit_for_purchase;
                    $purchase->price = $amount1;
                    $purchase->user_id = $user->id;
                    $purchase->status = $status;
                    if ($purchase->save()) {
                        //everthing is success
                        edie('everthing is success');
                    } else {
                        //error saving purchase
                        edie('everthing saving purchase');
                    }
                } else {
                    //error saving user
                    edie('everthing saving user');
                }
            } else {
                //   error saving transaction
                edie('everthing saving transaction');
            }
        } else if ($status < 0) {
            // Payment Error
            $transaction->status = "error";
            $transaction->save();
        } else {
            // Payment Pending
            $transaction->status = "pending";
            $transaction->save();
        }
        die("IPN OK");
    }

    public function processWithDrawal(Request $request)
    {


        $basicInfo = $this->coin->GetBasicProfile();

        // var_dump($basicInfo);
        $username = $basicInfo['result']['public_name'];

        $amount = $request->input('with_draw_amount');

        $address = $request->input('wallet_address');

        // $email = $request->input('email');

        $currency = $request->input('currency');

        $auto_confirm = true;

        $ipn_url = "http://localhost:8000/withdrawal-hook";



        $result = $this->coin->CreateWithdrawal($amount, $currency, $address, $auto_confirm, $ipn_url);



        if ($result['error'] == "ok") {
            $transaction = new Transaction();
            $transaction->status = "initialized";
            $transaction->user_id = Auth::user()->id;
            $transaction->user_id = Auth::user()->email;
            $transaction->gateway_id = $result['result']['id'];
            $transaction->status = $result['result']['status'];
            $transaction->amount = $result['result']['amount'];
            $transaction->transaction_type = 'withdraw';



            if ($transaction->save()) {
                //now deduct user balance 

                $user = User::where('id', Auth::user()->id)->first();
                $user->balance = $user->balance - $amount;

                if ($user->save()) {


                    return back()->with('message', 'Congrats you have successfully withdraw. You will shorly received cash out in your address.');


                    // display success message
                    // return view('Pages.Payment.ConfirmWithdraw')->with(['username' => $username, 'currency' => $currency, 'result' => $result]);
                } else {
                    //error while deducting balance from user wallet

                }
            } else {

                //error while creating coinwithdrawl


            }
        } else {
            return back()->with('error',  $result['error']);

            die();
        }
    }
}
