@extends('layouts.app')

@section('content')

<div class=" bg-[#C5D5E2] h-full min-h-screen">
<div class=" px-5">

    <div class=" grid grid-cols-9 place-content-center gap-3 pt-4 w-auto mx-auto px-5">


        @php
            $products = App\Models\Product::where('level_id', $product->id)->with('level')->get();

        @endphp

        <div class="card col-span-6 divide-y-2 gap-3 pb-3">
            {{-- <h2>Products in {{ $subject->name }} Category</h2> --}}
            @forelse ($products as $product)

                <div class=" flex items-center">
                    <div class="px-5">
                        <img
                        {{-- src="/image/users.png"--}}
                        src="/img/{{ $product->teacher?->profile }}" alt="..."
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

            @empty

            <p class="text-base pl-5"><br> No post found in this Level.</p>

            @endforelse
        </div>


        <div class="text-lg font-medium col-span-3 bg-white p-3 h-fit divide-y-2">
            Popular Post
            @php
            //$like = App\Models\Like::where(['product_id'=>$product->id, 'user_id'=>auth()->id()])->first()
                $popularPosts = App\Models\Product::orderBy('likes', 'desc')->take(3)->get();
            @endphp


            @foreach ($popularPosts as $popularPost)
                <div class=" flex items-center space-y-0 space-x-2">

                    <div class=" py-2 pr-2">
                        <img
                        {{-- src="image/logo.png" --}}
                        src="/img/{{ $popularPost->teacher?->profile }}" alt="..."
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

    <div>

        {{-- @php
            $products = App\Models\Product::where('subject_id', $product->id)->with('subject')->get();
            $categories = App\Models\Subject::all();
        @endphp
        <h2>Products</h2>
        <ul>
            @foreach($products as $product)
                <li>{{ $product->term }} (Category: {{ $product->subject->subject }})</li>
                <p>{{$product->term}}</p>
            @endforeach
        </ul> --}}
    </div>

</div>

@endsection
