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
                                    <th>description</th>
                                    <th style="width: 250px">action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $cat)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$cat->category}}</td>
                                    <td>{{$cat->description}}</td>
                                    <td><a href="category-edit/{{$cat->id}}" class="btn btn-primary">edit</a>
                                    <a href="category-delete/{{$cat->id}}" class="btn btn-danger">delete</a></td>
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
