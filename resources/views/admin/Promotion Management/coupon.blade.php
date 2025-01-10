@include('admin.header')

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Coupon List</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Tables</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Datatables</a>
                </li>
              </ul>
            </div>
            
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body"> 
                    <div class="table-responsive">
                      <table id="add-row" class="display table table-striped table-hover">
                       
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Type</th> 
                            <th>Total Uses</th> 
                            <th>Min Purchase</th>
                            <th>Max Purchase</th>
                            <th>Discount</th>
                            <th>Discount Type</th>
                            <th>Start Date</th>
                            <th>Expire Date</th>
                            <th>Customer Type</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$data)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->code}}</td>
                            <td>{{$data->type}}</td>
                            <td>{{$data->total_uses}}</td> 
                            <td>{{$data->min_purchase}}</td> 
                            <td>{{$data->max_discount}}</td> 
                            <td>{{$data->discount}}</td>
                            <td>{{$data->discount_type}}</td>
                            <td>{{$data->start_date}}</td>
                            <td>{{$data->expire_date}}
                            <td>{{$data->customer_type}}</td>
                            <td>{{$data->status}}</td>
                            <td>
                             <div class="form-button-action">
                             <!-- Edit Button -->
                              <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}">
                              <i class="fas fa-edit"></i>
                              </a>
                            <!-- Delete Button -->
                            <a href="{{ url('/coupon/delete_coupon/'.$data->id ) }}" class="btn btn-danger" onclick="return confirmDeleteWithSweetAlert('{{ url('/coupon/delete_coupon/'.$data->id ) }}');" style="margin-left:10px;">
                           <i class="fa fa-trash"></i>
                          </a>
                      </div>
                     </td>

                          </tr>  
  <!---------------------------------------------------------UPDATE COUPON SECTION------------------------------------------------------------------------------>
     <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editModalLabel{{ $data->id }}">
                    <strong>Update Coupon</strong>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Form -->
            <form action="{{ route('update.coupon', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                       
                        <div class="col-md-6">
                            <label for="code{{ $data->id }}" class="form-label">Code</label>
                            <input type="text" class="form-control" id="code{{ $data->id }}" name="code" value="{{ $data->code }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="start_date{{ $data->id }}" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date{{ $data->id }}" name="start_date" value="{{ $data->start_date }}" required>
                        </div>
                     
                        <div class="col-md-6">
                            <label for="expire_date{{ $data->id }}" class="form-label">Expire Date</label>
                            <input type="date" class="form-control" id="expire_date{{ $data->id }}" name="expire_date" value="{{ $data->expire_date }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="title{{ $data->id }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title{{ $data->id }}" name="title" value="{{ $data->title }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="max_discount{{ $data->id }}" class="form-label">Max Discount</label>
                            <input type="text" class="form-control" id="max_discount{{ $data->id }}" name="max_discount" value="{{ $data->max_discount }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="min_purchase{{ $data->id }}" class="form-label">Min Purchase</label>
                            <input type="text" class="form-control" id="min_purchase{{ $data->id }}" name="min_purchase" value="{{ $data->min_purchase }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="discount{{ $data->id }}" class="form-label">Discount</label>
                            <input type="text" class="form-control" id="discount{{ $data->id }}" name="discount" value="{{ $data->discount }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="discount_type{{ $data->id }}" class="form-label">Discount Type</label>
                            <select class="form-control" id="discount_type{{ $data->id }}" name="discount_type" required>
                                <option value="" disabled>---- Choose ----</option>
                                <option value="percentage" {{ $data->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                <option value="flat" {{ $data->discount_type == 'flat' ? 'selected' : '' }}>Flat</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div> 
 <!------------------------------------------------------END UPDATE SECTION------------------------------------------>
 
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        @include('admin.footer')
        
        
<!---------delete popup-------------->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script> 
    function confirmDeleteWithSweetAlert(deleteUrl) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
        return false;
    }
    
    
</script>
<!----------end----------------->

    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row")
        .DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>
  </body>
</html>
