@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header h4">Create New Post</div>
        <div class="card-body">
            @include('errors')

            <form method="Post" action="{{route('post.update',$post)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
               {{method_field('PUT')}}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="title" class="form-control" id="title"  name="title" value="{{$post->title}}">

                </div>
                <div class="form-group">
                    <label for="title">Category</label>
                    <div class="example">
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#category').multiselect({
                                    onChange: function(option, checked) {
                                        var values = [];
                                        $('#category option').each(function() {
                                            if ($(this).val() !== option.val()) {
                                                values.push($(this).val());
                                            }
                                        });
                                        $('#category').multiselect('deselect', values);
                                    }                                  
                                });

                                var data = '{{$post->category_id}}';                                         
                                $('#category').multiselect('select', data);
                            //==============for tags=================
                            $('#tags_id').multiselect(); 
                            var data = "{{$post_tags_id}}";
                            var valArr = data.split(",");
                           var i = 0, size = valArr.length;
                            for (i; i < size; i++) {
                             $('#tags_id').multiselect('select', valArr[i]);
                           }   
                            });
                        </script>
                     
                        <select id="category" multiple="multiple" name="category_id">
                           @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                               @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags_id">Tag</label>
                    <div>
                    <select id="tags_id"name="tags_id[]" multiple="multiple">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" class="form-control" id="featured"  name="featured" accept="image/*">
                </div>
                <div class="form-group ">
                    <label for="content">Content</label>
                    <textarea id="summernote" class="form-control" name="content" >{{$post->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-success btn-block">Update</button>

            </form>
        </div>
    </div>

@endsection
@section('style')
<link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}"/>
<link rel="stylesheet" href="{{asset('css/summernote-bs4.css')}}"/>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/bootstrap-multiselect.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/summernote-bs4.js')}}"></script>
<script>

$(document).ready(function() {
    $('#summernote').summernote({
       toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']]
        ]
    });
  });
</script>
@endsection