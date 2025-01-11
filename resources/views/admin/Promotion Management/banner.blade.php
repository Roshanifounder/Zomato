@include('admin.header')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Banner</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home"> <a href="#"><i class="icon-home"></i></a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"> <a href="#">Tables</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Datatables</a></li>
            </ul>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBannerModal">
                        Add Banner
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Images</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{$data->images}}"height="90px"width="200px"></td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <!--<a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a>-->
                                          <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}">
                                          <i class="fas fa-edit"></i>
                                           </a>
                                        <a href="{{ url('/banner/banner_delete/'.$data->id )}}" class="btn btn-danger" onclick="return confirmDeleteWithSweetAlert('{{ url('/banner/banner_delete/'.$data->id )}}');" style="margin-left:10px;">
                                      <i class="fa fa-trash"></i>
                                            </a>
                                    </td>
                                </tr>
                                
                                
<!-- --------------------------------------ADD BENNER SECTION------------------------------------------------- -->
<div class="modal fade" id="addBannerModal" tabindex="-1" aria-labelledby="addBannerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('banner.store') }}"enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addBannerModalLabel">Add Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="type" class="form-label">image</label>
                        <input type="file" class="form-control" id="images" name="images" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>  
            </form>
        </div>
    </div>
</div>
<!------------------------------------------------END BENNER SECTION----------------------------------------------->


<!------------------------------------------------UPDATE BANNER SECTION-------------------------------------------->

  <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         
            <form action="{{ route('update.banner', $data->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
               @method('PUT') 
                <div class="modal-body">
                   <div class="form-group">
                      <label for="images{{ $data->id }}">Images</label>
                              @if(isset($data->images))
                                 <div class="mb-3">
                                     <img src="{{$data->images }}" alt="Current Image" style="max-width: 100px;">
                                 </div>
                                @endif
                                 <input type="file" class="form-control" id="images{{ $data->id }}" name="images" value="{{ $data->images }}" required>
                          </div>
                                <div class="form-group">
                                     <label for="title{{ $data->id }}">Title</label>
                                            <input type="text" class="form-control" id="title{{ $data->id }}" name="title" value="{{ $data->title }}" required>
                                </div>
                                     <div class="form-group">
                                          <label for="type{{ $data->id }}">Type</label>
                                            <input type="text" class="form-control" id="type{{ $data->id }}" name="type" value="{{ $data->type }}" required>
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

<!------------------------------------------------END BANNER SECTION----------------------------------------------->


                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

<script>
    $(document).ready(function () {
        $("#add-row").DataTable({ pageLength: 5 });
    });
</script>


<!----------delete popup------------->
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
