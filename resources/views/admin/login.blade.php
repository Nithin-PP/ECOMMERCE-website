<html>
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet"/>

</head>
<body>
 <!-- Horizontal Form -->
            <div style="margin-left:500px; margin-top:150px;" class="card card-info col-md-5">
              <div class="card-header">
                <h3 class="card-title">Login Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form method="post" action="{{url('log_in')}}" enctype="multipart/form-data">@csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                      <span style="color:red;">@error('email'){{$message}}@enderror</span>
                    </div>
                  </div>
                  <br>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                      <span style="color:red;">@error('password'){{$message}}@enderror</span>
                    </div>
                  </div>
                  <br>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                  {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
</body>
</html>