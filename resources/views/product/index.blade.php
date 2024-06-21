@extends('layouts.app')

@section('content')

<div class=" bg-[#C5D5E2] h-full min-h-screen">
<div class=" px-5">

    <div class=" grid grid-cols-9 place-content-center gap-3 pt-4 w-auto mx-auto px-5">

        {{-- <div class=" bg-white h-fit col-span-2 p-4 space-y-6">
            <a href="#e" class="flex justify-between items-center no-underline text-[#000000] hover:text-blue-400">
                <div class=" font-serif ">
                    Math
                </div>
                <div>
                    <img src="https://cdn3.iconfinder.com/data/icons/mobile-banking-ver-4a/100/1-21-256.png" class="w-5"/>

                </div>
            </a>

            <a href="#e" class="flex justify-between items-center no-underline text-[#000000] hover:text-blue-400">
                <div class=" font-serif ">
                    Math
                </div>
                <div>
                    <img src="https://cdn3.iconfinder.com/data/icons/mobile-banking-ver-4a/100/1-21-256.png" class="w-5"/>

                </div>
            </a>
            <a href="#e" class="flex justify-between items-center no-underline text-[#000000] hover:text-blue-400">
                <div class=" font-serif ">
                    Math
                </div>
                <div>
                    <img src="https://cdn3.iconfinder.com/data/icons/mobile-banking-ver-4a/100/1-21-256.png" class="w-5"/>

                </div>
            </a>
            <a href="#e" class="flex justify-between items-center no-underline text-[#000000] hover:text-blue-400">
                <div class=" font-serif ">
                    Math
                </div>
                <div>
                    <img src="https://cdn3.iconfinder.com/data/icons/mobile-banking-ver-4a/100/1-21-256.png" class="w-5"/>

                </div>
            </a>
            <a href="#e" class="flex justify-between items-center no-underline text-[#000000] hover:text-blue-400">
                <div class=" font-serif ">
                    Math
                </div>
                <div>
                    <img src="https://cdn3.iconfinder.com/data/icons/mobile-banking-ver-4a/100/1-21-256.png" class="w-5"/>

                </div>
            </a>



        </div> --}}
        {{-- @php
            $products = App\Models\Product::orderBy('id', 'desc')->get();
        @endphp --}}

        <div class="card col-span-6 divide-y-2 gap-3 pb-3">
            {{-- <h2>Products in {{ $subject->name }} Category</h2> --}}

            @foreach ($products as $product)

                <div class=" flex items-center">
                    <div class="px-5">
                        <img
                        {{-- src="/image/users.png"--}}
                        src="img/{{ $product->teacher?->profile }}" alt="..."
                        class="img-fluid rounded-start w-32 p-2" alt="...">
                    </div>

                    <div class="space-y-1 pt-3">
                        <div class="text-sm">Teacher:
                            {{ $product->teacher->user->name }}
                        </div>

                        <div class="text-sm">Major:
                            {{ $product->subject->subject }}
                        </div>
                        <div class="text-sm mb-3">Time:
                            {{ $product->time}}
                        </div>
                        {{-- <div class="text-sm mb-3">Price:
                            {{ $product->price }}​​ ៛
                        </div> --}}

                        <a
                            href="{{ route('product.show',$product->id) }}"
                            href="/showpost"
                            class=" no-underline"
                        >
                            <div class="text-white bg-[#479BE8] hover:bg-blue-600 font-semibold font-sans rounded-xl text-sm px-4 py-0.5 mr-2 w-fit focus:outline">Detail</div>
                        </a>
                    </div>

                </div>

            @endforeach

                {{-- <div class=" flex  space-y-0">
                    <div class="px-5">
                        {{-- <img src="image/logo.png" class="img-fluid rounded-3xl w-10" alt="...">
                        <img src="image/logo.png"
                        {{-- src="images/{{ $product->picture }}"
                        class="img-fluid rounded-start w-32 p-2" alt="...">
                    </div>

                    <div class="space-y-1">
                        <p class=" text-sm">
                            {{-- {{ $product->major }}
                        </p>
                        <p class="text-sm">Major: Physic
                            {{-- {{ $product->major }}
                        </p>
                        <p class="text-sm">Time: 2:00PM - 3:00PM
                            {{-- {{ $product->time}}
                        </p>
                        <p class="text-sm mb-3">Price: ៛ 140000
                        {{-- {{ $product->cost }}
                        </p>

                        <a
                        {{-- href="{{ route('product.show',$product->id) }}"
                        >
                        <div class="text-white bg-[#479BE8] hover:bg-blue-600 font-semibold font-sans rounded-xl text-sm px-4 py-0.5 mr-2 w-fit focus:outline">Detail</div>
                        </a>
                    </div>

                </div> --}}
        </div>


        <div class="text-lg font-medium col-span-3 bg-white p-3 h-fit divide-y-2">
            Popular Post
            @php
            //$like = App\Models\Like::where(['product_id'=>$product->id, 'user_id'=>auth()->id()])->first()

                $popularPosts = App\Models\Product::orderBy('likes', 'desc')->take(5)->get();

            @endphp


            @foreach ($popularPosts as $popularPost)
                <div class=" flex items-center space-y-0 space-x-2">

                    <div class=" py-2 pr-2">
                        <img
                        {{-- src="image/logo.png" --}}
                        src="img/{{ $popularPost->teacher?->profile }}" alt="..."
                        class="img-fluid rounded-start w-14 p-2" alt="...">
                    </div>

                    <div class=" flex flex-col space-y-1">

                        <div class="text-sm"> Teacher:
                            {{ $popularPost->teacher?->user?->name}}

                        </div>

                        <div class="text-sm">
                            {{ $popularPost->subject->subject}} <span> ;  </span>{{ $popularPost->level->level }}
                        </div>


                        <a
                            href="{{ route('product.show',$popularPost->id) }}"
                            href="/showpost"
                            class=" no-underline"
                        >
                            <div class="text-white bg-[#479BE8] hover:bg-blue-600 font-semibold font-sans rounded-xl text-xs px-3 py-0.5 mr-2 w-fit focus:outline">Detail</div>
                        </a>
                    </div>



                </div>
            @endforeach


        </div>

    </div>



    @php
        $products = App\Models\Product::where('subject_id', $product->subject_id)->with('subject')->get();
        $subjects = App\Models\Subject::all();

    @endphp
     {{-- <div>
        <h2>Categories</h2>
        <ul>
            <li><a href="{{ url('/') }}">All</a></li>
            @foreach($subjects as $subject)
                <li><a href="{{ url('/category/' . $subject->id) }}">{{ $subject->subject }}</a></li>
            @endforeach
        </ul>
    </div> --}}
    {{-- <div>
        <h2>Products</h2>
        <ul>
            @foreach($products as $product)
                <li>Category: {{ $product->subject_id }}</li>
            @endforeach
        </ul>
    </div> --}}

</div>

@endsection
