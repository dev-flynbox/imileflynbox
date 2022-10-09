<?php

namespace DevFlynbox\Imileflynbox\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use DevFlynbox\Imileflynbox\Imileflynbox;

class ImileflynboxController extends Controller
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
        $order = Order::where('tracking_id',$request->order)->firstOrFail();
        $imileflynbox = new Imileflynbox();
        $data = [];
        $res = $imileflynbox::trackOrder($order->order_number);
        if($res["code"] == "200"){
            $data = $res["data"];
        }
        return view('imileflynbox::track', compact('order','data'));
    }
}
