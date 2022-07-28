   @extends('admin.layouts.layout')
   @section('content')

   <!-- Main content -->
   <section class="content">
       <div class="container-well">
           <div class="row">
               <!-- left column -->
               <div class="col-md-7">
                   <!-- general form elements -->
                   <div class="card card-primary">
                       <div class="card-header">
                           <h3 class="card-title">stock form</h3>
                       </div>
                       <!-- /.card-header -->
                       <!-- form start -->
                       <form method="post" action="{{route('stock-insert')}}" enctype="multipart/form-data">@csrf
                       @foreach($value as $val)          
                          <input type="hidden" class="form-control"  name="id" value={{$val->id}}>
                        @endforeach
                           <div class="card-body">
                               <div class="form-group">
                                   <label for="exampleInputEmail1">stock</label>
                                   <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter stock" name="stock">
                               </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer">
                               <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
       </div>
   </section>
   <!-- /.card -->
   @endsection