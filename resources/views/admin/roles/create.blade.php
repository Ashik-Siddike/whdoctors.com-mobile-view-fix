@extends('admin.app')
@section('title')
    Role
@endsection
@section('content')


{{-- <div class="col-12">
    <div class="card">
        <div class="page-titles border-bottom">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pages') }}">Roles</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('page.create') }}">Create Page</a></li>
            </ol>
            <div>
                <a href="{{ route('pages') }}" class="breadcrumb-page-link">Role List</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-12 mx-auto">
                    <div class="basic-form">
                        <form  action="{{ route('role.store') }}" method="POST">
                        @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Role">
                                    @if($errors->has('name'))
                                        <div class="error_msg">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br/>
                                    @foreach($permission as $value)
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permission[]" class="form-check-input" id="check-{{ $value->id }}" value="{{ $value->id }}">
                                            <label class="form-check-label" for="check-{{ $value->id }}">{{ $value->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-8 text-end ms-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> --}}

    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card pb-5">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Role</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('role.index')}}">Role</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="role"> Create Role</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('role.index')}}" class="add-new">Role<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <form  action="{{ route('role.store') }}" method="POST">

                            @csrf
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label custom-label custom-label">Role</label>
                                        <input type="text" class="form-control custom-input" name="name" placeholder="Role">
                                        @if($errors->has('name'))
                                            <div class="error_msg">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" id="permission-list">
                                            <strong>Permission:</strong>
                                            <br/>
                                            @foreach($permission as $value)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" name="permission[]" class="form-check-input custom-checkbox" id="check-{{ $value->id }}" value="{{ $value->id }}">
                                                    <label class="form-check-label custom-checkbox-label" for="check-{{ $value->id }}">{{ $value->display_name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                            </div>

                            

                            <div class="row mt-3">
                                <div class="col-9 text-end px-0">
                                    <button type="submit" class="btn submit-button"> 
                                        Submit
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
@endpush
