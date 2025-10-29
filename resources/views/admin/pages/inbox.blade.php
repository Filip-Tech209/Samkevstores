<!DOCTYPE html>
<html lang="en">
@include('admin.lib.head')
<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
     @include('admin.sections.topnavbar')
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sections.asidenavbar')
      <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-3">
                    <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a>

                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Folders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                <a href="{{url('inbox')}}" class="nav-link">
                                    <i class="fas fa-inbox"></i> Inbox
                                    @php
                                        $unreadCount = \App\Models\Messages::where('is_read', false)->count();
                                    @endphp
                                    <span class="badge bg-primary float-right">{{$unreadCount}}</span>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link" disabled="true">
                                    <i class="far fa-envelope"></i> Sent
                                </a>
                                
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                   
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                            <h3 class="card-title">Inbox</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="mailbox-controls">
                                    <!-- Check all button -->
                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                        <a href="#" type="button" class="btn btn-default btn-sm">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-share"></i>
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-sync-alt"></i>
                                    </button>
                                
                                </div>
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
                            
                            <div class="table-responsive mailbox-messages">

                                <table class="table table-hover table-striped">
                                @foreach($msg as $message)
                                    <tbody>
                                        <tr>
                                            <td class="mailbox-name"><a href="{{url('/read-message',$message->id)}}">{{ $message->name }}</a></td>
                                            <td class="mailbox-subject"><b>{{ $message->subject }}</b> - {{ $message->message }} </td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date">{{ $message->created_at->format('d M Y, h:i A') }}</td>
                                            @if(!$message->is_read)
                                                <td class="mailbox-star"><a href="{{ route('messages.markAsRead', $message->id) }}"><i class="fas  text-success">Mark as read</i></a></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @endforeach
                                </table>
                            </div>
                            <!-- /.mail-box-messages -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer p-0">
                                <div class="mailbox-controls">
                                                         
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>
    </div>
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  @include('admin.lib.javascript')
  <!-- toaster script -->
 <style>
    
    .toast {
        display: flex;
        align-products: center;
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

