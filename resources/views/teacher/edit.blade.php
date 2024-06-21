@extends('layouts.app')

@section('content')

<div  class="  bg-[#C5D5E2] py-4">

    <div class=" pl-5 ">
        <a href="{{route('teacher.show', $teacher->id)}}" >
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
                action="{{ route('teacher.update',  $teacher->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                {{ csrf_field() }}
                @method('PUT')

                <h3 class=" font-medium pb-3 text-center">Update Profile</h3>


                <div class="mb-3">
                    <label for="birth" class="form-label">ថ្ងៃ​ ខែ ឆ្នាំកំណើត</label>
                    <input id="birth" name="birth" value="{{$teacher->birth}}" type="date" class="form-control" placeholder="ថ្ងៃ​ ខែ ឆ្នាំកំណើត">
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label">លេខទូរសព្ទ</label>
                    <input id="tel" name="tel" value="{{$teacher->tel}}" type="tel" class="form-control" placeholder="012345678">
                </div>

                <div class="mb-3">
                    <label for="major" class="form-label">ឯកទេស</label>
                    <select id="major" name="major" value="{{$teacher->major}}" class="form-control">
                        <option value="ភាសាអង់គ្លេស">ភាសាអង់គ្លេស</option>
                        <option value="គណិតវិទ្យា">គណិតវិទ្យា</option>
                        <option value="រូបវិទ្យា">រូបវិទ្យា</option>
                        <option value="គីមិវិទ្យា">គីមិវិទ្យា</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="profile" class="form-label">រូបថតផ្ទាល់ខ្លួន </label>
                    <input id="profile" name="profile" value="{{$teacher->profile}}" type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="certificate" class="form-label">រូបថតសញ្ញាបត្រ័បញ្ជាក់កាសិក្សា </label>
                    <input id="certificate" name="certificate" value="{{$teacher->certificate}}" type="file" class="form-control">
                </div>

                <button type="submit" class=" w-full text-white bg-blue-500 hover:bg-blue-600 font-sans rounded-md px-4 py-1 mt-6 mr-2 text-center focus:outline no-underline" >
                    Update
                </button>


            </form>
        </div>

    </div>
</div>


@endsection



