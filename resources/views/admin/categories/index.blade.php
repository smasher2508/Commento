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
            @if(Session::has('deleted_category'))
          <div style="color: #9F6000;
          background-color: #FEEFB3;
          height:40%; width:100%;
          text-align:left;">
             <p><i class="fa fa-info-circle"></i>&ensp;{{session('deleted_category')}}</p>
          </div>
             @endif
             @if(Session::has('cat_updated'))
          <div style="color: #9F6000;
          background-color: #FEEFB3; 
          height:40%; width:100%;
          text-align:center;
          padding-top:5px; font-weight:bolder;">
             <p><i class="fa fa-info-circle"></i>&ensp;{{session('cat_updated')}}</p>
          </div>
             @endif
            <h1>Categories</h1>
            <br>
            <div class="container">
              <div class="row">
                <div class="col-6">
                    {!! Form::open(['method' =>'POST','action' => 'AdminCategoriesController@store'])!!}
                    @csrf
                      <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                      </div>
                  
                      <button class="btn btn-success" type="submit">Create Category</button>
                  
                    {!! Form::close() !!}
                    @include('/admin/partials/create_form')
                </div>
                <div class="col-6">
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                </tr>
              </thead>
              <tbody>
                @if($categories)
               
                  @foreach($categories as $category)
                  <tr>
                  <td>{{$category->id}}</td>
                  <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                  <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                  <td>{{$category->updated_at ? $category->updated_at->diffForHumans(): 'no date'}}</td>
                </tr>
                  @endforeach
                @else
                <div>
                    No Categories Available.
                </div>
                @endif
              </tbody>
            </table>
                </div>
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
