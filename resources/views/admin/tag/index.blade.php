@extends('layouts.app') 
@section('content')
<div class="card">
   <div class="card-header h4">All Categories</div>
   <div class="card-body">
      <a href="{{route('tag.create')}}" class="btn btn-success mb-3"> <i class="fa fa-edit"></i>Create New Tag</a>

      <a href="{{route('tag.trash')}}" class="btn btn-danger mb-3">
                <i class="fa fa-trash"></i> Trash</a>
      <div class="table-responsive">
         <table class="table">
            <thead class="thead-dark">
               <th scope="col">#</th>
               <th scope="col">Tag Name</th>
               <th scope="col" class="text-right"> Edit</th>
               <th scope="col">Delete</th>
            </thead>
            <tbody>
               @if(count($tags) > 0)
               <?php $row = 1;?> @foreach($tags as $tag)
               <tr scope="row">
                  <td>{{$row++}}</td>
                  <td>
                     {{$tag->name}}
                  </td>
                  <td>
                     <!-- Button trigger modal -->

                     <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#edit_model{{$tag->id}}">Edit
                                </button>
                     <!-- Modal -->
                     <div class="modal fade" id="edit_model{{$tag->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header alert alert-danger" role="alert">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                              </div>

                              <form method="post" action="{{route('tag.update',$tag)}}" enctype="multipart/form-data">
                                 {{ csrf_field() }} {{method_field('PUT')}}
                                 <div class="modal-body text-center text-danger">
                                    <input type="text" name='name' value="{{$tag->name}}" class="col-9 form-control">


                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                    <button type="submit" class="btn btn-primary">update</button>


                                 </div>
                              </form>
                           </div>

                        </div>
                     </div>
                     <!--End Modal -->

                  </td>
                  <td>
                     <a href="{{route('tag.delete',$tag)}}" class="btn btn-danger">Delete</a> {{--
                     <form method="post"
                        action="{{route('tag.destroy',$tag)}}" --}} {{-- enctype="multipart/form-data">--}} {{-- {{ csrf_field() }}--}} {{-- {{method_field('DELETE')}}--}} {{-- <button type="submit" class="btn btn-primary">Delete</button>--}}
                        {{-- </form>--}}

                  </td>
               </tr>

               @endforeach @else
               <tr>
                  <th colspan="5">
                     <h4 class="text-center">There are no tags </h4>
                  </th>
               </tr>
               @endif
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection