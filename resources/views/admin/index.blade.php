{{-- @extends('layouts.dashbord') --}}
@extends('layouts.master')
@section('content')

<br>

<div class="page-wrapper">
    <div class="content container-fluid">

        @php
            $allteacher = App\Models\Teacher::all()->count();
            $allpost = App\Models\Product::all()->count();
            $alluser = App\Models\User::all()->count();
            $user = $alluser - $allteacher
        @endphp
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">

                            <div class="db-info">
                                <h6>Teacher</h6>
                                <h3>{{$allteacher}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="/assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Post</h6>
                                <h3>{{$allpost}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="/assets/img/icons/post.png" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>User</h6>
                                <h3>{{$user}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="/image/users.png" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      {{-- All teacher --}}
        {{-- <div class="row bg-comman pt-3">
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
        <hr> --}}

    {{-- All post --}}
        {{-- <div class="row">
            @php
                $products = App\Models\Product::paginate(10);
            @endphp
            <h3 class="page-title">All Posts</h3>
            <div class="col-md-12 px-4  " style="display:flex">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Level</th>
                            <th scope="col">Time</th>
                            <th scope="col">Price</th>
                            <th scope="col">Tel</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->teacher->user->name }}</td>
                                    <td>{{ $product->subject->subject }}</td>
                                    <td>{{ $product->level->level }}</td>
                                    <td>{{ $product->time }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->teacher->tel }}</td>
                                    <td><a href="{{ route('product.edit', $product->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="{{ route('product.show', $product->id)}}" class="btn btn-secondary btn-sm">View</a></td>

                                    <td>
                                        <form action="{{ route('admin.product.delete', $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
            <div class=" flex justify-center">{{$products->links()}}</div>
        </div>
        <hr> --}}
    {{-- All User --}}
        {{-- <div class="row bg-comman pt-3">
            <h3 class="page-title ">All Users</h3>
                <div class="col-md-12 px-4" style="display:flex">

                        <table class="table">
                            @php
                        $users = App\Models\User::all();
                    @endphp
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->password }}</td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div> --}}


    </div>
</div>



@endsection
