@extends('layouts.app') 
@section('content')
<div class="card">
    <div class="card-header h4">ALL Posts</div>
    <div class="card-body">
        <a href="{{route('post.create')}}" class="btn btn-success mb-3">
                <i class="fa fa-edit"></i>Create New Post</a>

        <a href="{{route('post.trash')}}" class="btn btn-danger mb-3">
            <i class="fa fa-trash"></i> Trash</a>

        <div id="posts" class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <th scope="col">#</th>
                    <th scope="col">featured</th>
                    <th scope="col">Post Name</th>
                    <th scope="col" class="text-right"> Edit</th>
                    <th scope="col">Delete</th>
                </thead>
             
                <tbody>
                        @if(count($posts)> 0)
                    <?php $row = 1;?> @foreach($posts as $post)
                    <tr scope="row">
                        <td>{{$row++}}</td>
                        <td>
                            <img src='{{$post->featured}}' class="img-thumbnail" width="100px" height="100px" alt="{{$post->title}}">
                         </td>
                        <td>
                            <a href="{{route('post.single',$post->slug)}}" target="_blank">{{$post->title}}</a>
                        </td>
                        <td>
                            <!-- Button trigger modal -->

                            <a href="{{route('post.edit',$post)}}" class="btn btn-primary" style="float:right">
                                    <i class="fa fa-edit"></i> Edit</a>
                      

                        </td>
                        <td>
                            <a href="{{route('post.delete',$post)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                         

                            </td>
                        </tr>

                    @endforeach
                    @else
                    <tr>
                            <th colspan="5"> <h4 class="text-center">There are no published posts</h4>  </th>  </tr>
                    @endif
                    </tbody>
                  
                </table>
            </div>
        </div>
    </div>
@endsection