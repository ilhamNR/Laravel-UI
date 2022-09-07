<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductReviewsResource;
use App\Models\User;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class ProductReviewsController extends Controller
{
    //
    public function index()
    {
        $productReviews = auth()->user()->productReviews()->where('name', 'like', '%' . request('keyword') . '%')->paginate(10);
        return response()->json([
            'message' => 'success',
            'data'    => ProductReviewsResource::collection($productReviews),
        ]);
    }
    public function store(Request $request)
    {
        $productReviews = auth()->user()->productReviews()->create([
            'name'  => $request()->name,
            'score' => $request()->score,
            'review' => $request()->review,
            'slug'  => $request()->slug,
            'product_id' => $request()->product_id,
            'user_id' => $request()->user_id,
        ]);
        return response()->json([
            'message'   => 'success',
            'data'      => new ProductReviewsResource($productReviews),
        ]);
    }
    public function show($id)
    {
        $productReviews = auth()->user()->productReviews()->find($id);
        if (!$productReviews) {
            return response()->json([
                'message' => 'error',
                'data'    => 'Article not found',
            ]);
        }
        return response()->json([
            'message' => 'success',
            'data'    => new ProductReviewsResource($productReviews),
        ]);
    }
    public function update(Request $request, $id)
    {
        $productReviews = auth()->user()->productReviews()->find($id);
        if (!$productReviews) {
            return response()->json([
                'message' => 'error',
                'data'    => 'Article not found',
            ]);
        }
        $productReviews->update([
            'name' => $request()->name,
            'score' => $request()->score,
            'review' => $request()->review,
            'slug' => $request()->slug,
            'product_id' => $request()->product_id,
            'user_id' => $request()->user_id,

        ]);
        return response()->json([
            'message' => 'success',
            'data'    => new ProductReviewsResource($productReviews),
        ]);
    }
    public function destroy($id){
        $productReviews = auth()->user()->productReviews()->find($id);

        if(!$productReviews){
            return response()->json([
                'message'   => 'error',
                'data'      => 'Reviews not found',
            ]);
        }
        $productReviews->delete();

        return response()->json([
            'message' => 'success',
        ]);
    }
}
