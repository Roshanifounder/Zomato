@include('admin.header')
@inlcude('admin.food Management.add_category')
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
                        <a href=""><button type="button" class="btn btn-primary mt-2 ml-5" data-bs-toggle="modal" data-bs-target="#exampleModal"style="position:relative;float:right;left:5px;">
            Add Category
            </button></a>
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
                            @foreach ($categorys as $category)
                          <tr>
                            <td>{{$category->key}}</td>
                            <td>{{$category->image}}</td>
                            <td>{{$category->name</td> 
                            <td></td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title=""class="btn btn-link btn-primary btn-lg"data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button"  data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger"data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
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
        </div>

        @include('admin.footer')
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
