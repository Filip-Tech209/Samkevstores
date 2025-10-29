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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @include('admin.sections.statistics')
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
           
                <div class="card-header">
                  <h3 class="card-title">Store Manager</h3>
                </div>
                <div class="card-body">
                  <a href="{{'/view-product'}}" class="btn btn-app">
                    <span class="badge bg-success">{{$totalProducts}}</span>
                    <i class="fas fa-barcode"></i> Products
                  </a>
                  <a href="{{'/view-users'}}" class="btn btn-app">
                    <span class="badge bg-purple">{{$totalUsers}}</span>
                    <i class="fas fa-users"></i> Users
                  </a>
                  <a href="{{'/view-order'}}"class="btn btn-app">
                    <span class="badge bg-teal">{{$totalOrders}}</span>
                    <i class="fas fa-inbox"></i> Orders
                  </a>
                  <a href="{{'/view-inbox'}}"class="btn btn-app">
                    <span class="badge bg-info">{{$totalInbox}}</span>
                    <i class="fas fa-envelope"></i> Inbox
                  </a> 
                </div>
            </div> 
          </section>
          <!-- /.Left col -->

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            
          </section>
          <!-- right col -->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.sections.footer')

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- javascript -->
 @include('admin.lib.javascript')

  <!-- toaster script -->
  <style>
            
            .toast {
                display: flex;
                align-items: center;
                position: fixed;
                top: 70px;
                right: 20px;
                padding: 10px 20px;
                border-radius: 0px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                font-family: Arial, sans-serif;
                font-size: 14px;
                z-index: 1000;
                opacity: 0;
                transform: translateY(-20px);
                transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
            }

            #toast-success {
                background-color: #28a745; /* Green for success */
                color: white;
            }

            #toast-warning {
                background-color: #ffc107; /* yellow for success */
                color: white;
            }

            #toast-error {
                background-color: #dc3545; /* Red for error */
                color: white;
            }

            .toast-icon {
                margin-right: 10px;
                font-size: 18px;
            }

            .toast-message {
                flex: 1;
            }
        </style>
        <script>
                document.addEventListener('DOMContentLoaded', function () {
                const toastSuccess = document.getElementById('toast-success');
                const toastError = document.getElementById('toast-error');

                function showToast(toast) {
                    if (toast) {
                        toast.style.opacity = 1;
                        toast.style.transform = 'translateY(0)';
                        // Hide toast after 3 seconds
                        setTimeout(() => {
                            toast.style.opacity = 0;
                            toast.style.transform = 'translateY(-20px)';
                        }, 6000);
                    }
                }

                // Show toasts if present
                showToast(toastSuccess);
                showToast(toastError);
            });
        </script>
</body>
</html>
