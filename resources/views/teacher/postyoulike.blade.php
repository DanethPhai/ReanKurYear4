@extends('layouts.app')

@section('content')

<div class=" bg-[#C5D5E2] h-screen w-screen">
<div class=" bg-white ">

    <div class=" flex items-center justify-center">

        <div class=" bg-white mx-auto w-1/2">
            <div class="card col-span-5 divide-y-2 gap-3 ">
                @php
                    $like = App\Models\Like::where(['product_id'=>$product->id, 'user_id'=>auth()->id()])->first()
                @endphp
                @foreach ($products as $product)
                    <div class=" flex items-center">
                        <div class="px-5">
                            <img src="/img/{{ $product->teacher->profile }}" alt="..."
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

                            <div class="flex mb-3">
                                <a
                                    href="{{ route('product.show',$product->id) }}"
                                    href="/showpost"
                                    class=" no-underline"
                                >
                                    <div class="text-white bg-[#479BE8] hover:bg-blue-600 font-semibold font-sans rounded-xl text-sm px-4 py-0.5 mr-2 w-fit focus:outline">Detail</div>
                                </a>
                                <a
                                    href="{{route('product.edit', $product->id)}}"
                                    class=" no-underline "
                                >
                                    <div class=" text-blue-500 no-underline outline-[#479BE8] outline outline-1 bg-[#ffffff] hover:bg-blue-500 hover:text-white font-semibold font-sans rounded-xl text-sm px-4 py-0.5 mr-2 w-fit focus:outline">Edit</div>
                                </a>
                                <form action="{{ route('teacher.product.delete',$product->id) }}" method="POST">
                                    {{ csrf_field()  }}
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 no-underline outline-red-500 outline outline-1 bg-[#ffffff] hover:bg-red-500 hover:text-white font-semibold font-sans rounded-xl text-sm px-4 py-0.5 mr-2 w-fit focus:outline"><i data-feather="trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>
                @endforeach
        </div>
    </div>


</div>

@endsection
