@extends('admin.app')
@section('title')
    Role
@endsection
@section('content')

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
                                <li class="breadcrumb-item active" aria-current="role"> Edit Role</li> 
                            </ol> 
                        </nav>
                    </div>
                    <a href="{{route('role.index')}}" class="add-new">Role<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('role.update', ['id' => $role->id]) }}" method="POST">
                        @csrf
                        <div class="col-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label custom-label">Role</label>
                                    <input type="text" class="form-control custom-input" name="name"  value="{{$role->name}}">
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
                                                <input type="checkbox" name="permission[]" class="form-check-input custom-checkbox" id="check-{{ $value->id }}" value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                                <label class="form-check-label custom-checkbox-label" for="check-{{ $value->id }}">{{ $value->display_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($errors->has('title'))
                                        <div class="error_msg">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        

                        <div class="row mt-3">
                            <div class="col-9 text-end px-0">
                                <button type="submit" class="btn submit-button"> 
                                    Update
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
