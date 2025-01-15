@include('admin.header')

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Sub Category</h3>
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
                    <div class="d-flex align-items-center">
                      <!-- <h4 class="card-title">Add Row</h4>   -->
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBannerModal"style="postion:relative;float:right;">
                        Add Sub Category
                    </button>
                    </div>
                  </div>
                  <div class="card-body"> 
                    <div class="table-responsive">
                      <table id="add-row" class="display table table-striped table-hover">
                       
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Sub Category</th>
                            <th>ID</th>
                            <th>image</th>  
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategory as $key=>$sub_category)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$sub_category->name}}</td>
                            <td>{{$sub_category->id}}</td>
                            <td><img src="{{$sub_category->image}}"height="90px"width="100px"></td>  
                            <td>{{$sub_category->status}}</td>
                            <td>
                              <div class="form-button-action">
                                 <a href=""class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                 <a href="{{ url('/sub_category/sub_category_delete/'.$sub_category->id )}}" class="btn btn-danger" onclick="return confirmDeleteWithSweetAlert('{{ url('/sub_category/sub_category_delete/'.$sub_category->id )}}');" style="margin-left:10px;">
                                      <i class="fa fa-trash"></i></a> 
                               </div>
                             </td>
                           </tr> 
                           
                           
                           <!-----------------------------------------ADD Sub CATEGORY SECTION---------------------------------------------------------->
<div class="modal fade" id="addBannerModal" tabindex="-1" aria-labelledby="addBannerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('sub_category.add') }}"enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addBannerModalLabel">Add Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Sub Category Image</label>
                        <input type="file" class="form-control" id="type" name="image" required>
                    </div>
                            
                            <div class="mb-3">
                        <label for="categoryID" class="form-label">Category ID</label>
                        <input type="text" class="form-control" id="categoryID" name="categoryID" required>
                    </div>
              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>  
            </form>
        </div>
    </div>
</div> 
<!----------------------------------------------END ADD Sub CATEGORY SECTION---------------------------------------------->
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
        
<!-------------------------------DELETE POPUP---------------------------->
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

<!----------------------------END SECTION-------------------------------------->
  
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
