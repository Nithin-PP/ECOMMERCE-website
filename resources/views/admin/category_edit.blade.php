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
                           <h3 class="card-title">Quick Example</h3>
                       </div>
                       <!-- /.card-header -->
                       <!-- form start -->
                       <form method="post" action="{{url('category-update')}}" enctype="multipart/form-data">@csrf
                           <div class="card-body">
                           <input type="hidden" name="id" value={{$edit->id}}>
                               <div class="form-group">
                                   <label for="exampleInputEmail1">category</label>
                                   <input type="text" value="{{$edit->category}}" class="form-control" id="exampleInputEmail1" placeholder="Enter category" name="category">
                               </div>
                               <div class="form-group">
                                   <label for="exampleInputPassword1">description</label>
                                   <input type="text" value="{{$edit->description}}" class="form-control" id="exampleInputPassword1" placeholder="description" name="description">
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