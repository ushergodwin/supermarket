<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Supermarket;
use App\Models\Transaction;
use System\Http\Request\Request;

 class SupermarketAccount extends BaseController 
 { 

    public function index()
    {
        $context = [
            'title' => 'ACCOUNT EXPIRED'
        ];

        return render('admin/supermarket/account/expired', $context);
    }

    
    public function activate()
    {
        $request = new Request();
        $status = $request->get('status');

        if($status == 'cancelled')
        {
            session(['failed' => "Transaction has been cancelled!"]);
            return redirect('supermarket/account/expired');
        }

        
        if($status == 'failed')
        {
            session(['failed' => "Transaction failed. Please re-initiate the process. Thank you."]);
            return redirect('supermarket/account/expired');
        }
        
        $txt_ref = $request->get('txt_ref');
        $transaction_id = $request->get('transaction_id');
        $payment = session('payment');
        $user = session('guest');

        $transaction_details = [
            'email' => $user->email,
            'amount' => $payment->amount,
            'txt_ref' => $txt_ref,
            'transaction_id' => $transaction_id,
            'expires_on' => $payment->period
        ];
        
        $activate_account = [
            'expired' => 0,
            'expires' => $payment->period
        ];

        $transaction = new Transaction($transaction_details);
        $transaction->save();

        Supermarket::find($user->supermarket, 'db_name')->update($activate_account);

        session(['success' => "Your account has be activated successfully and subscription has been extended for {$payment->sub_period} months.
        Thank you for choosing YOSIL"]);

        return redirect('supermarket/account/expired');
    }


    public function payment($amount)
    {
        $fee = session('guest')->fee;
        if($amount < $fee)
        {
            return response()->json(202, alert()->danger("The amount entered is less than your account subscription fee of " . number_format($fee, 2)));
        }
        $period = $amount / $fee;
        $subscription_period = date("Y-m-d", strtotime("+$period months"));
        $payment = (object)['amount' => $amount, 'period' => $subscription_period, 'sub_period' => $period];
        session(['payment' => $payment]);
        response()->json(200, "success");

    }
 }