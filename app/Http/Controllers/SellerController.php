<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Seller;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $seller = $user->seller;
        if ($user->seller) {
            return view('seller.index',compact('user','seller'));
        } else {
            return view('seller.index',compact('user','seller'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();
        $seller = $user->seller;
        Seller::create([
            'user_id' => $user->id,
            'type' => "個人",
            'status' => "線上",
            'rating' => 4.30
        ]);
        $markets = Market::whereIn('seller_id',$seller->pluck('id'));
        return view('seller.market.index',compact('user','seller','markets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSellerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
