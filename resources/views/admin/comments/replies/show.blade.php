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
        
            @if(count($replies)>0)
            <h1>All Replies</h1>
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                   <th>Email</th> 
                  <th>Body</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @if($replies)
               
                  @foreach($replies as $reply)
                  <tr>
                  <td>{{$reply->id}}</td>
                  <td>{{$reply->author}}</a></td>
                  <td>{{$reply->email}}</td>
                  <td>{{str_limit($reply->body,11)}}</td>
                  <td>{{$reply->created_at->diffForHumans()}}</td>
                  <td>{{$reply->updated_at->diffForHumans()}}</td>
                  <td><a href="{{route('home.post',$reply->comment->post_id)}}">View Post</a></td>
                  <td> 
                    @if($reply->is_active=='1')
                    {!! Form::open(['method' =>'PATCH','action' => ['CommentRepliesController@update',$reply->id]])!!}
                    @csrf
                    <input type="hidden" name="is_active" value="0">
                      <div class="form-group">
                          {!!Form::submit('UnApprove',['class'=>'btn btn-success'])!!}
                      </div>
                    {!! Form::close()!!}
                    @elseif($reply->is_active=='0')
                    {!! Form::open(['method' =>'PATCH','action' => ['CommentRepliesController@update',$reply->id]])!!}
                    @csrf
                    <input type="hidden" name="is_active" value="1">
                      <div class="form-group">
                          {!! Form::submit('Approve',['class'=>'btn btn-info'])!!}
                      </div>
                    {!! Form::close()!!}
                    @endif
                  </td>
                  <td>
                      {!! Form::open(['method' =>'DELETE','action' => ['CommentRepliesController@destroy',$reply->id]])!!}
                      @csrf
                        <div class="form-group">
                            {!!Form::submit('Delete Reply',['class'=>'btn btn-danger'])!!}
                        </div>
                      {!! Form::close()!!}
                  </td>
                </tr>
                  @endforeach
                @else
                <div>
                    No Posts Available.
                </div>
                @endif
              </tbody>
            </table>
            @else 
              <h1>No Replies</h1>
            @endif
            
            
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
