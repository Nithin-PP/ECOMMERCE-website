@extends('admin.layouts.layout')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">category Table</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table class="table table-bordered">
                                <?php $count=1; ?>
                            <thead>
                                <tr>
                                    <th style="width: 10px">sl/no</th>
                                    <th>category</th>
                                    <th>product</th>
                                    <th>description</th>
                                    <th>price</th>
                                    <th>stock</th>
                                    <th>image</th>
                                    <th style="width: 300px">action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $pro)
                                <tr>
                                    <td>{{$count}}</td>
                                    <th>{{$pro->categoryData->category}}</th>
                                    <td>{{$pro->product}}</td>
                                    <td>{{$pro->description}}</td>
                                    <td>{{$pro->price}}</td>
                                    <td>{{$pro->stock}}</td>
                                    <td><img src="data:image/png/jpg/jpeg;base64, {{$pro->image}}" alt=""  width="60px" height="60px"/></td>
                                    <td><a href="product-edit/{{$pro->id}}" class="btn btn-primary">edit</a>
                                    <a href="product-delete/{{$pro->id}}" class="btn btn-danger">delete</a>
                                     <a href="stock-add/{{$pro->id}}" class="btn btn-dark">stock</a></td>
                                </tr>
                                <?php $count++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection