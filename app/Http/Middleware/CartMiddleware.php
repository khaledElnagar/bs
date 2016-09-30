<?php

namespace App\Http\Middleware;

use App\Details;
use Closure;

class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cart_orders = Details::where('user_id',auth()->id())->where('order_id',0)->where('wish',0)->get();
        $total_quantity = Details::where('user_id',auth()->id())->where('order_id',0)->where('wish',0)->sum('quantity');
        $total_price = Details::where('user_id',auth()->id())->where('order_id',0)->where('wish',0)->sum('price');

        $total_wishes = Details::where('user_id',auth()->id())->where('order_id',0)->where('wish',1)->sum('quantity');
        $cart_wishes = Details::where('user_id',auth()->id())->where('order_id',0)->where('wish',1)->get();


        view()->share('cart_orders',$cart_orders);
        view()->share('cart_wishes',$cart_wishes);
        view()->share('total_quantity',$total_quantity);
        view()->share('total_wishes',$total_wishes);
        view()->share('total_price',$total_price);
        return $next($request);
    }
}
