@include('/admin/partials/header')
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
@include('/admin/partials/sidebar')


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        @include('/admin/partials/nav')
        <div class="pl-4">
            @if(Session::has('deleted_post'))
          <div style="color: #9F6000;
          background-color: #FEEFB3;
          height:40%; width:100%;
          text-align:left;">
             <p><i class="fa fa-info-circle"></i>&ensp;{{session('deleted_post')}}</p>
          </div>
             @endif
             @if(Session::has('updated_post'))
          <div style="color: #9F6000;
          background-color: #FEEFB3; 
          height:40%; width:100%;
          text-align:center;
          padding-top:5px; font-weight:bolder;">
             <p><i class="fa fa-info-circle"></i>&ensp;{{session('updated_post')}}</p>
          </div>
             @endif
            <h1>Posts</h1>
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Photo</th>
                  <th>Title</th>
                  <th>Owner</th>
                   <th>Category_id</th> 
                  <th>Body</th>
                  <th>Post Link</th>
                  <th>Comments</th>

                  <th>Created_at</th>
                  <th>Updated_at</th>
                </tr>
              </thead>
              <tbody>
                @if($posts)
               
                  @foreach($posts as $post)
                  <tr>

                  <td>{{$post->id}}</td>
                  <td><img height="50" src="{{$post->photo ? url('/images/'.$post->photo->file):'https://imgplaceholder.com/350x225/ff7f7f/333333/fa-image'}}" alt=""></td>
                  <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->category_id}}</td>
                  <td>{{str_limit($post->body,11)}}</td>
                  <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
                  <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
                  
                </tr>
                  @endforeach
                @else
                <div>
                    No Posts Available.
                </div>
                @endif
              </tbody>
            </table>
            
              <div class="row">
                <div class="col-sm-6" style="margin-left:450px;">
                  {{$posts->render()}}
                </div>
              </div>
           
        </div>
    </div>
    <!-- End of Main Content -->

    

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

 <!-- Bootstrap core JavaScript-->
 <script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{URL::asset('js/sb-admin-2.min.js')}}"></script>

 <!-- Page level plugins -->
 <script src="{{URL::asset('vendor/chart.js/Chart.min.js')}}"></script>

 <!-- Page level custom scripts -->
 <script src="{{URL::asset('js/demo/chart-area-demo.js')}}"></script>
 <script src="{{URL::asset('js/demo/chart-pie-demo.js')}}"></script>
@include('/admin/partials/footer')

</body>

</html>
