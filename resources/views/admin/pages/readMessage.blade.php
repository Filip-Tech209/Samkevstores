<!DOCTYPE html>
<html lang="en">
@include('admin.lib.head')
<body>
   <div class="container-scroller"> 
     @include('admin.sections.topnavbar')
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sections.asideNavbar')
      <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{url('/inbox')}}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>
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
                                            <a href="#" class="nav-link">
                                            <i class="fas fa-inbox"></i> Inbox
                                            @php
                                                $unreadCount = \App\Models\Messages::where('is_read', false)->count();
                                            @endphp
                                            <span class="badge bg-primary float-right">{{$unreadCount}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                            <i class="far fa-envelope"></i> Sent
                                            </a>
                                        </li>   
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                                </div>
                              
                            </div>
                            <div class="col-md-9">
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
                                <div class="card card-primary card-outline">
                                        <div class="card-header">
                                        <h3 class="card-title">Read Message</h3>

                                        <div class="card-tools">
                                            <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                                            <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                                        </div>
                                        </div>
                                        <div class="card-body p-0">
                               
                                                <div class="mailbox-read-info">
                                                    <h5>{{$msg->subject}}</h5>
                                                    <h6>From: {{$msg->email}}
                                                    <span class="mailbox-read-time float-right">{{ $msg->created_at->format('d M Y, h:i A') }}</span></h6>
                                                </div>

                                                <div class="mailbox-read-message">
                                                    
                                                    <p>{{$msg->message}}</p>

                                                    <p>Thanks,<br>{{$msg->name}}</p>
                                                </div>
                                        
                                        </div>
                                        <div class="card-footer bg-white">

                                        </div>
                                        <div class="card-footer"> 
                                            <a href="{{ url('/deletemessage', $msg->id) }}">
                                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                            </a> 
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
  <!-- plugins:js -->
  @include('admin.lib.javascript')
  <!-- toaster script -->

</body>


</html>

