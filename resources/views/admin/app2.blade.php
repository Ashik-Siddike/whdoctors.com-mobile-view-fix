<!DOCTYPE html>
<html lang="en">
<head>
<title>WH Doctors || @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta data -->
    <meta name="author" content="WH Doctors" />
    <meta name="description" content="@yield('seo_description')"/>
    <meta name="Resource-type" content="@yield('seo_resource_type')" />
    <meta name="keywords" content="@yield('seo_keywords')">
    <link rel="image_src" href="@yield('seo_image')"/>

	<meta name="keywords" content="WH doctors">
	<meta name="author" content="WH doctors">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="WH doctors">
	<meta property="og:title" content="WH doctors">
	<meta property="og:description" content="WH doctors">
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>@yield('title')</title>

    @include('admin.includes.favicon')


    {{-- Datatable css  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">


    {{-- bootstrap Css  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    {{-- fontawasome icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- feather icon --}}
    <!-- choose one -->
    {{-- <script src="https://unpkg.com/feather-icons"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- @include('admin.includes.styles') --}}
    @stack('custom-style')
     <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
         <link rel='stylesheet' href="css/ie/ie8.css">
     <![endif]-->
     <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        body{
            position: relative;
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
            background-color: #f0f1f7;
        }

        .sidebar{
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 60px;
            background-color: #fff;
            padding: 2px 0;
            border-right: 1px solid rgb(0 0 0 / 7%);
            transition: all 0.5s ease;
        }
        .sidebar.active{
            width: 240px;
            transition: all 0.5s ease;
        }
        .sidebar .logo_content {
            border-bottom: 1px solid rgb(0 0 0 / 7%);
        }
        .sidebar .logo_content .logo{
            color: #536485;
            display: flex;
            height: 50px;
            width: 100%;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            white-space: nowrap;
            opacity: 0;
            /* pointer-events: none; */
        }
        .sidebar.active .logo_content .logo{
            opacity: 1;
            /* pointer-events: none; */
            padding: 2px 10px;
        }
        .logo_content.logo i{
            font-size: 28px;
            margin-right: 5px;
        }
        .logo_content .logo .logo_name{
            font-size: 20px;
            font-weight: 400;
            margin-left: 5px;
            white-space: nowrap;
            text-decoration: none;
        }
        #btn {
            position: absolute;
            color: #536485;
            cursor: pointer;
            top: 0;
            left: 0;
            font-size: 20px;
            height: 50px;
            width: 50px;
            text-align: center;
            line-height: 50px;
        }
        /* #btn{
            left: 90%;
        } */
        .sidebar>ul{
            margin-top: 10px;
            margin-left: 3px;
            height: calc(100% - 110px);
            overflow-y: auto;
        }
        .sidebar>ul>li{
            position: relative;
            width: 100%;
            margin-top: 8px;
            overflow-x: hidden;
            overflow-y: clip;
            list-style: none;
        }
        .scrollbar::-webkit-scrollbar-track{
            -webkit-box-shadow: inset 0 0 6px rgb(240 241 247);
            background-color: #F5F5F5;
        }

        .scrollbar::-webkit-scrollbar{
            width: 3px;
            background-color: #F5F5F5;
        }

        .scrollbar::-webkit-scrollbar-thumb{
            background-color: rgb(216 220 241);
            border-radius: 5px;
        }

        .sidebar ul li .tooltip{
            position: absolute;
            left: 122px;
            top: 0;
            transform: translate(-50%,-50%);
            border-radius: 6px;
            height: 35px;
            width: 122px;
            background: #fff;
            line-height: 35px;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            transition: 0s ;
            opacity: 0;
            pointer-events: none;
            display: block;
        }
        .sidebar.active ul li .tooltip{
            display: none;
        }
        .sidebar ul li:hover .tooltip{
            transition: all 0.5s ease;
            opacity: 1;
            top: 50%;
        }
        .sidebar ul li input{
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            border-radius: 12px;
            outline: none;
            border: none;
            background: #1d1b31;
            padding-left: 50px;
            font-size: 18px;
            color: #fff;
        }

        .sidebar>ul>li>a{
            color: #536485;
            font-weight: 500;
            position: relative;
            font-size: 15px;
            padding: 12px 2px;
            height: 50px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.4s ease;
            border-radius: 5px;
            white-space: nowrap;
        }
        .sidebar>ul>li>a:hover{
            background-color: rgb(0 0 0 / 5%);
            color: #11101d;
        }
        .sidebar>ul>li i{
            min-width: 49px;
            border-radius: 12px;
            font-size: 20px;
            text-align: center;
            transition: all 0.4s ease;
        }
        .sidebar.active>ul>li i{
            font-size: 16px;
            transition: all 0.4s ease;
        }
        .sidebar.active>ul>li>a{
            height: 40px;
            transition: all 0.4s ease;
        }

        .sidebar .link_names{
            opacity: 0;
            pointer-events: none;
        }
        .sidebar.active .link_names{
            opacity: 1;
            pointer-events: auto;
        }

        .sidebar .profile_content{
            position: absolute;
            color: #fff;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .sidebar .profile_content .profile {
            position: relative;
            padding: 6px 6px;
            height: 50px;
            background: rgb(199 205 239);
            color: #000;
        }
        .profile_content .profile .profile_details{
            display: flex;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            white-space: nowrap;
        }
        .sidebar.active .profile .profile_details{
            opacity: 1;
            pointer-events: auto;
        }
        .profile .profile_details img{
            height: 40px;
            width: 40px;
            object-fit: cover;
            border-radius: 12px;
        }
        .profile .profile_details .name_job{
            margin-left: 10px;
        }
        .profile .profile_details .name{
            font-size: 15px;
            font-weight: 400;
        }
        .profile .profile_details .job{
            font-size: 12px;
        }
        .profile #log_out {
            position: absolute;
            left: 50%;
            bottom: 5px;
            transform: translateX(-50%);
            min-width: 40px;
            line-height: 37px;
            font-size: 20px;
            border-radius: 12px;
            text-align: center;
        }
        .profile #log_out:hover{
            background: #fff;
            color: #11101d;
        }
        .sidebar.active .profile #log_out {
            left: 88%;
        }

        .content{
            position: absolute;
            left: 60px;
            width: calc(100% - 60px);
            transition: all 0.5s ease;
        }
        .sidebar.active ~ .content{
            left: 240px;
            width: calc(100% - 240px);
            transition: all 0.5s ease;
        }

        .content .text{
            font-size: 25px;
            font-weight: 500;
            color: #1d1b31;
            margin: 12px;
        }










        .sidebar-navigation ul li {
            display: block;
        }

        .sidebar-navigation ul li .drop-list {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .sidebar-navigation ul li ul {
            display: none;
        }
        .sidebar-navigation ul li ul li {
            font-weight: 400;
        }
        .sidebar-navigation ul li ul.open {
            display: block;
        }
        .sidebar-navigation ul li ul li a {
            border-color: rgba(255, 255, 255, 0.1);
            font-weight: 400;
            text-decoration: none;
            font-size: 14px;
            color: #666;
            padding: 8px 25px;
            border-radius: 5px;
            line-height: 2;
        }
        .sidebar-navigation ul li ul li:hover > a,
        .sidebar-navigation ul li ul li.selected > a {
            background-color: #e6ebed;
        }
        .sidebar-navigation ul li ul li:hover > a:before,
        .sidebar-navigation ul li ul li.selected > a:before {
            margin-right: 10px;
        }
        .sidebar-navigation ul li ul li.selected.selected--last > a {
            background-color: #94aab0;
            color: #fff;
        }
        .sidebar-navigation ul li ul li.selected.selected--last > a:before {
            background-color: #fff;
        }

    </style>




    {{-- Header  --}}
    <style>
        header{
            padding-top: 3px;
            background-color: #fff;
        }
        #top-navbar {
            /* padding: 9px 20px; */
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgb(0 0 0 / 7%);
        }
        #top-navbar>ul {
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: end;
            margin: 0;
            padding: 0;
        }
        #top-navbar>ul>li:not(:last-child){
            margin-right: 20px;
        }
        #top-navbar>ul>li>a{
            text-decoration: none;
            color: #536485;
        }
        #top-navbar>ul>li>.icon{
            height: 25px;
            width: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        #top-navbar>ul>li>.icon:hover{
            background-color: #ddd;
        }
        #top-navbar>ul>li>a p{
            font-size: 12px;
            font-weight: 500
        }
        #top-navbar>ul>li>a span{
            font-size: 10px;
            font-weight: 400;
            color: #536485;
        }
        #top-navbar>ul>li>.dropdown-toggle::after{
            display: none;
        }
        .main-header-dropdown {
            background-color: #fff;
            margin-top: 5px!important;
            box-shadow: 0 0.25rem 0.625rem rgba(20,20,20,.1);
            padding: 0;
        }
        .main-header-dropdown a {
            padding: 10px;
            font-size: 14px;
            text-decoration: none;
            color: #536485;
            display: flex!important;
            align-items: center;
            transition: all 0.3s ease;
        }
        .main-header-dropdown a .badge-inbox{
            background-color: #e0fff1!important;
            color: #4acb91;
        }
        .main-header-dropdown a:hover {
            background-color: rgb(132 90 223 / 5%);
            color: rgb( 132,90,223 );
        }
    </style>


    {{-- Table  --}}
    <style>
        .table-card{
            background-color: #fff;
            border-radius: 10px;
            border: none;
        }
        .table-header{
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            border-radius: 10px 10px 0 0!important;
        }
        .table-title{
            font-size: 15px;
            font-weight: 500;
            color: #1d1b31;
            position: relative;
        }
        .table-title::before {
            content: "";
            position: absolute;
            height: 15px;
            width: 3px;
            inset-block-start: 3px;
            inset-inline-start: -6px;
            background: linear-gradient(to bottom,rgba(132,90,223, 0.5) 50%,rgba(35,183,229,.5) 50%);
            border-radius: 5px;
        }
        .add-new{
            font-size: 15px;
            color: #536485;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .add-new:hover{
            color: #000;
        }

        table td, table th {
            padding: 10px 15px;
            border: 1px solid #ddd;
            font-size: 13px;
            color: #666;
        }
        table td a {
            color: #536485;
            text-decoration: none;
        }
        table td a:focus, table td a:hover {
            color: #11101d;
            box-shadow: none!important;
            outline: 0!important;
        }
    </style>


    {{-- Data Table  --}}
    <style>
        div.dataTables_wrapper div.dataTables_length select {
            min-height: 2.3em;
        }
        table.dataTable{
            padding-top: 20px!important;
        }
        table.dataTable th {
            height: 31px;
            vertical-align: middle;
        }
        table.dataTable td {
            height: 31px;
            vertical-align: middle;
        }
        table.dataTable td>a {
            margin-right: 5px;
        }
        table.dataTable.table thead th.sorting:after, table.dataTable.table thead td.sorting:after {
            display: none;
        }
        div.dataTables_wrapper div.dataTables_info {
            padding-top: 13px;
            white-space: nowrap;
            font-size: 13px;
        }
        .dataTables_length label, .dataTables_filter label {
            font-size: 13px;
        }
        .dataTables_filter label input{
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 5px 10px;
            font-size: 13px;
            color: #666;
        }
        .dataTables_filter label input:focus-visible{
            outline: none;
        }
        .dataTables_paginate.paging_simple_numbers>a{
            font-size: 13px;
            color: #666;
            margin: 0 5px;
        }
        .dataTables_paginate.paging_simple_numbers .paginate_button
        {
            font-size: 13px;
            margin: 0 5px;
            background: #fff!important;
            padding: 5px 12px;
            border-radius: 50%;
        }
        .dataTables_paginate.paging_simple_numbers .paginate_button:focus
        {
            box-shadow: none!important;
            outline: 0!important;
        }

    </style>


