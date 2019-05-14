@extends('layouts.app') 
@section('content')
<div class="card">
    <div class="card-header h4">ALL Trashed categorys</div>
    <div class="card-body">
        <a href="{{route('category.create')}}" class="btn btn-success mb-3"> <i class="fa fa-edit"></i>Create New category</a>


        <div id="category" class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <th scope="col">#</th>
                                        <th scope="col">category Name</th>
                    <th scope="col" class="text-right"> Restore</th>
                    <th scope="col">Delete</th>
                </thead>
               
                <tbody>
                        @if(count($categories)> 0)
                    <?php $row = 1;?> 
                    
                    @foreach($categories as $category)
                    <tr scope="row">
                        <td>{{$row++}}</td>
                      
                        <td>
                            {{$category->name}}
                        </td>
                        <td>

                            <a href="{{route('category.restore',$category->id)}}" class="btn btn-primary" style="float:right">Restore</a>
                      

                        </td>
                        <td>
                            <a href="{{route('category.hdelete',$category->id)}}" class="btn btn-danger">Delete 4ever</a>
                          

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