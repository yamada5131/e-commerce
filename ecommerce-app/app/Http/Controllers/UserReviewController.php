<?php

namespace App\Http\Controllers;

use App\Models\UserReview;

use Illuminate\Http\Request;

class UserReviewController extends Controller
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
    public function create(Request $request)
    {
        return view("review.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $review = new UserReview();
        $review->user_id = $user->id;
        $review->order_item_id = request()->order_item_id;
        $review->rating = $request->input("rating");
        $review->comment = $request->input("comment");
        $review->save();

        return redirect()->back()->with("success", "Review has been posted");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = UserReview::findOrFail($id);
        return view("review.edit", compact("review"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $review = UserReview::findOrFail($id);
        $review->comment = $request->input("comment");
        $review->rating = $request->input("rating");
        $review->save();

        return redirect()->route("product.show", ["id" => $review->order_item_id])->with("success", "Done!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = UserReview::findOrFail($id);
        $review_product_id = $review->order_item_id;
        $review->delete();

        return redirect()->route("product.show", ["id" => $review_product_id])->with("success", "Review has been deleted!");
    }
}
