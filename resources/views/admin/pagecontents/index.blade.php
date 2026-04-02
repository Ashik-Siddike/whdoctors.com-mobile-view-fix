@extends('admin.app')
@section('title')
    Page Content
@endsection



@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
<style>
    .pagecontent-sidebar{
        padding: 15px;
        background-color: #fff;
        border-radius: 10px;
    }
    .pagecontent-sidebar-menu{
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .pagecontent-sidebar-menu li{
        padding: 0 0 10px 0;
    }
    .pagecontent-sidebar-menu li a{
        color: #8c9097;
        opacity: 0.8;
        font-weight: 400;
        font-size: 12px;
        text-decoration: none;
    }
    .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu{
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu li{
        padding: 0 0 0 10px;
        border-radius: 5px;
        line-height: 0;
        margin-bottom: 3px;
    }
    .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu li:hover{
        background-color: #f5f5f5;
    }
    .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu li a{
        color: rgb(51, 51, 53);
        font-weight: 500;
        font-size: 13.4px;
        display: inline-block;
        height: 25px;
        padding: 6px 0;
        line-height: 1;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }
    .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu li a:hover{
        color: #000;
    }

    .form-switch{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-check-input:focus{
        outline: none;
        box-shadow: none;
        cursor: pointer;
    }
</style>
@endpush



@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-3">
                <div class="pagecontent-sidebar">
                    <ul class="pagecontent-sidebar-menu">
                        <li>
                            <a href="#">Home Page</a>
                            <ul class="pagecontent-sidebar-submenu">
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'home-contact-social'])}}">Social Link</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'slider'])}}">Slider</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'about-section'])}}">About Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'service-point'])}}">About Section(Service Point)</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'clientreview-section'])}}">Client Review Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'clientreview-bottomsection'])}}">Client Review Bottom Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'whyus-section'])}}">Why Us Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'apply-section'])}}">Apply Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'contact-section'])}}">Contact Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'leading-university'])}}">Leading University Text</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'blog-news'])}}">Blog & News title</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'home-seo'])}}">SEO</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="">About Page</a>
                            <ul class="pagecontent-sidebar-submenu">
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'About-us-heading'])}}">Heading</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'About-Button'])}}">Button Link</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'About-About'])}}">Study Lab</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'About-Mission'])}}">Mission</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'About-What-we-do'])}}">What we do?</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'Sidebar-university-heading'])}}">Right sidebar title</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'Manage-app-heading'])}}">Manage App</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'about-seo'])}}">SEO</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Study abroad</a>
                            <ul class="pagecontent-sidebar-submenu">
                                {{-- <li>
                                    <a href="{{route('page-contents', ['hints' => 'Hero section abroad'])}}">Hero section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'Information section About Button'])}}">Dynamic Link</a>
                                </li> --}}
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'study-abroad-seo'])}}">SEO</a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li>
                            <a href="">Abroad University</a>
                            <ul class="pagecontent-sidebar-submenu">
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'abroad-university-seo'])}}">SEO</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Service</a>
                            <ul class="pagecontent-sidebar-submenu">
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'service-seo'])}}">SEO</a>
                                </li>
                            </ul>
                        </li> --}}
                        <li>
                            <a href="">Conference</a>
                            <ul class="pagecontent-sidebar-submenu">
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'conference-section'])}}">Conference Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'conference-seo'])}}">SEO</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">FLY BD</a>
                            <ul class="pagecontent-sidebar-submenu">
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'flybd-section'])}}">fly BD Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'flybd-seo'])}}">SEO</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Abroad living</a>
                            <ul class="pagecontent-sidebar-submenu">
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'abroad-living-section'])}}">Abroad living Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'abroad-living-seo'])}}">SEO</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Common</a>
                            <ul class="pagecontent-sidebar-submenu">
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'top-navbar'])}}">Top Navbar Section</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'menu-item'])}}">Top Navbar Menu Item</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'Under-about-section-box'])}}">History(Customer, Project, City)</a>
                                </li>
                                <li>
                                    <a href="{{route('page-contents', ['hints' => 'footer'])}}">Footer Section</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Page Content</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Page Content</li>
                                </ol>
                            </nav>
                        </div>
                        @if (Auth::user()->hasRole('superadmin'))
                            <a href="{{route('page-content.create')}}" class="add-new">Create Page Content<i class="ms-1 ri-add-line"></i></a>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table dataTable w-100" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Page Name</th>
                                    {{-- <th scope="col">Hints</th> --}}
                                    <th scope="col">Title</th>
                                    <th scope="col">Subtitle</th>
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
@endsection


