<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subject;
use App\Repository\IProductRepository;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // public function index()
    // {
    //     $categories = Subject::all();
    //     return view('categories.index', compact('categories'));
    // }

    // public function showPosts(Request $request)
    // {
    //     $subjectId = $request->input('subject_id');

    //     // Retrieve posts based on selected sub-category
    //     $posts = Product::where('subject_id', $subjectId)->get();

    //     return view('product.index', compact('subjects'));
    // }
    public $product;

    public function __construct(IProductRepository $product) {
        $this->product = $product;
    }

    // public function show($id)
    // {
        // get single product

        // $product = $this->product->getSingleProduct($id);

        // //related product
        // $subjectCategory = Product::where('id', '<>', $id)
        //                         // ->where('level_id', $product->level_id)
        //                         ->where('subject_id', $product->subject_id)
        //                         ->get();

        // return view('product.index',compact('product', 'subjectCategory'));
    //}
    // public function productsBySubject($id)
    // {
    //     $subject = Subject::findOrFail($id);
    //     $products = $subject->products;

    //     return view('layouts.app','products.index', compact('subject', 'products'));
    // }

    // public function show(Subject $subject)
    // {
    //     $product =  $this->product->getAllProducts();

    //     //$products = Product::where('subject_id', $product->subject_id)->get();

    //     $products = $subject->products;
    //     return redirect('/', compact('products'));
    // }

    // public function productsByCategory(Subject $subject)
    //   {
    //       $products = $subject->products;

    //       return view('product.index', compact('products', 'subject'));
    //   }

    public function index(){
        //$products =  $this->product->getAllProducts();
        $subjects = $this->product->getAllSubjects();
        return view('layouts.app')->with('subjects', $subjects);
    }

}
