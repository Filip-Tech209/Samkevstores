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
            <h5>Products</h5>
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
                     
    
                    <!-- /.card-header -->
                    <div class="card-body">    
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr style="font-size:14px">
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Sub</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                    <th>Shipping</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:12px">
                                @foreach($product as $pro)
                                    @if($pro)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('/productsimage/' . $pro->image) }}" alt="Image" style="width: 20px; height: 20px;">
                                            </td>
                                            <td>{{ $pro->name }}</td>
                                            <td>{{ $pro->category }}</td>
                                            <td>{{ $pro->subcategory }}</td>
                                            <td>{{ $pro->price }}</td>
                                            <td>{{ $pro->description }}</td>
                                            <td class="custom-description">{{ $pro->details }}</td>
                                            <td>{{ $pro->status }}</td>
                                            <td>{{ $pro->quantity }}</td>
                                            <td>{{ $pro->shippingdetails }}</td>
                                            <td style="display: flex; justify-content: space-evenly; align-items: center; gap: 5px;">
                                                <span class="badge bg-primary">
                                                    <a href="#" data-toggle="modal" data-target="#modal-edit-{{ $pro->id }}">
                                                        <i class="nav-icon fas fa-pen"></i>
                                                    </a>
                                                </span>
                                                <span class="badge bg-danger">
                                                    <a href="#" data-toggle="modal" data-target="#modal-delete-{{ $pro->id }}">
                                                        <i class="nav-icon fas fa-trash"></i>
                                                    </a>
                                                </span>
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
                            {{ $product->links('pagination::bootstrap-4') }}
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

      <!-- Add modal -->
      <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{url('/store-product')}}" method=Post enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select id="main-category" name="category" class="form-control">
                                                        <option value="Building and Construction Materials">Building & Construction Materials</option>
                                                        <option value="Pool products">Pool Products</option>
                                                        <option value="Tools and Equipments">Tools & Equipments</option>
                                                    </select>
                                                </div>
                                            </div>  
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Sub Category</label>
                                                    <select id="subcategory" name="subcategory" class="form-control">
                                                        
                                                    </select>
                                                </div>
                                            </div>  
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name ="name" class="form-control" placeholder="Enter Product Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="number" name="price" class="form-control" placeholder="Enter Product Price">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" name="description" rows="1" placeholder="Brief Description"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Details</label>
                                                    <textarea class="form-control" name="details" rows="1" placeholder="Enter More Details"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="available">Available</option>
                                                        <option value="not available">Out of Stock</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="text" name="quantity" class="form-control" placeholder="Enter Product Quantity">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Shipping Details</label>
                                                    <input type="text" name="shippingdetails" class="form-control" placeholder="Enter Shipping details">
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <label>product Image</label>
                                                <div class="custom-file">
                                                    <div class="image-upload-container">
                                                        <div style="margin-bottom:20px; width:80px; height:80px; overflow:hidden;" class="image-preview-box">
                                                                <img id="imagePreview" src="https://via.placeholder.com/150" alt="Image Preview" style="width: 100%; height: 100%; object-fit: cover;" />
                                                        </div>
                                                        <input type="file" class="custom-file-input" name="image" accept="image/*" onchange="previewImage(event)" />
                                                    </div>
                                                </div>
                                                <style>
                                                    .custom-file-input {
                                                        opacity: 1 !important; /* Ensure the text is visible */
                                                        z-index: 2;
                                                        position: relative;
                                                    }
                                                    .custom-file-label {
                                                        display: inline-block;
                                                        margin-left: 5px;
                                                        color: black;
                                                        background: transparent;
                                                    }
                                                </style>
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

      <!-- Edit modal -->
    @foreach($product as $pro)
            <div class="modal fade" id="modal-edit-{{ $pro->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Product </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-md-12">
                                        <div class="card-body">
                                            <form action="{{url('/edit-product',$pro->id)}}" method=Post enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                        
                                                            <select id="main-category" name="category" class="form-control ">
                                                                <option value="Tools and Equipments" {{ $pro->category == 'Tools and Equipments' ? 'selected' : '' }}>
                                                                    Tools & Equipments
                                                                </option>
                                                                <option value="Building and Construction Materials" {{ $pro->category == 'Building and Construction Materials' ? 'selected' : '' }}>
                                                                    Building & Construction Materials
                                                                </option>
                                                                <option value="Pool products" {{ $pro->category == 'Pool products' ? 'selected' : '' }}>
                                                                    Pool Products
                                                                </option>
                                                            </select>
                                                        
                                                        </div>
                                                    </div>  
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Sub Category</label>
                                                        
                                                            <select id="subcategory" name="subcategory" class="form-control ">
                                                                @if($pro->category == 'Tools and Equipments')
                                                                    <option value="Hand Tools" {{ $pro->subcategory == 'Hand Tools' ? 'selected' : '' }}>Hand Tools</option>
                                                                    <option value="Power Tools" {{ $pro->subcategory == 'Power Tools' ? 'selected' : '' }}>Power Tools</option>
                                                                @elseif($pro->category == 'Building and Construction Materials')
                                                                    <option value="Paint & Accessories" {{ $pro->subcategory == 'Paint & Accessories' ? 'selected' : '' }}>Paint & Accessories</option>
                                                                    <option value="Electrical & Lighting" {{ $pro->subcategory == 'Electrical & Lighting' ? 'selected' : '' }}>Electrical & Lighting</option>
                                                                    <option value="Plumbing" {{ $pro->subcategory == 'Plumbing' ? 'selected' : '' }}>Plumbing</option>
                                                                    <option value="Construction Chemicals" {{ $pro->subcategory == 'Construction Chemicals' ? 'selected' : '' }}>Construction Chemicals</option>
                                                                @elseif($pro->category == 'Pool products')
                                                                    <option value="Pool Chemicals" {{ $pro->subcategory == 'Pool Chemicals' ? 'selected' : '' }}>Pool Chemicals</option>
                                                                    <option value="Equipments & Accessories" {{ $pro->subcategory == 'Equipments & Accessories' ? 'selected' : '' }}>Equipments & Accessories</option>
                                                                    <option value="Tiles" {{ $pro->subcategory == 'Tiles' ? 'selected' : '' }}>Tiles</option>
                                                                @endif 
                                                            </select>
                                                        
                                                        </div>
                                                    </div>  
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" name ="name" value="{{$pro->name}}" class="form-control" placeholder="Enter Product Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Price</label>
                                                            <input type="text" name="price" value="{{$pro->price}}" class="form-control" placeholder="Enter Product Price">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea class="form-control" name="description"  rows="1" placeholder="Brief Description">{{$pro->description}}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Details</label> 
                                                            <textarea class="form-control" name="details" rows="3"  placeholder="Enter More Details">{{$pro->details}}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                        
                                                            <select id="main-category" name="status" class="form-control form-control-sm">
                                                                <option value="Available" {{ $pro->status == 'Avaialable' ? 'selected' : '' }}>
                                                                    Available
                                                                </option>
                                                                <option value="not available" {{ $pro->status == 'Out of Stock' ? 'selected' : '' }}>
                                                                    Out of Stock
                                                                </option>
                                                            </select>
                                                        
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="text" name="quantity" value="{{$pro->quantity}}"class="form-control" placeholder="Enter Product Quantity">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Shipping Details</label>
                                                            <input type="text" name="shippingdetails" value="{{$pro->shippingdetails}}" class="form-control" placeholder="Enter Shipping details">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-4">
                                                        <label>Product Image</label>
                                                        <div class="custom-file">
                                                            <div class="image-upload-container">
                                                                <div style="margin-bottom:20px; width:80px; height:80px; overflow:hidden;" class="image-preview-box">
                                                                    @if($pro->image)
                                                                        <img id="imagePreview" src="{{ asset('productsimage/' . $pro->image) }}" alt="Image Preview" style="width: 100%; height: 100%; object-fit: cover;" />
                                                                    @else
                                                                        <img id="imagePreview" src="https://via.placeholder.com/150" alt="Image Preview" style="width: 100%; height: 100%; object-fit: cover;" />
                                                                    @endif
                                                                </div>
                                                                <input type="file" class="custom-file-input" name="image" accept="image/*" onchange="previewImage(event)" />
                                                            </div>
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

    @foreach($product as $pro)
    
      <!-- delete modal -->
      <div class="modal fade" id="modal-delete-{{ $pro->id }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete <b>{{$pro->name}}</b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <form action="{{url('/delete', $pro->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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
           .text('Add New'); // Button text

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
