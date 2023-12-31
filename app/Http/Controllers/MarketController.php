<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarketRequest;
use App\Http\Requests\UpdateMarketRequest;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $seller = $user->seller;
        $markets = Market::whereIn('seller_id',$seller->pluck('id'))->get();
        return view('seller.market.index', compact('user','seller', 'markets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarketRequest $request)
    {
        //
        $user = Auth::user();
        $seller = $user->seller;
        Market::create([
            'seller_id' => $seller->id,
            'name' => "你的賣場",
            'description' => "賣場描述",
        ]);
        $markets = Market::whereIn('seller_id',$seller->pluck('id'))->get();
        return view('seller.market.index',compact('seller','markets'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Market $market)
    {
        //
        $products = Product::whereIn('market_id',$market->pluck('id'))->get();
        return view('seller.market.show',compact('market','products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Market $market)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Market $market)
    {
        //
        $market->update([
            'name'    => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        //$request->market()->fill($request->validated());
        //$request->market()->update();
        //$request->market()->save();
        $products = Product::whereIn('market_id',$market->pluck('id'))->get();
        return view('seller.market.show',compact('market','products'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Market $market)
    {
        //
    }
}
