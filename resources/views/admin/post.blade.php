@extends('layouts.master')

@section('content')

<br>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row bg-comman pt-3">
            <div class="row">
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
        <hr>
        </div>
    </div>
</div>

@endsection
