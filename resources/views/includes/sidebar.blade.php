
         <!-- Sidebar-->

         <div class="col-lg-12">
            <aside aria-label="sidebar" class="sidebar sidebar-right">
               <div class="widget w-tags">
                  <div class="heading text-center">
                     <h4 class="heading-title">ALL BLOG TAGS</h4>
                     <div class="heading-line">
                        <span class="short-line"></span>
                        <span class="long-line"></span>
                     </div>
                  </div>

                  <div class="tags-wrap">
                     @foreach ($tags as $tag)
                     <a href="{{route('tag.single',$tag->id)}}" class="w-tags-item">{{$tag->name}}</a>
                     @endforeach


                  </div>
               </div>
            </aside>
         </div>

         <!-- End Sidebar-->