@extends('layouts.app') 
@section('content')
<div class="card">
    <div class="card-header h4">ALL Trashed Posts</div>
    <div class="card-body">
        <a href="{{route('post.create')}}" class="btn btn-success mb-3"> <i class="fa fa-edit"></i>Create New Post</a>


        <div id="posts" class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <th scope="col">#</th>
                    <th scope="col">featured</th>
                    <th scope="col">Post Name</th>
                    <th scope="col" class="text-right"> Restore</th>
                    <th scope="col">Delete</th>
                </thead>
               
                <tbody>
                        @if(count($posts)> 0)
                    <?php $row = 1;?> 
                    
                    @foreach($posts as $post)
                    <tr scope="row">
                        <td>{{$row++}}</td>
                        <td>
                            <img src='{{$post->featured}}' class="img-thumbnail" width="100px" height="100px" alt="{{$post->title}}">
                         </td>
                        <td>
                           {{$post->title}}
                        </td>
                        <td>

                            <a href="{{route('post.restore',$post->id)}}" class="btn btn-primary" style="float:right">Restore</a>
                      

                        </td>
                        <td>
                            <a href="{{route('post.hdelete',$post->id)}}" class="btn btn-danger">Delete 4ever</a>
                            {{--  <form method="post" action="{{route('category.destroy',$category)}}" enctype="multipart/form-data">
                                {{ csrf_field() }} {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-primary">Delete 4ever</but
                                </form>  --}}

                            </td>
                        </tr>

                    @endforeach
                  
                    @else
                    <tr>
                            <th colspan="5"> <h4 class="text-center">There are no trashed posts</h4>  </th>  </tr>                 @endif
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection