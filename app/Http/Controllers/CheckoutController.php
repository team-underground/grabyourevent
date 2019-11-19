<?php

namespace App\Http\Controllers;

use App\CustomerOrder;
use App\Ticket;
use App\TicketCategory;
use Inertia\Inertia;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Errors\SignatureVerificationError;

class CheckoutController extends Controller
{
    public function create()
    {
        if (Cart::count() > 0 && Cart::total() >= 1) {

            $totalAmount = floatval(preg_replace("/[^-0-9\.]/", "", Cart::total()));
            $keyId = config('razorpay.razor_key');
            $api = new Api($keyId, config('razorpay.razor_secret'));

            $orderData = [
                'receipt'         => Str::random(32),
                'amount'          => $totalAmount * 100, // total amount in paise
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ];

            $razorpayOrder = $api->order->create($orderData);

            $razorpayOrderId = $razorpayOrder['id'];

            Session::put('razorpay_order_id', $razorpayOrderId);

            $amount = $orderData['amount'];

            $data = [
                "key"               => $keyId,
                "amount"            => $amount,
                "name"              => "DJ Tiesto",
                "description"       => "Tron Legacy",
                "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
                "prefill"           => [
                    "name"              => "Daft Punk",
                    "email"             => "customer@merchant.com",
                    "contact"           => "9999999999",
                ],
                "notes"             => [
                    "address"           => "Hello World",
                    "merchant_order_id" => "12312321",
                ],
                "theme"             => [
                    "color"             => "#F37254"
                ],
                "order_id"          => $razorpayOrderId,
            ];
            $data['display_currency']  = 'INR';
            $data['display_amount']    = $amount / 100;

            return Inertia::render('Front/BuyTickets/Checkout', [
                'cart' => Cart::content()->values(),
                'total' => $totalAmount,
                'options' => $data
            ]);
        } else {
            return Inertia::render('Front/BuyTickets/EmptyCart');
        }
    }

    public function verifyPayment(Request $request)
    {
        $success = true;
        $error = "Payment Failed";

        if ($request->has('razorpay_payment_id')) {

            $api = new Api(config('razorpay.razor_key'), config('razorpay.razor_secret'));

            try {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => Session::get('razorpay_order_id'),
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature' => $request->razorpay_signature
                );

                $api->utility->verifyPaymentSignature($attributes);

                //start ticket creation
                $ticketCategories = Cart::content()->values();

                $nowTime = (string) Carbon::now();

                $order = CustomerOrder::create([
                    'user_id' => 1,
                    'order_time' => $nowTime,
                    'total_price' => Cart::total(),
                    'discount' => Cart::discount(),
                    'final_price' => Cart::subtotal()
                ]);

                $ticketCategories->each(function ($category) use ($nowTime, $order) {
                    $categoryFound = TicketCategory::findByUuidOrFail($category->id);
                    if ($categoryFound) {
                        $ticket = Ticket::create([
                            'serial_number' => Str::upper(Str::random(8)),
                            'event_id' => $categoryFound->event_id,
                            'ticket_category_id' => $categoryFound->id,
                            'purchase_date' => $nowTime
                        ]);

                        $order->ordertickets()->create([
                            'ticket_id' => $ticket->id
                        ]);
                    }
                });
                Cart::destroy();
                // ddd($category);
            } catch (SignatureVerificationError $e) {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        if ($success === true) {
            $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$request->razorpay_payment_id}</p>";
            session()->flash('success', $html);
        } else {
            $html = "<p>Your payment failed</p>
                <p>{$error}</p>";
            session()->flash('error', $html);
        }
        return redirect('/checkout');
    }
}
