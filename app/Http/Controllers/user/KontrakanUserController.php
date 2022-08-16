<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KontrakanUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans;

class KontrakanUserController extends Controller
{
    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.kontrakan-user.index', [
            'kontrakanUser' => KontrakanUser::with('user', 'kontrakan.jenis_kontrakan')
                ->where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function getSnapRedirect(KontrakanUser $kontrakanUser)
    {
        $orderId = $kontrakanUser->id . '-' . Str::random(5);
        $kontrakanUser->midtrans_boking_code = $orderId;
        $transaction_detail = [
            'order_id' => $orderId,
            'gross_amount' => $kontrakanUser->price,
        ];

        $item_details[] = [
            'id' => $orderId,
            'price' => $kontrakanUser->price,
            'qty' => 1,
            'name' => 'Pembayaran Kontrakan'
        ];

        $userData = [
            'first_name' => $kontrakanUser->user->name,
            'last_name' => '',
            'address' => '',
            'city' => '',
            'postal_code' => '',
            'phone' => '',
            'country_code' => 'IDN'
        ];

        $customerDetails = [
            'first_name' => $kontrakanUser->user->name,
            'last_name' => '',
            'email' => $kontrakanUser->user->email,
            'phone' => '',
            'billing_address' => $userData,
            'shipping_address' => $userData
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_detail,
            'customer_details' => $customerDetails,
            'item_details' => $item_details
        ];

        try {
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $kontrakanUser->midtrans_url = $paymentUrl;
            $kontrakanUser->save();
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.kontrakan-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, KontrakanUser $kontrakanUser)
    {
        $orderId = $kontrakanUser->id . '-' . Str::random(5);
        $kontrakanUser->midtrans_boking_code = $orderId;
        $transaction_detail = [
            'order_id' => $orderId,
            'gross_amount' => $kontrakanUser->price,
        ];

        $item_details[] = [
            'id' => $orderId,
            'price' => $kontrakanUser->price,
            'qty' => 1,
            'name' => 'Pembayaran Kontrakan'
        ];

        $userData = [
            'first_name' => $kontrakanUser->user->name,
            'last_name' => '',
            'address' => '',
            'city' => '',
            'postal_code' => '',
            'phone' => '',
            'country_code' => 'IDN'
        ];

        $customerDetails = [
            'first_name' => $kontrakanUser->user->name,
            'last_name' => '',
            'email' => $kontrakanUser->user->email,
            'phone' => '',
            'billing_address' => $userData,
            'shipping_address' => $userData
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_detail,
            'customer_details' => $customerDetails,
            'item_details' => $item_details
        ];

        try {
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $kontrakanUser->midtrans_url = $paymentUrl;
            $kontrakanUser->save();
        } catch (Exception $e) {
            return false;
        }

        KontrakanUser::create($midtrans_params);
    }

    public function midtransCallback(Request $request)
    {
        $notif = new Midtrans\Notification();

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $checkout_id = explode('-', $notif->order_id[0]);
        $checkout = KontrakanUser::find($checkout_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $checkout->payment_status = 'pending';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $checkout->payment_status = 'paid';
            }
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            }
        } else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $checkout->payment_status = 'failed';
        } else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $checkout->payment_status = 'paid';
        } else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $checkout->payment_status = 'pending';
        } else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $checkout->payment_status = 'failed';
        }

        $checkout->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KontrakanUser $kontrakan_user)
    {
        return view('user.kontrakan-user.edit', [
            'kontrakanUser' => $kontrakan_user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
