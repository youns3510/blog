@extends('layouts.app') 
@section('content')
<div class="card">
    <div class="card-header h4">ALL Trashed categorys</div>
    <div class="card-body">
        <a href="{{route('tag.create')}}" class="btn btn-success mb-3"> <i class="fa fa-edit"></i>Create New Tag</a>


        <div id="tag" class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <th scope="col">#</th>
                                        <th scope="col">tag Name</th>
                    <th scope="col" class="text-right"> Restore</th>
                    <th scope="col">Delete</th>
                </thead>
               
                <tbody>
                        @if(count($tags)> 0)
                    <?php $row = 1;?> 
                    
                    @foreach($tags as $tag)
                    <tr scope="row">
                        <td>{{$row++}}</td>
                      
                        <td>
                            {{$tag->name}}
                        </td>
                        <td>

                            <a href="{{route('tag.restore',$tag->id)}}" class="btn btn-primary" style="float:right">Restore</a>
                      

                        </td>
                        <td>
                            <a href="{{route('tag.hdelete',$tag->id)}}" class="btn btn-danger">Delete 4ever</a>
                          

                            </td>
                        </tr>

                    @endforeach
                  
                    @else
                    <tr>
                            <th colspan="5"> <h4 class="text-center">There are no trashed categories</h4>  </th>  </tr>                 @endif
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection