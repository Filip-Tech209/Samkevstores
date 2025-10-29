<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAMKEV Stores</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('logos/samkev-logo-sm.jpeg') }}">

    <base href="/public">

    <link rel="shortcut icon" href="logos/samkev-logo-sm.jpeg" />
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

</head>