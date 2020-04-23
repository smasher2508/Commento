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
          @if(Session::has('deleted_user'))
          <div style="color: #9F6000;
          background-color: #FEEFB3;
          height:40%; width:100%;
          text-align:left;">
             <p><i class="fa fa-info-circle"></i>&ensp;{{session('deleted_user')}}</p>
          </div>
             @endif
             @if(Session::has('updated_user'))
          <div style="color: #9F6000;
          background-color: #FEEFB3; 
          height:40%; width:100%;
          text-align:center;
          padding-top:5px; font-weight:bolder;">
             <p><i class="fa fa-info-circle"></i>&ensp;{{session('updated_user')}}</p>
          </div>
             @endif
            
            @if(count($comments)>0)
            <h1>All Comments</h1>
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
                @if($comments)
               
                  @foreach($comments as $comment)
                  <tr>

                  <td>{{$comment->id}}</td>
                  <td>{{$comment->author}}</a></td>
                  <td>{{$comment->email}}</td>
                  <td>{{str_limit($comment->body,11)}}</td>
                  <td>{{$comment->created_at->diffForHumans()}}</td>
                  <td>{{$comment->updated_at->diffForHumans()}}</td>
                  <td><a href="{{route('home.post1',$comment->post_id)}}">View Post</a></td>
                  <td><a href="{{route('replies.show',$comment->id)}}">View Replies</a></td>
                  <td> 
                    @if($comment->is_active=='1')
                    {!! Form::open(['method' =>'PATCH','action' => ['PostCommentsController@update',$comment->id]])!!}
                    @csrf
                    <input type="hidden" name="is_active" value="0">
                      <div class="form-group">
                          {!!Form::submit('UnApprove',['class'=>'btn btn-success'])!!}
                      </div>
                    {!! Form::close()!!}
                    @elseif($comment->is_active=='0')
                    {!! Form::open(['method' =>'PATCH','action' => ['PostCommentsController@update',$comment->id]])!!}
                    @csrf
                    <input type="hidden" name="is_active" value="1">
                      <div class="form-group">
                          {!! Form::submit('Approve',['class'=>'btn btn-info'])!!}
                      </div>
                    {!! Form::close()!!}
                    @endif
                  </td>
                  <td>
                      {!! Form::open(['method' =>'DELETE','action' => ['PostCommentsController@destroy',$comment->id]])!!}
                      @csrf
                        <div class="form-group">
                            {!!Form::submit('Delete Comment',['class'=>'btn btn-danger'])!!}
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
              <h1>No Comments</h1>
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
