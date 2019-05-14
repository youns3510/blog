@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header h4">Create New Category</div>
        <div class="card-body">
            <div>
                @include('errors')

            </div>

            <form method="Post" action="{{route('category.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category"  name="name" placeholder="Enter category">

                </div>


                <button type="submit" class="btn btn-success btn-block">Store</button>

            </form>
        </div>
    </div>

@endsection