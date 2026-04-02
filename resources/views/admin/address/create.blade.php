@extends('admin.app')
@section('title')
    Address
@endsection
@section('content')

    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Address</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('address')}}">Address</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page"> Create Address</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('address')}}" class="add-new">Address<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <form  action="{{ route('address.store') }}" method="POST">

                            @csrf
                            <div class="col-md-8">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label custom-label">Address Title</label>
                                        <input type="text" class="form-control custom-input" name="text" placeholder="Address Title">
                                        @if($errors->has('text'))
                                            <div class="error_msg">
                                                {{ $errors->first('text') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Phone No</label>
                                        <input type="text" class="form-control custom-input" name="phone" placeholder="Phone No">
                                        @if($errors->has('phone'))
                                            <div class="error_msg">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>

                                    
                                    <div class="col-md-12">
                                        <label for="" class="form-label custom-label">Full Address</label>
                                        <textarea class="form-control custom-input" name="full_address" rows="5"  placeholder="Full Address"  style="resize: none; height: auto"></textarea>
                                        @if($errors->has('full_address'))
                                            <div class="error_msg">
                                                {{ $errors->first('full_address') }}
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Email</label>
                                        <input type="email" class="form-control custom-input" name="email" placeholder="Email">
                                        @if($errors->has('email'))
                                            <div class="error_msg">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Working Hour</label>
                                        <input type="text" class="form-control custom-input" name="working_hour" placeholder="Working Hour">
                                        @if($errors->has('working_hour'))
                                            <div class="error_msg">
                                                {{ $errors->first('working_hour') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <input type="checkbox" class="form-check-input custom-checkbox" id="customCheckBox1" name="is_show_on_navbar">
                                        <label class="form-check-label custom-checkbox-label" for="customCheckBox1">Is Show Navbar</label>
                                    </div>

                                </div>

                            </div>

                            
                            <div class="col-12 text-center">
                                <button type="submit" class="btn submit-button"> 
                                    Submit
                                    <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                    </span>
                                </button>
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