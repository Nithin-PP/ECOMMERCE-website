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
                           <h3 class="card-title">product form</h3>
                       </div>
                       <!-- /.card-header -->
                       <!-- form start -->
                       <form method="post" action="{{url('product-insert')}}" enctype="multipart/form-data">@csrf
                           <div class="card-body">
                               <div class="form-group">
                                   <label for="exampleInputEmail1">category</label>
                                   <select class="form-control" name="category">
                                       <option value="">select</option>
                                       @foreach($category as $cat)
                                       <option value="{{$cat->id}}">{{$cat->category}}</option>
                                       @endforeach
                                   </select>
                               </div>
                               <div class="form-group">
                                   <label for="exampleInputEmail1">product</label>
                                   <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter product" name="product">
                               </div>
                               <div class="form-group">
                                   <label for="exampleInputPassword1">description</label>
                                   <input type="text" class="form-control" id="exampleInputPassword1" placeholder="description" name="description">
                               </div>
                               <div class="form-group">
                                   <label for="exampleInputPassword1">image</label>
                                   <input type="file" class="form-control" id="exampleInputPassword1" placeholder="image" name="file">
                               </div>
                               <div class="form-group">
                                   <label for="exampleInputPassword1">price</label>
                                   <input type="text" class="form-control" id="exampleInputPassword1" placeholder="price" name="price">
                               </div>
                               <div class="form-group">
                                   <label for="exampleInputPassword1">stock</label>
                                   <input type="text" class="form-control" id="exampleInputPassword1" placeholder="stock" name="stock">
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
