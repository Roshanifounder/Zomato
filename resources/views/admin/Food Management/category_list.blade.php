@include('admin.header')
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Category</h3>
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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBannerModal"style="postion:relative;float:right;">
                        Add Category
                    </button>
                  </div>
                  <div class="card-body"> 
                    <div class="table-responsive">
                      <table id="add-row" class="display table table-striped table-hover">
                       
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Name</th> 
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($categorys as $key=>$categorydata)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{$categorydata->images}}"height="100px"width="150px"></td>
                            <td>{{$categorydata->name}}</td> 
                            <td>{{$categorydata->status}}</td>
                            <td>
                              <div class="form-button-action">
                                 <a href="#" class="btn btn-warning" data-bs-toggle="modal"data-bs-target="#editModal{{ $categorydata->id }}"> <i class="fas fa-edit"></i></a>
                                 <a href="{{ url('/category/category_delete/'.$categorydata->id )}}" class="btn btn-danger" onclick="return confirmDeleteWithSweetAlert('{{ url('/category/category_delete/'.$categorydata->id )}}');" style="margin-left:10px;">
                                      <i class="fa fa-trash"></i></a> 
                                </div>
                            </td>
                          </tr>  
                          
                          
                                  
<!-----------------------------------------ADD CATEGORY SECTION---------------------------------------------------------->
<div class="modal fade" id="addBannerModal" tabindex="-1" aria-labelledby="addBannerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('category.add') }}"enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addBannerModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">Category Image</label>
                        <input type="file" class="form-control" id="type" name="images" required>
                    </div>
                            
                            <div class="mb-3">
                        <label for="delivery_time" class="form-label">Delivery Time</label>
                        <input type="text" class="form-control" id="delivery_time" name="delivery_time" required>
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
<!----------------------------------------------END ADD CATEGORY SECTION---------------------------------------------->

<!---------------------------------------------UPDATE CATEGORY-------------------------------------------------------->
<div class="modal fade" id="editModal{{ $categorydata->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $categorydata->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel{{ $categorydata->id }}">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         
            <form action="{{ route('update.category', $categorydata->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
               @method('PUT') 
                <div class="modal-body">
                   <div class="form-group">
                      <label for="images{{ $categorydata->id }}">Images</label>
                              @if(isset($categorydata->images))
                                 <div class="mb-3">
                                     <img src="{{$categorydata->images }}" alt="Current Image" style="max-width: 100px;">
                                 </div>
                                @endif
                                 <input type="file" class="form-control" id="images{{ $categorydata->id }}" name="images" value="{{ $categorydata->images }}" required>
                          </div>
                                <div class="form-group">
                                     <label for="name{{ $categorydata->id }}">Name</label>
                                          <input type="text" class="form-control" id="name{{ $categorydata->id }}" name="name" value="{{ $categorydata->name}}" required>
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

<!--------------------------------------END UPDATE CATEGORY---------------------------------->
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
        
<!-----------------------------DELETE POPUP---------------------------->
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
<!-------------------------END SECTION-------------------------->

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
