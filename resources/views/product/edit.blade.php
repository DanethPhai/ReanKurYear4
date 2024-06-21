@extends('layouts.app')

@section('content')

<div  class=" bg-[#C5D5E2] py-4">

    {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{url('/')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
            All Post category
        </a>
    </div> --}}
    <div class=" pl-5 ">
        <a href="{{route('product.index')}}" >
            <img src="http://cdn.onlinewebfonts.com/svg/img_430320.png" alt="" class="w-6">
        </a>
    </div>


    <div class="mx-auto w-1/3 bg-white rounded-lg" >
        <div class="p-4">

            @if ($errors->any())
                <div class="mt-2 alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('product.update', $product->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                {{ csrf_field() }}
                @method('PUT')

                <h3 class=" font-medium pb-3 text-center">Edit Post</h3>

                {{-- <div class="mb-3">
                    <label for="name" class="form-label">ឈ្មោះ<span class="text-danger">*</span></label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="ឈ្មោះ" required>
                </div> --}}
                <div class="mb-3">

                    <label for="subject_id" class="form-label">ឯកទេស<span class="text-danger">*</span></label>
                    <select id="subject_id" name="subject_id" value="{{$product->subject_id}}" class="form-control" required>
                        <option value="1">ភាសាអង់គ្លេស</option>
                        <option value="2">ភាសាខ្មែរ</option>
                        <option value="3">គណិតវិទ្យា</option>
                        <option value="4">រូបវិទ្យា</option>
                        <option value="5">គីមិវិទ្យា​</option>
                        <option value="6">ជីវវិទ្យា</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="level_id" class="form-label">កម្រិត<span class="text-danger">*</span></label>
                    <select id='level_id' name='level_id' value="{{$product->level}}" class="form-control" aria-placeholder="Choose" required>
                        <option value="1">មត្តេយ្យសិក្សា</option>
                        <option value="2">បឋមសិសក្សា</option>
                        <option value="3">អនុវិទ្យាល័យ</option>
                        <option value="4">វិទ្យាល័យ</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="time" class="form-label"> ម៉ោងសិក្សា </label>
                    <input id="time" name="time" type="text" value="{{$product->time}}" class="form-control">
                </div>

                <div class=" grid grid-cols-5 gap-3 ">
                    <div class="mb-3 col-span-3">
                        <label for="price" class="form-label">តម្លៃ(៛)</label>
                        <input id="price" name="price" value="{{$product->price}}" type="text" class="form-control">
                    </div>
                    <div class="mb-3 col-span-2">
                        <label for="term" class="form-label">រយះពេល</label>
                        <input id="term" name="term" value="{{$product->term}}" type="text" class="form-control">
                    </div>
                </div>


                {{-- <div class="mb-3">
                    <label for="tel" class="form-label">លេខទូរសព្ទ<span class="text-danger">*</span></label>
                    <input id="tel" name="tel" type="tel" class="form-control" placeholder="012345678">
                </div> --}}

                {{-- <div class="mb-3">
                    <label for="picture" class="form-label">រូបថត <span class="text-danger">*</span></label>
                    <input id="picture" name="picture" type="file" class="form-control">

                </div> --}}

                <div class="mb-3">
                    <label for="detail" class="form-label">Detail</label>
                    <input id="detail" name="detail" value="{{$product->detail}}" class="form-control">

                </div>

                <button type="submit" class=" w-full text-white bg-blue-500 hover:bg-blue-600 font-sans rounded-md px-4 py-1 mt-6 mr-2 text-center focus:outline no-underline" >
                    Update
                </button>


            </form>
        </div>

    </div>
</div>


@endsection



