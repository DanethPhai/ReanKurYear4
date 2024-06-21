@extends('layouts.app')

@section('content')

<div class=" bg-[#C5D5E2] h-full min-h-screen">
    <div class=" px-5">

        <div class=" grid grid-cols-3 gap-3 pt-4">
            <div class="card col-span-2 gap-3 pb-3 h-fit px-4">
                <div class=" flex items-center">
                    <div class="p-2">
                        <img
                        src="/img/{{$product->teacher->profile}}"
                        class="img-fluid rounded-start w-16 pr-2" alt="...">

                    </div>

                    <div class="space-y-1">
                        <div class=" font-medium">
                            {{-- {{ Auth::user()->name }} --}}
                            {{$product->teacher->user->name}}
                        </div>
                        <div class="text-xs text-gray-600">1 day
                            {{-- {{ $product->time}} --}}
                        </div>

                    </div>

                </div>

                <div class=" p-2">
                    <div class="flex gap-6">
                        <div>បង្រៀន : {{ $product->subject->subject }} ;</div>
                        <div>កម្រិត : {{ $product->level->level }} </div>

                    </div>

                    <div> ម៉ោងដែលបង្រៀន : {{ $product->time }}</div>
                    <div> តម្លៃ ៖ {{ $product->price }} ៛ ក្នុង {{ $product->term }}</div>

                    <br>
                    <div class="flex">
                        <div>Detail: </div>
                        <div> {{ $product->detail }}</div>

                    </div>

                    <hr>

                    <div class=" flex justify-between">
                        @php
                            $like = App\Models\Like::where(['product_id'=>$product->id, 'user_id'=>auth()->id()])->first()
                        @endphp
                        @if ($like)
                            <form action="{{ route('products.unlike', $product->id)}}" method="POST">
                                @csrf
                                <button type="submit"  class="flex gap-1">
                                    <img src="https://www.downloadclipart.net/thumb/11072-red-heart-vector-thumb.png" class="w-7 h-7"  alt="">
                                    <span class=" no-underline"> {{ $product->likes}}</span>

                                </button>
                            </form>
                        @else
                            <form action="{{ route('products.like', $product->id)}}" method="POST">
                                @csrf
                                <button type="submit"  class="flex gap-1">
                                    <img src="https://webstockreview.net/images/hearts-vector-png-7.png" class="w-6 h-6"  alt="">
                                    <span class=" no-underline"> {{ $product->likes}}</span>

                                </button>
                            </form>

                        @endif

                        {{-- <a href="#" class="flex gap-1" style="text-decoration:none" >
                            <img src="https://webstockreview.net/images/hearts-vector-png-7.png" class="w-6 h-6"  alt="">
                            <span class=" no-underline"> {{ $product->likes->count()}}</span>
                        </a> --}}

                       
                    </div>




                </div>
                <br/>
                <form action="{{route('products.comment',$product->id)}}" class=" flex items-center mx-2" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ $product->id }}">
                    {{-- <div class="pl-2 pr-4 ">
                        {{-- <img src="image/logo.png" class="img-fluid rounded-3xl w-10" alt="...">
                        {{-- <img src="image/logo.png"
                        src="images/{{ $product->picture }}"
                        class="img-fluid rounded-start h-8 w-8 pr-2" alt="...">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full mx-2 bg-gray-100">

                    </div> --}}
                    <div class="relative w-full z-0 mb-2 group">
                        <input type="text" name="comment" id="comment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_comment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Comment here...</label>
                        <div class="absolute inset-x-0 bottom-0 border-b border-gray-400 peer-focus:border-b-2 peer-focus:border-indigo-600"></div>

                    </div>
                    <button type="submit" id="addCommentBtn" class=" ml-4 text-white  bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm sm:w-auto px-3 py-0.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Comment</button>
                </form>


                <div class=" px-4 pt-5">
                    @foreach ($product->comments as $comment)
                        <div class="flex space-x-4  text-sm text-gray-500 pb-3 pt-3">
                            @if ($comment->user->teacher)

                                <div class="flex-none ">
                                    <img src="/img/{{ $comment->user?->teacher?->profile }}" alt="" class="w-8 rounded-full ">
                                </div>
                            @else
                                <div class="flex-none ">
                                    <img src="https://www.pngall.com/wp-content/uploads/5/Profile.png" alt="" class="h-8 w-8 rounded-full bg-gray-100">
                                </div>

                            @endif

                            <div class="">
                                <div class="font-medium text-black text-sm">{{ $comment->user?->name}}</div>
                                {{-- <div datetime="2021-07-16" class=" text-xs">July 16, 2021</div> --}}

                                    <div class="prose prose-sm mt-1 max-w-none text-gray-500">
                                        {{ $comment->comment }}
                                    </div>

                            </div>

                        </div>
                    @endforeach


                        <!-- More reviews... -->


                    </div>
            </div>

            <div class="text-lg font-medium col-span-1 bg-white p-3 h-fit divide-y-2">
                Related Post
                @forelse ($relatedProduct as $product)
                    <div class="col-span-5 divide-y-2">
                        <div class=" flex items-center py-2">
                            <div class="pr-3">

                                <img src="/img/{{ $product->teacher->profile }}"

                                class="img-fluid rounded-start w-24 p-2" alt="...">

                            </div>

                            <div class="space-y-0">
                                <div class=" text-sm">Major:
                                    {{-- {{ $product->major }} --}}
                                    {{ $product->subject->subject }}
                                </div>
                                <div class="text-sm mb-2">Level:
                                    {{-- {{ $product->cost }} --}}
                                    {{ $product->level->level}}
                                </div>
                                <div class="text-sm">Time:
                                    {{-- {{ $product->time}} --}}
                                    {{ $product->time}}
                                </div>


                                <a
                                href="{{ route('product.show',$product->id) }}"
                                >
                                    <div class="text-white bg-[#479BE8] hover:bg-blue-600 font-semibold font-sans rounded-xl text-sm px-4 py-0.5 mr-2 w-fit focus:outline">Detail</div>
                                </a>
                            </div>

                        </div>


                    </div>
                @empty

                <p class=" text-sm"><br> No post found related to this post.</p>
                @endforelse
        </div>


    </div>

<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
})


// Add Comment To Product By Id

$("#addCommentBtn").click(function(e){

    //e.preventDefault();
    var comment = $('#comment').val();
    var rating =  $('#rating').val();
    var id = $('#id').val();


    $.ajax({
        type: "POST",
        dataType: "json",
        data: {comment:comment, rating:rating, _token: '{{csrf_token()}}'},
        url: "/products/"+$id,
        success: function(data) {
            console.log('Added Comment');
        },
        error: function(error) {
            console.log(error.responseJSON.errors.comment);
            console.log(error.responseJSON.errors.rating);
        }
    });

});

</script>

@endsection

