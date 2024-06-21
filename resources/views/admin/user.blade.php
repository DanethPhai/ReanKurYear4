@extends('layouts.master')

@section('content')

<br>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row bg-comman pt-3">
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
        </div>
    </div>
</div>

@endsection
