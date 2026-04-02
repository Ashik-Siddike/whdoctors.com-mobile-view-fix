@extends('frontend.app')

@section('title')
    Appointment Page
@endsection



@section('body')

    <style>
        body {
            background-color: #DC4D01;
        }

        .appointment-wrapper {
            padding: 60px 15px;
        }

        .form-container {
            max-width: 650px;
            margin: auto;
            padding: 35px 30px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #DC4D01;
            font-size: 28px;
        }

        /* 🔥 LABEL DESIGN */
        .form-label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #444;
        }

        /* 🔥 INPUT & TEXTAREA DESIGN */
        .form-control {
            width: 100%;
            height: 48px;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 15px;
            border: 1.5px solid #ddd;
            background-color: #fff;
            transition: all 0.25s ease;
        }

        textarea.form-control {
            height: auto;
            min-height: 110px;
            resize: none;
        }

        .form-control::placeholder {
            font-size: 14px;
            color: #aaa;
        }

        .form-control:focus {
            border-color: #DC4D01;
            box-shadow: 0 0 0 3px rgba(220,77,1,0.2);
            outline: none;
        }

        /* 🔥 FIELD SPACING */
        .mb-3 {
            margin-bottom: 18px !important;
        }

        /* BUTTON */
        .btn-appointment {
            background-color: #DC4D01;
            color: #fff;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 600;
            padding: 12px;
            border: none;
            transition: 0.3s;
        }

        .btn-appointment:hover {
            background-color: #b84000;
            transform: translateY(-2px);
        }

        /* 📱 Mobile Perfect View */
        @media (max-width: 576px) {
            .form-container {
                padding: 25px 20px;
            }

            .form-title {
                font-size: 22px;
            }

            .form-label {
                font-size: 13px;
            }

            .form-control {
                height: 46px;
                font-size: 14px;
            }
        }
    </style>

    <div class="appointment-wrapper">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success text-center">
                    <h1 style="text-align: center" ">{{ session('success') }}</h1>
                </div>
            @endif

            <div class="form-container">
                <h3 class="form-title">Appointment Visitor Information</h3>

                <form action="{{ route('frontend.appointmentstore') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label>Preferred Visit Time</label>
                        <input type="datetime-local" class="form-control" name="visit_time" required>
                    </div>

                    <div class="mb-3">
                        <label>Purpose of Visit</label>
                        <textarea class="form-control" name="purpose" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-appointment w-100">
                        Appointment
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection

