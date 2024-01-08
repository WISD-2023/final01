<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreReviewRequest $request, Product $product)
    {
        // 創建評論實例
        $review = new Review();

        // 設定評論相關屬性
        $review->user_id = auth()->user()->id; // 使用當前登入用戶的 ID 作為評論者的 ID
        $review->content = $request->input('content');
        $review->rating = $request->input('rating');
        
        // 關聯評論與商品
        $review->product()->associate($product);

        // 保存評論
        $review->save();

        // 導向商品詳細資訊頁面
        return redirect()->route('products.product', ['product' => $product->id])->with('success', '評論成功！');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
