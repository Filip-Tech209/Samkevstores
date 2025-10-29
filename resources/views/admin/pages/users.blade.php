<!DOCTYPE html>
<html lang="en">
@include('admin.lib.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  @include('admin.sections.preloader')

  <!-- Navbar -->
  @include('admin.sections.topnavbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.sections.asidenavbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.sections.contenthead') 
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-12">
            <h5>Users</h5>
            @if(session('success'))
                <div id="toast-success" class="toast" data-message="{{ session('success') }}">
                    <div class="toast-icon">&#10003;</div> <!-- Checkmark icon -->
                    <div class="toast-message">{{ session('success') }}</div>
                </div>
            @endif

            @if(session('error'))
                <div id="toast-error" class="toast" data-message="{{ session('error') }}">
                    <div class="toast-icon">&#9888;</div> <!-- Warning icon -->
                    <div class="toast-message">{{ session('error') }}</div>
                </div>
            @endif
          
                <div class="card">  
                    <div class="card-body">    
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr style="font-size:14px">
                                    <th>Image</th>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
                                    <th>Contact Number</th>
                                    <th>Privilage (1 = Admin , 0 = regular)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:12px">
                                @foreach($users as $user)
                                    @if($user)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('/productsimage/' . $user->image) }}" alt="Image" style="width: 20px; height: 20px;">
                                            </td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->firstname }}</td>
                                            <td>{{ $user->lastname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->usertype }}</td>
                                            <td style="display: flex; justify-content: space-evenly; align-items: center; gap: 5px;">
                                                <span class="badge bg-primary">
                                                    <a href="#" data-toggle="modal" data-target="#modal-edit-{{ $user->id }}">
                                                        <i class="nav-icon fas fa-pen"></i>
                                                    </a>
                                                </span>
                                                @if($user->usertype == '0')
                                                    <span class="badge bg-danger">
                                                        <a href="#" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </a>
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning">
                                                        <a href="#" data-toggle="modal" data-target="#modal-no-delete-{{ $user->id }}">
                                                            <i class="nav-icon fas fa-ban"></i>
                                                        </a>
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                            <style>
                                                .custom-description {
                                                    max-height: 10px; /* Adjust to the height you need */
                                                    overflow-y: auto; /* Enables vertical scrolling if content exceeds max height */
                                                    white-space: pre-wrap; /* Preserves whitespace and allows wrapping */
                                                    text-overflow: ellipsis; /* Adds "..." for truncated content (optional) */
                                                }
                                            </style>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper d-flex justify-content-center mt-4">
                            {{ $users->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  
  @include('admin.sections.footer')

      
      <!-- Edit modal -->
    @foreach($users as $user)
            <div class="modal fade" id="modal-edit-{{ $user->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User Privilage </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-md-12">
                                        <div class="card-body">
                                            <form action="{{url('/edit-user',$user->id)}}" method=Post enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Set User Privilage ( 1 = Admin , 0 = Regular) </label>
                                                        
                                                            <select id="main-category" name="usertype" class="form-control form-control-sm">
                                                                <option value="1" {{ $user->usertype == '1' ? 'selected' : '' }}>
                                                                    1
                                                                </option>
                                                                <option value="0" {{ $user->usertype == '0' ? 'selected' : '' }}>
                                                                    0
                                                                </option>
                                                            </select>
                                                        
                                                        </div>
                                                    </div>
 
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>      
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>   
                </div>
            </div>
        @endforeach

    @foreach($users as $user)
    
      <!-- delete modal -->
      <div class="modal fade" id="modal-delete-{{ $user->id }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete <b>{{$user->firstname}}</b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <form action="{{url('/delete', $user->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
      </div>

      <!-- no delete modal -->
      <div class="modal fade" id="modal-no-delete-{{ $user->id }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>You are not Allowed To Delete <b>{{$user->firstname}}</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
      </div>
    @endforeach

</div>
<!-- ./wrapper -->

<!-- javascript -->
 @include('admin.lib.javascript')

    

<!-- DataTables  & admin/plugins -->
<script src="../../admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../admin/plugins/jszip/jszip.min.js"></script>
<script src="../../admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
   $(function () {
       // Initialize DataTable without pagination, searching, or other features
       const table = $("#example1").DataTable({
           responsive: true,
           paging: false, // Disable pagination
           searching: false, // Disable search
           info: false, // Disable table info (e.g., "Showing 1 to 10 of 50 entries")
           lengthChange: false, // Disable the ability to change entries per page
           autoWidth: true, // Keep automatic column width adjustment
       });

       // Create and append the custom "Add New" button
       const addNewButton = $('<button>')
           .addClass('btn btn-outline-secondary ml-2') // Add Bootstrap classes
           .attr('type', 'button')
           .attr('data-toggle', 'modal') // For modal
           .attr('data-target', '#modal-add') // Modal ID
        //    .text('Add New'); // Button text

       // Append the custom button to the same container as DataTable buttons
       $('#example1_wrapper .col-md-6:eq(0)').append(addNewButton);
   });
</script>





<!-- for hadling image -->
<script>
    // for populating the subcategory
    document.getElementById('main-category').addEventListener('change', function() {
        var mainCategory = this.value;
        var subCategorySelect = document.getElementById('subcategory');

        // Clear existing subcategory options
        subCategorySelect.innerHTML = '';

        // Define subcategories for each main category
        var subCategories = {
            'Tools and Equipments': ['Hand Tools', 'Power Tools'],
            'Building and Construction Materials': ['Paints & Accessories', 'Electrical & Lighting', 'Plumbing', 'Construction chemicals','Tiles'],
            'Pool products': ['Chemicals', 'Equipment & Accessories', 'Mosaic Tiles']
        };

        // Check if subcategories exist for the selected main category
        if (subCategories[mainCategory]) {
            // Add a "Please select" option at the beginning
            var defaultOption = document.createElement('option');
            defaultOption.textContent = 'Please select a subcategory';
            defaultOption.disabled = true;
            defaultOption.selected = true;
            subCategorySelect.appendChild(defaultOption);

            // Populate subcategories for the selected main category
            subCategories[mainCategory].forEach(function(subCategory) {
                var option = document.createElement('option');
                option.value = subCategory;
                option.textContent = subCategory;
                subCategorySelect.appendChild(option);
            });
        } else {
            // Add a default option when no main category or subcategories are selected
            var noOption = document.createElement('option');
            noOption.textContent = 'No subcategories available';
            noOption.disabled = true;
            noOption.selected = true;
            subCategorySelect.appendChild(noOption);
        }
    });
</script>

</body>



</html>
