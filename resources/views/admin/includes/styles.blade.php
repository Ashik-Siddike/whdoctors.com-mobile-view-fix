{{-- Google Font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">


{{-- bootstrap Css  --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


{{-- Icon Library remixicon icon --}}
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

{{-- Select2 css --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection{
        height: 32px !important;
        border-radius: 4px !important;
        border: 1px solid #ced4da !important;
        margin-bottom: 10px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        margin-top: 2px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
        font-size: 12px;
        color: #1d1b31;
        font-weight: 500;
    }
    .select2-search--dropdown{
        padding: 0;
    }
    .select2-container--open .select2-dropdown--below{
        border: 1px solid #ced4da !important;
        border-top: none !important;
        border-radius: 4px !important;
        margin-top: -10px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        font-size: 13px;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field{
        display: none; 
    }
    .select2-results__options .select2-results__option.select2-results__option--disabled{
        font-size: 13px;
    }
    .select2-results__options::-webkit-scrollbar {
        width: 3px;
        background-color: #F5F5F5!important;
        background-clip: padding-box;
    }
    .select2-results__options::-webkit-scrollbar-track {
        background-color: #F5F5F5!important;
        background-clip: padding-box;
    }
    .select2-results__options::-webkit-scrollbar-thumb {
        background-clip: padding-box;
        background-color: rgb(216 220 241);
    }
    .select2-results__option--selectable{
        font-size: 12px;
        color: #1d1b31;
        font-weight: 500;
    }



    /* //// */
    .custom-confirm-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .custom-confirm-box button {
            padding: 10px;
            margin: 5px;
            cursor: pointer;
        }
        .custom-confirm-box .yes {
            background-color: green;
            color: white;
        }
        .custom-confirm-box .no {
            background-color: red;
            color: white;
        }
 

</style>


{{-- DatePicker plugin --}}
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
    #datepicker{
        font-size: 13px;
        line-height: 18px;
    }
    .gj-icon{
        font-size: 18px!important;
        top: 8px!important;
        right: 8px!important;
    }
</style>


{{-- Print Js Plugin --}}
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

{{-- <!-- Style css --> --}}
@vite(['resources/css/admin/assets/scss/style.scss', 'resources/css/admin/assets/scss/table.scss', 'resources/js/app.js'])


<style>
    @media print {
        .noPrint {
            display: none!important;
        }
    }
</style>
