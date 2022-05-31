{{-- <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
    <div id="advertisement" class="advertisement">
      @php
          $reviews = App\Models\review::all();
      @endphp
      @foreach ($reviews as $review)
      @php
          
          $user = App\Models\user::find($review->user_id);
      @endphp
        <div class="item">
          <div class="avatar"><img src=" {{ asset('upload/users_images/'.$user->profile_photo_path) }} " alt="Image"></div>
          <div class="testimonials"><em>"</em>{{$review->review}}<em>"</em></div>
          <div class="clients_author">{{$review->user_name}}</div>
          <!-- /.container-fluid --> 
        </div>
      
      @endforeach
      <!-- /.item -->
     
      <!-- /.item --> 
      
    </div>
    <!-- /.owl-carousel --> 
  </div> --}}