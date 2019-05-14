@extends('layouts.app') 
@section('content')
<div class="card">
   <div class="card-header h4">All Categories</div>
   <div class="card-body">

      <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addNew"><i class="fa fa-edit"></i>Create New User </button>
      <!-- Modal -->
      <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
               </div>

               <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="modal-body">
                     <div class="form-group">
                        <label for="user">Name</label>
                        <input type="text" class="form-control" id="user" name="name" placeholder="Enter name" required>

                     </div>
                     <div class="form-group">
                        <label for="user">E-mail</label>
                        <input type="email" class="form-control" id="user" name="email" placeholder="Enter email" required>

                     </div>


                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                     <button type="submit" class="btn btn-primary">save</button>


                  </div>
               </form>
            </div>

         </div>
      </div>
      <!--End Modal -->

      <a href="{{route('user.trash')}}" class="btn btn-danger mb-3">
                <i class="fa fa-trash"></i> Trash</a>
      <div id="users" class="table-responsive">
         <table class="table">
            <thead class="thead-dark">
               <th scope="col">#</th>
               <th scope="col">avatar</th>
               <th scope="col">User Name</th>
               <th scope="col">Permission</th>
               <th scope="col" class="text-right"> Edit</th>
               <th scope="col">Delete</th>
            </thead>
            <tbody>
               @if(count($users) > 0)
               <?php $row = 1;?> @foreach($users as $user)
               <tr scope="row">
                  <td>{{$row++}}</td>
                  <td><img src='{{asset($user->profile->avatar)}}' class="avatar" alt="{{$user->name}}"></td>
                  <td>
                     {{$user->name}}
                  </td>
                  <td>
                     @if($user->admin)
                     <a href="{{route('permission',$user)}}" class="btn btn-danger mb-3"> <i class="fa fa-edit"></i>Remove Permission</a>                     @else
                     <a href="{{route('permission',$user)}}" class="btn btn-success mb-3"> <i class="fa fa-edit"></i>make as Admin</a>                     @endif
                  </td>
                  <td>
                     <!-- Button trigger modal -->

                     <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#edit_model{{$user->id}}">Edit
                                </button>
                     <!-- Modal -->
                     <div class="modal fade" id="edit_model{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header alert alert-danger" role="alert">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                              </div>

                              <form method="post" action="{{route('user.update',$user)}}" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 {{method_field('PUT')}}
               
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <label for="user">Name</label>
                                       <input type="text" class="form-control" id="user" name="name" value="{{$user->name}}" required>
               
                                    </div>
                                    <div class="form-group">
                                       <label for="user">E-mail</label>
                                       <input type="email" class="form-control" id="user" name="email" value="{{$user->email}}" required>
               
                                    </div>
               
               
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                           Close
                                       </button>
                                    <button type="submit" class="btn btn-primary">save</button>
               
               
                                 </div>
                              </form>
                           </div>

                        </div>
                     </div>
                     <!--End Modal -->

                  </td>
                  <td>
                     <a href="{{route('user.delete',$user)}}" class="btn btn-danger">Delete</a>
                  </td>
               </tr>

               @endforeach @else
               <tr>
                  <th colspan="5">
                     <h4 class="text-center">There are no users </h4>
                  </th>
               </tr>
               @endif
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection