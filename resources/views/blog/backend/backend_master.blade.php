<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/asset/bootstrap/css/bootstrap.css') }}">
    <script src="{{ asset('/asset/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/asset/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/asset/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/fontawesome/css/all.css') }}">
</head>

<body>
    <div class="m-0 p-0 row admin-page ">
        <div class="col-2  bg-dark">
            <div class="item-center page-logo m-3 mt-5">
                <a href="/admin" class="item-center">
                    <img class="rounded-circle object-fit-cover" src="{{ asset('/asset/image/v.png') }}" alt="">
                    <p class="m-0 p-0 fs-4 text-white mx-3">Laravel Blog</p>
                </a>
            </div>
            <div class="item-center menu-icon p-3 mt-5">
                <a href="/admin/category" class="item-center">
                    <img class="rounded-circle object-fit-cover" src="{{ asset('/asset/image/apps.png') }}"
                        alt="">
                    <p class="m-0 p-0 text-white mx-3">Category</p>
                </a>
            </div>
            <div class="item-center menu-icon p-3 mt-1">
                <img class="rounded-circle object-fit-cover" src="{{ asset('/asset/image/categories.png') }}"
                    alt="">
                <p class="m-0 p-0 text-white mx-3">Content</p>
            </div>
            <div class="item-center menu-icon p-3 mt-1">
                <img class="rounded-circle object-fit-cover" src="{{ asset('/asset/image/app_setup.png') }}"
                    alt="">
                <p class="m-0 p-0 text-white mx-3">App Setup</p>
            </div>
        </div>
        <div class="col-10 bg-white">
            @yield('admin-content')
        </div>
    </div>
</body>
@yield('script')
<script src="{{ asset('/asset/js/admin.js') }}"></script>

</html>
