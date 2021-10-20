<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.foundation.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">


@extends('layouts.master')


@section('title')
    Products
@endsection

@section('headername')
    Products 
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ url('product_form',['id'=> '0'])}}" class="btn btn-primary" style="float: right">+ Add Products</a>

        <h4 class="card-title">Products</h4>
      </div>
      
      <div class="card-body">
         
        <div class="table-responsive">
          <div class="container-fluid">
            <table id="product_table" class="display" style="width:100%">
              <thead >
              <th>Product Name </th>
              <th>Brand Name </th>
              <th>Category Name </th>
              <th>Hashtag </th>
              <th>Purchase Price </th>
              <th>Sale Price </th>
              <th>Discount Price </th>
              <th>Shipping Cost </th>
              <th>Action</th>
            </thead>
            <tbody>
            @foreach ($data as $data)
                
              <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->brand_name }}</td>
                <td>{{ $data->sub_name }}</td>
                <td>{{ $data->hashtag }}</td>
                <td>{{ $data->purchase_price }}</td>
                <td>{{ $data->sale_price }}</td>
                <td>{{ $data->discount_price }}</td>
                <td>{{ $data->shipping_cost }}</td>
                <td><a href="{{ url('product_form',['id'=> $data->id])}}" style="color: rgb(8, 155, 74)"><i class="fa fa-edit"></i></a> | <a href="{{ url('product_delete',['id'=> $data->id]) }}" style="color: red;" class="delete_btn" data-delete = "{{ $data->id }}"><i class="fa fa-trash"></i></a>
              </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>


@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
     var table = $('#product_table').DataTable( {
        //dom: 'Bfrtip',
        dom: 'lBfrtip',
        responsive: true,
        pageLength: 10,
        lengthChange: true,
        ordering:false,
        
        buttons: [
            'excelHtml5',
            'csvHtml5',
            
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .small-6.columns:eq(0)' );
        


        $('#mytable').on('click', '.delete_btn', function () {
          var delete_id = $(this).attr("id");
          var th=$(this);
          console.log(delete_id);
          var url = "{{url('product_delete')}}/"+delete_id;
          Swal.fire({
							  title: 'Are you sure?',
							  text: "You won't be able to revert this!",
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Yes, delete it!'
							}).then(function(result){
                if (result.isConfirmed)  
                  {
                      $.ajax({
                      
                        url : url,
                        type : 'PUT',
                        cache: false,
                        data: {_token:'{{ csrf_token() }}'},
                        success:function(data){
                         if (data == 1) {
                          Swal.fire({
                                title:'Deleted!',
                                text:'Your file and data has been deleted.',
                                type: 'success',
                              })
                              th.parents('tr').hide();

                            }
                          else{
                                Swal.fire({
                                    title: 'Oopps!',
                                    text: "something went wrong!",
                                    type: 'warning',
                          			})
                          		}
                         }
                        
                        });
                }
              });
               
        });
       
               
        });
    </script>
@endsection