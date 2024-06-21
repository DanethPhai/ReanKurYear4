@extends('layouts.app')

@section('content')

<div class=" bg-[#C5D5E2] h-full min-h-screen w-screen">
    <div class=" bg-white ">

        <div class=" flex items-center justify-center">

            <div class=" gap-3 pb-3 w-1/2">

                <div class=" flex  space-y-0">
                    <div class="px-5">
                        {{-- <img src="image/logo.png" class="img-fluid rounded-3xl w-10" alt="..."> --}}
                            <img src="/img/{{ $teacher->profile }}"
                                {{-- src="images/{{ $product->picture }}" --}}

                        class="img-fluid rounded-start w-60 p-2" alt="...">

                    </div>

                    <div class=" p-2 pt-3">
                        {{-- @foreach ($user->teacher as $val) --}}
                        <p class="text-2xl">
                            {{ $teacher->user->name }}
                                {{-- {{$val->user?->name}} --}}
                        </p>
                        {{-- @endforeach --}}
                        <hr>
                        <p class="text-sm">
                            {{ $teacher->major}}
                        </p>
                        <p class="text-sm mb-3">Tel:
                            {{ $teacher->tel }}
                        </p>
                        <p class="text-sm">Email:
                            {{ $teacher->user->email }}
                        </p>
                        <p class="text-sm mb-3">Birth:
                            {{ $teacher->birth }}
                        </p>

                    </div>

                </div>
                <hr>
                <div class=" flex justify-between">

                    <div class="  hover:text-blue-500 text-gray-900">Your Post</div>

                    <a href="{{route('teacher.edit', $teacher->id)}}" class=" no-underline ">
                        <div class="  hover:text-blue-500 text-gray-900">Edit Profile</div>
                    </a>
                    <a href="{{url('/products/create')}}" class=" no-underline ">
                        <div class="  hover:text-blue-500 text-gray-900">Create Post</div>
                    </a>

                    {{-- <a href="{{url('/postyoulike/' . $teacher->id)}}" class=" no-underline ">
                        <div class="  hover:text-blue-500 text-gray-900">Post you Liked</div>
                    </a> --}}

                </div>

            </div>

        </div>
    </div>
    <br>
    <div class=" bg-white mx-auto w-1/2">
        <div class="card col-span-5 divide-y-2 gap-3 ">
            @foreach ($teacher->products as $product)
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

@endsection