@push('custom-scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>


<script type="text/javascript">

    let searchParams = new URLSearchParams(window.location.search);
    if(searchParams.get('hints')){
        var listUrl = SITEURL + '/dashboard/page-content/?hints=' + searchParams.get('hints');
    }else{
        var listUrl = SITEURL + '/dashboard/page-content/';
    }
    var statusUrl = SITEURL + '/dashboard/page-content/change/status';

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
                { data: 'page_id', name: 'page_id', orderable: true },
                { data: 'title', name: 'title', orderable: true },
                { data: 'subtitle', name: 'subtitle', orderable: true },
                {
                    data: 'action-btn',
                    orderable: false,
                    render: function (data) {
                        var btn1 = '';
                        btn1 += '<div class="action-btn">';

                        if(data.hints == 'slider' || data.hints == 'service-point'){
                            var name;

                            if(data.active_status == 1) {
                                name = '<input class="form-check-input" type="checkbox" role="switch" id="switch" checked>';
                            } else {
                                name = '<input class="form-check-input" type="checkbox" role="switch" id="switch">';
                            }
                            btn1 += '<div class="form-check form-switch status-change me-2" id="status-' + data.id + '" data-id="' + data.id + '" data-hints="' + data.hints + '" data-status="' + data.active_status + '" alt="acive or inactive">' + name + '</div>';
                        }


                        btn1 += '<a href="' + SITEURL + '/dashboard/page-content/edit/' + data.id + '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                        if (data.role == 'superadmin') {
                            btn1 += '<a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion(\'' + SITEURL + '/dashboard/page-content/delete/' + data.id + '\')"><i class="ri-delete-bin-2-line"></i></a>';
                        }

                        btn1 += '</div>';
                        return btn1;
                    }
                }
            ],
            order: [[0, 'asc']],
        });
    });

    $('body').on('click', '.status-change', function () {

        swal({
            title: "Are you sure?",
            text: "Do you want to change the status?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willChange) => {
            if (willChange) {
                var id = $(this).data('id');
                var status = $(this).data('status');
                var hints = $(this).data('hints');
                $('#status-' + id).html('<i class="ri-lock-2-line"></i>');
                var value, name;
                if(status == 1) {
                    value = 0;
                    name = '<input class="form-check-input" type="checkbox" role="switch" id="switch">';
                } else {
                    value = 1;
                    name = '<input class="form-check-input" type="checkbox" role="switch" id="switch" checked>';
                }
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: statusUrl,
                    data: {'hints': hints, 'status': value, 'id': id},
                    success: function(data) {
                        $('#status-' + id).html(name);
                        $('#status-' + id).attr('data-status', value);
                        $('#data-table').DataTable().ajax.reload();

                        if(data.success){
                            swal({
                                title: "Success!",
                                text: data.success,
                                icon: "success",
                                button: "OK",
                            });
                        }else if(data.error){
                            swal({
                                title: "Error!",
                                text: data.error,
                                icon: "error",
                                button: "OK",
                            });
                        }
                    },

                });
            }else{
                var id = $(this).data('id');
                var status = $(this).data('status');
                var hints = $(this).data('hints');
                $('#status-' + id).html('<i class="ri-lock-2-line"></i>');
                var value, name;
                if(status == 1) {
                    value = 1;
                    name = '<input class="form-check-input" type="checkbox" role="switch" id="switch" checked>';
                } else {
                    value = 0;
                    name = '<input class="form-check-input" type="checkbox" role="switch" id="switch" >';
                }
                $('#status-' + id).html(name);


            }

        });
    });
</script>

@endpush
