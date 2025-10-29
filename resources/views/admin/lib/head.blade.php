<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SamKev Stores</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">

<!-- Summernote -->
<link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">

<!-- Custom style -->
<style>
    .mailbox-subject {
        white-space: nowrap; /* Prevents text from wrapping to the next line */
        overflow: hidden; /* Hides any content that overflows */
        text-overflow: ellipsis; /* Displays "..." when the text overflows */
        max-width: 200px; /* Adjust width as needed */
    }
</style>
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
