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
            <h1> Create  Users</h1>
            {!! Form::open(['method' =>'POST','action' => 'AdminUsersController@store','files'=>true])!!}
  @csrf
    <div class="form-group">
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('email', 'E-Mail') !!}
      {!! Form::email('email', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id',array_merge([''=>'Choose Option'],$roles),'', ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', array('1'=>'Active','0'=>'Not Active'), 0, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
            {!! Form::label('photo_id', 'Title') !!}
            {!! Form::file('photo_id',['class' => 'form-control']) !!}
          </div>
    <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-success" type="submit">Create User</button>

  {!! Form::close() !!}
@include('/admin/partials/create_form')   
            
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
