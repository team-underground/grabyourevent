<?php

namespace App\Http\Controllers;

use App\TicketCategory;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Inertia\Inertia;

class CartController extends Controller
{
    public function addToCart($uuid)
    {
        $ticketCategory = TicketCategory::where('uuid', $uuid)->where('no_of_tickets_left', '>=', request('quantity'))->first();

        if (!$ticketCategory) {
            abort(400, 'Tickets have been sold out');
        }

        Cart::add([
            'id' => $ticketCategory->uuid,
            'name' => $ticketCategory->ticket_category_name,
            'price' => $ticketCategory->ticket_category_price,
            'qty' => request('quantity'),
            'weight' => 300,
            'options' => [
                'event_name' => $ticketCategory->event->event_name,
                'event_show' => route('events.show', $ticketCategory->event->event_slug),
                'event_time' => $ticketCategory->event->dateFormat() . ' | ' . $ticketCategory->event->timeFormat()
            ]
        ]);
        return redirect('/checkout');
    }

    public function removeFromCart(Request $request)
    {
        $rowId = $request->rowId;
        Cart::remove($rowId);
        session()->flash('success', 'Item successfully deleted from cart');
        return back();
    }
}
