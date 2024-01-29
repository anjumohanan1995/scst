@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-9">
                    <h4 class="content-title mb-2">ജനനി-ജനനി -ജന്മരക്ഷ പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി അപേക്ഷഫോറം
                    </h4>
                </div>
                <div class="col-xl-3">
                </div>
            </div>
            <!-- /breadcrumb -->
            <!-- main-content-body -->
            <div class="main-content-body">


                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- row -->
                <!-- row -->
                <div class="row row-sm w-100">
                    <div class="col-sm-12 col-md-12 col-lg-8">



                        <div class="card overflow-hidden" style="width: 113%;">

                            <div class="card-body pd-y-7">

                                <h1
                                    style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                    ജനനി-ജനനി -ജന്മരക്ഷ <br> പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി <br> അപേക്ഷഫോറം

                                </h1>
                                <form action="#" method="post" style="font-weight: 500;font-size: 12px;padding: 90px;">

                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label>1. പേര് </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['name'] }} </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label>1. മേൽവിലാസം (പിൻകോഡ് സഹിതം) </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['address'] }} </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label> ജില്ല </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['district_name'] }} </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label> താലൂക്ക് </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['taluk_name'] }} </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label> പിൻകോഡ് </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['pincode'] }} </label>
                                        </div>
                                    </div>

                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label>3.വയസ്, ജനനതീയതി</label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['age'] }} , @if(@$formData['dob']!=null) {{ \Carbon\Carbon::parse(@$formData['dob'])->format('d-m-Y') }}@endif  </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label>4. .ഭർത്താവിന്റെ പേര് </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['hus_name'] }} </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label>5. സമുദായം / ജാതി</label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['caste'] }} </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label>6.വില്ലേജ് </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['village'] }} </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label>7.എത്രാമത്തെ പ്രസവം </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['births'] }} </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label>8.പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label>@if(@$formData['expected_date_of_delivery']!=null) {{ \Carbon\Carbon::parse(@$formData['expected_date_of_delivery'])->format('d-m-Y') }}@endif  </label>
                                        </div>
                                    </div>
                                    <div class=" row paper-1">
                                        <div class="col-5">

                                            <label>9. ഗർഭ /പ്രസവ ശുശ്രുഷക്ക്<br> ആശ്രയിക്കുന്ന ആശുപത്രി /<br>കുടുംബക്ഷേമ
                                                കേന്ദ്രം </label>
                                        </div>

                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-6">
                                            <label> {{ @$formData['dependent_hospital'] }} </label>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="row d-flex flex-direction-row col-6">
                                            <div class="row col-12">
                                                <div class="col-3">

                                                    <label>സ്ഥലം </label>
                                                </div>

                                                <div class="col-1">
                                                    <label> : </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> {{ @$formData['place'] }} </label>
                                                </div>
                                            </div>

                                            <div class="row col-12">
                                                <div class="col-3">

                                                    <label>തീയതി </label>
                                                </div>

                                                <div class="col-1">
                                                    <label> : </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> {{ date('d-m-Y') }} </label>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-6 d-flex">
                                            <div class="row d-flex col-12">
                                                <div class="col-8">
                                                    @if ($formData['signature'])
                                                    {{-- <iframe
                                                        src="{{ asset('applications/mother_child_protection/' . @$formData['signature']) }}"
                                                        width="400" height="200"></iframe> --}}
                                                        <img src="{{ asset('applications/mother_child_protection/' . @$formData['signature']) }}" width="120px" height="60px">
                                                @endif
                                                    <label>അപേക്ഷകന്റെ ഒപ്പ്</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <h1
                                                style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                                അപേക്ഷ സമർപ്പിക്കുന്നത്

                                            </h1>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="row d-flex flex-direction-row col-6">
                                            <div class="row col-12">
                                                <div class="col-3">

                                                    <label>ജില്ല </label>
                                                </div>

                                                <div class="col-1">
                                                    <label> : </label>
                                                </div>
                                                <div class="col-2">
                                                    <label> {{ @$formData['dist_name'] }} </label>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-6 d-flex">
                                            <div class="row d-flex col-12">
                                                <div class="col-6">

                                                    <label>TEO</label>
                                                </div>

                                                <div class="col-1">
                                                    <label> : </label>
                                                </div>
                                                <div class="col-4">
                                                    <label> {{ @$formData['teo_name'] }} </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </form>


                                <form action="{{ url('motherChildStoreDetails') }}" method="POST"
                                    enctype="multipart/form-data" >
                                    @csrf


                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <input type="hidden" name="formData" value="{{ json_encode($formData) }}">
                                            <button type="submit" class="btn-block btn btn-success"
                                                onclick="return confirm('Do you want to continue?')">Submit</button>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="btn_wrapper">
                                                <a href="javascript:void(0)" class="btn btn-primary w-100" onclick="goback()">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

    <script>
        // edit button function
        function goback() {
            if (confirm('Are you sure? Do you want to edit this form?')) {
                window.location.href = "{{ url()->previous() }}";
                //window.history.back();
               
            }
        }
    </script>
@endsection
