<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    //
    // public function like(Product $product){
    //     $liker = auth()->user();
    //     $liker->likes()->attach($product->id);
    //     return redirect()->route('product.index')->with('success', "Like Succeed");

    // }
    // public function unlike(Product $product){
    //     $liker = auth()->user();
    //     $liker->likes()->detach($product);
    //     return redirect()->route('product.show')->with('success', "UnLike Succeed");
    // }

    public function like($id){
        DB::beginTransaction();
        try{
            Like::firstOrCreate(['product_id'=>$id, 'user_id'=>auth()->id()]);
            $product = Product::findOrFail($id);
            $product->likes += 1;
            $product->save();
            DB::commit();
        }
        catch(\Throwable $th){
            DB::rollback();
            throw $th;

        }
        return redirect()->route('product.show', $product->id);

    }

    public function unlike($id){
        DB::beginTransaction();
        try{
            $like=Like::where(['product_id'=>$id, 'user_id'=>auth()->id()])->first();
            $like->delete();
            $product = Product::findOrFail($id);
            $product->likes -= 1;
            $product->save();
            DB::commit();
        }
        catch(\Throwable $th){
            DB::rollback();
            throw $th;

        }
        return redirect()->route('product.show', $product->id);

    }

}
