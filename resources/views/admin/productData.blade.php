<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
</head>
<body>
    
<div class="container mt-5">
    {{-- <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2> --}}
    <table class="table table-bordered yajra-datatable" id="mytable">
        <thead>
            <tr>
                <th>sl/no</th>
                <th>category</th>
                <th>product</th>
                <th>stock</th>
                 <th>image</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing:true,
        serverSide: true,
        ajax: "{{ route('productlist') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'category_data.category', name: 'category_data.category'},
            {data: 'product', name: 'product'},
            {data: 'product_data.available_stock', name: 'product_data.available_stock'},
            {data: 'image', name: 'image'},         
            {data: 'action', name: 'action', orderable: true, searchable: true},
             
        ]
    });
    
  });
</script>
 <script>
        $(document).ready(function() {
       
            $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
            $('#mytable thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="" />' );

                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                            this.focus();   
                    }
                });
                });

            var table = $('#mytable').DataTable( {
                orderCellsTop: true,
                fixedHeader: true,
                searchable:true
            });

          
        });
    </script>
</html>