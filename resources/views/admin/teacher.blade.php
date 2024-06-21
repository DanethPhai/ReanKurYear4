@extends('layouts.master')

@section('content')

<br>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row bg-comman pt-3">
            <h3 class="page-title ">All Teachers</h3>
            <div class="col-md-12 px-4" style="display:flex">
                    <table class="table">
                        @php
                            $teachers = App\Models\Teacher::all();
                        @endphp
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Birth</th>
                            <th scope="col">Major</th>
                            <th scope="col">Tel</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Certificate</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <th scope="row">{{ $teacher->id }}</th>
                                    <td>{{ $teacher->user->name }}</td>
                                    <td>{{ $teacher->birth}}</td>
                                    <td>{{ $teacher->major }}</td>
                                    <td>{{ $teacher->tel }}</td>
                                    <td>
                                        <img src="/img/{{ $teacher->profile }}" class="img-fluid rounded-start w-50" alt="...">
                                    </td>
                                    <td>
                                        <img src="/img/{{ $teacher->certificate }}" class="img-fluid rounded-start w-50" alt="...">
                                    </td>

                                    {{-- <td><a href="{{ route('teacher.create')}}" class="btn btn-info">Create</a></td> --}}
                                    <td>
                                        <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST">
                                            {{ csrf_field()  }}
                                            @method('DELETE')

                                            <td><a href="{{ route('teacher.edit', $teacher->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                                            <td><a href="{{ route('teacher.show', $teacher->id)}}" class="btn btn-secondary btn-sm">View</a></td>
                                            <td>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </td>


                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