</head>
<body>
    <div id="main-wrapper">
        <!--**********************************
        Sidebar start
        ***********************************-->
        @include('admin.includes.sidebar')

        <!--**********************************
            Sidebar end
        ***********************************-->


        <div class="content">
            <!--**********************************
                Header start
            ***********************************-->
            @include('admin.includes.header')
            <!--**********************************
                Header end
            ***********************************-->





            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!--**********************************
                Content body end
            ***********************************-->


            {{-- Data Table --}}
            <div class="container-fluid my-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="card-header table-header">
                                <div class="table-title">User</div>
                                <a href="#" class="add-new">Create User</a>
                            </div>
                            <div class="card-body">
                                <table class="table dataTable w-100" id="data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL NO</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone No</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->











    <!--**********************************
        Scripts
    ***********************************-->

    {{-- icon --}}
    <script>
        feather.replace();
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- bootstrap script  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script>
        $(function(){
            var $ul   =   $('.sidebar-navigation > ul');

            $ul.find('li a').click(function(e){
                var $li = $(this).parent();

                if($li.find('ul').length > 0){
                e.preventDefault();

                if($li.hasClass('selected')){
                    $li.removeClass('selected').find('li').removeClass('selected');
                    $li.find('ul').slideUp(400);
                    $li.find('a em').removeClass('mdi-flip-v');
                }else{

                    if($li.parents('li.selected').length == 0){
                        $ul.find('li').removeClass('selected');
                        $ul.find('ul').slideUp(400);
                        $ul.find('li a em').removeClass('mdi-flip-v');
                    }else{
                        $li.parent().find('li').removeClass('selected');
                        $li.parent().find('> li ul').slideUp(400);
                        $li.parent().find('> li a em').removeClass('mdi-flip-v');
                    }

                    $li.addClass('selected');
                    $li.find('>ul').slideDown(400);
                    $li.find('>a>em').addClass('mdi-flip-v');
                }
                }
            });


            $('.sidebar-navigation > ul ul').each(function(i){
                if($(this).find('>li>ul').length > 0){
                var paddingLeft = $(this).parent().parent().find('>li>a').css('padding-left');
                var pIntPLeft   = parseInt(paddingLeft);
                var result      = pIntPLeft + 20;

                $(this).find('>li>a').css('padding-left',result);
                }else{
                var paddingLeft = $(this).parent().parent().find('>li>a').css('padding-left');
                var pIntPLeft   = parseInt(paddingLeft);
                var result      = pIntPLeft + 20;

                $(this).find('>li>a').css('padding-left',result).parent().addClass('selected--last');
                }
            });

            var t = ' li > ul ';
            for(var i=1;i<=10;i++){
                $('.sidebar-navigation > ul > ' + t.repeat(i)).addClass('subMenuColor' + i);
            }

            var activeLi = $('li.selected');
            if(activeLi.length){
                opener(activeLi);
            }

            function opener(li){
                var ul = li.closest('ul');
                if(ul.length){

                    li.addClass('selected');
                    ul.addClass('open');
                    li.find('>a>em').addClass('mdi-flip-v');

                    if(ul.closest('li').length){
                        opener(ul.closest('li'));
                    }else{
                        return false;
                    }

                }
            }

        });
    </script>


    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
    </script>


    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>





    @include('admin.includes.scripts')
    <!-- Common Scripts -->
    <script>
        var SITEURL = "{{ URL::to('') }}";
        $( document ).ready( function () {
        $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
        });
    </script>

    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/users';

        $(document).ready( function () {
            var table = $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [ 20, 50, 100, 500 ],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id', orderable: true },
                    { data: 'name', name: 'name', orderable: true },
                    { data: 'designation', name: 'designation', orderable: true },
                    { data: 'email', name: 'email', orderable: true },
                    { data: 'phone_no', name: 'phone_no', orderable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            var btn2 = '';
                            btn1 += '<a href="' + SITEURL + '/order/details/' + data + '" class="btn btn-sm btn-primary">Edit</a>';
                            btn1 += '<a href="' + SITEURL + '/order/details/' + data + '" class="btn btn-sm btn-danger btn-delete">Delete</a>';
                            return btn1 + btn2;
                        }
                    }
                ],
                order: [[0, 'desc']]
            });
        });
    </script>

    @stack('custom-scripts')

</body>
</html>
