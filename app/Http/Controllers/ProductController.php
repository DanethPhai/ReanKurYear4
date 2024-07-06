<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Product;
use App\Models\Subject;
use App\Repository\IProductRepository;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller

{
    public $product;

    public function __construct(IProductRepository $product) {
        $this->product = $product;
    }

    // public function showByCategory(Subject $subject)
    // {
    //     $posts = $subject->posts;
    //     return view('product.showByCategory', compact('posts'));
    // }


    public function index(Subject $subject)
    {
        // return all products

         $products = $this->product->getAllProducts();
        // $subjects = Subject::all();
        // $products = $subject->products;

        // return view('product.index')->with('products', $products);

        //return view('products.index', compact('products'));

        // $products = Product::with('category')->get();
        // $categories = Subject::all();
        return view('product.index', compact('products'));
    }

    // public function app($id)
    // {
    //     $product = $this->product->getSingleProduct($id);
    //     $productsbysubject = Product::where('id', '=', $id)
    //                         ->where('subject_id', $product->subject_id)->get();
    //     $subjects = Subject::all();
    //     return view('layouts.app', compact('productsbysubject', 'subjects', 'product'));
    // }


    // public function productsByCategory(Subject $subject)
    // {
    //     $products = $subject->products;

    //     return view('product.index', compact('products', 'subject', $products, $subject));
    // }

    // public function bySubject($id)
    // {
    //     $products = Product::where('subject_id', $id)->get();
    //     $subjects = Subject::all();
    //     $selectedSubject = Subject::find($id);
    //     return view('products.index', compact('products', 'subjects', 'selectedSubject'));
    // }

    public function filterBySubject($id)
    {
        $product = $this->product->getSingleProduct($id);
        $products = Product::where('id', '=', $id)
                            ->where('subject_id', $product->subject_id)->get();
        $subjects = Subject::all();
        return view('product.productbysubject', compact('products', 'subjects', 'product'));
    }

    public function filterByLevel($id)
    {
        $product = $this->product->getSingleProduct($id);
        $products = Product::where('id', '=', $id)
                            ->where('level_id', $product->level_id)->get();
        $levels = Level::all();
        return view('product.productbylevel', compact('products', 'levels', 'product'));
    }

    //product by subject
    public function productbysubject($id)
    {
        // get single product

        $product = $this->product->getSingleSubject($id);
        return view('product.productbysubject')->with('product', $product);
    }

    public function show($id)
    {
        // get single product

        $product = $this->product->getSingleProduct($id);


        //related product
        $relatedProduct = Product::where('id', '<>', $id)
                                ->where(['subject_id' => $product->subject_id, 'level_id' => $product->level_id])
                                ->get();

        return view('product.show',compact('product', 'relatedProduct'));
    }

    public function create()
    {
        // create page
        return view('product.create');
    }

    public function countlike()
    {
        $likes = Product::orderBy('likes', 'desc')->get();
        return view('/')->with('likes', $likes);
    }

    public function store(Request $request)
    {

        // validate and store data
        $request->validate([
            'level_id' => 'required',
            'subject_id' => 'required',
            'time' => 'required',
            'price' => 'required',
            'term' => 'required',
            'detail' => 'required',
        ]);

        // if (Product::latest()->first() !== null) {
        //     $teacher_id = Product::latest()->first()->id + 1;
        // } else {
        //     $teacher_id = 1;
        // }


        $id = DB::table('teachers')->select('id')->latest()->first();
           $saveRecord = new Product();

           $saveRecord->teacher_id      = Auth::user()->teacher->id;
           $saveRecord->level_id        = $request->level_id;
           $saveRecord->subject_id      = $request->subject_id;
           $saveRecord->time            = $request->time;
           $saveRecord->price           = $request->price;
           $saveRecord->term            = $request->term;
           $saveRecord->detail          = $request->detail;
           $saveRecord->save();

        //image upload

        // $data = $request->all();

        // if($image = $request->file('picture')) {
        //     $name = time(). '.' .$image->getClientOriginalName();
        //     $image->move(public_path('images'), $name);
        //     $data['picture'] = "$name";
        // }

        // $this->product->createProduct($data);

        // return redirect('/');
        return redirect()->route('product.index', $saveRecord->id)
        ->with('success','Product created successfully.');

    }

    public function edit($id)
    {
        $product = $this->product->editProduct($id);
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request, $id)
    {

        // validate and store data
        $request->validate([
            'level_id' => 'required',
            'subject_id' => 'required',
            'time' => 'required',
            'price' => 'required',
            'term' => 'required',
            'detail' => 'required',
        ]);

        // $product = Product::find($id);
        // $product->level           = $request->get('level');
        // $product->subject         = $request->get('subject');
        // $product->time            = $request->get('time');
        // $product->price           = $request->get('price');
        // $product->term            = $request->get('term');
        // $product->detail          = $request->get('detail');

        //image upload

        $data = $request->all();

        if($image = $request->file('picture')) {
            $name = time(). '.' .$image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['picture'] = "$name";
        }

        // $product->save();
        $this->product->updateProduct($id, $data);

        return redirect('/');

    }

    public function teacherDeleteProduct($id) {
        $this->product->teacherDeleteProduct($id);
        return redirect('/');
    }

    // add to cart
    // public function addToCart(Product $product) {

    //     $cart = session()->get('cart');

    //     if(!$cart) {

    //         $cart = [

    //             $product->id => [
    //                 'quantity' => 1,
    //                 'time' => $product->time,
    //                 'price' => $product->price,
    //                 'term' => $product->term,
    //                 'level'=> $product->level,
    //                 // 'subject' => $product->subject,
    //                 'detail' => $product->detail,
    //             ]
    //         ];

    //         session()->put('cart', $cart);
    //         return redirect()->route('product.cart')->with('success', 'Added to Cart');
    //     }

    //     // if there is cart

    //     if(isset($cart[$product->id])) {
    //         $cart[$product->id]['quantity']++;
    //         session()->put('cart', $cart);
    //         return redirect()->route('product.cart')->with('success', 'Added to Cart');
    //     }


    //     $cart[$product->id] = [
    //         'quantity' => 1,
    //         'time' => $product->time,
    //         'price' => $product->price,
    //         'term' => $product->term,
    //         'level'=> $product->level,
    //         'subject' => $product->subject,
    //         'detail' => $product->detail,
    //     ];

    //     session()->put('cart', $cart);
    //     return redirect()->route('product.cart')->with('success', 'Added to Cart');
    // }


    // public function relatedProduct($id){

    // }
}
