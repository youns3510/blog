@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header h4">Create New Tag</div>
        <div class="card-body">
            <div>
                @include('errors')

            </div>

            <form method="Post" action="{{route('tag.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="tag" class="form-control" id="tag"  name="name" placeholder="Enter tag">

                </div>


                <button type="submit" class="btn btn-success btn-block">Store</button>

            </form>
        </div>
    </div>

@endsection