<?php

namespace Waqarali7\Imilezcart\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ImilezcartController extends Controller
{
    //
    /**
     * Display order detail page.
     *
     * @param \Illuminate\Http\Request $request
     * @param App\Models\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function imileTrack(Request $request)
    {
//        $order->load(['inventories.image', 'conversation.replies.attachments']);
        $order = Order::findOrFail($request->order);
        return view('imilezcart::track', compact('order'));
    }
}
