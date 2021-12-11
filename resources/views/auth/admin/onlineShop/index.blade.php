@extends('layouts.app')
@section('content')
    <main id="onlineShop">
        <!-- ======= admin Section ======= -->
        <section id="onlineShop">
            <div class="row justify-content-center py-3 w-100 mx-auto">
                <h3 class="">فروشگاه انلاین</h3>
            </div>
            <div class="container-fluid">
                <div class="row mx-auto w-100 justify-content-center">
                    <div class="col-lg-5 col-md-7 col-sm-9 d-flex flex-column justify-content-center align-items-stretch border border-warning rounded p-3">
                        <div class="card text-right">
                             {{-- system menu --}}
                            <div class="card-header">
                                <p class="text-dark">
                                    وضعیت فروشگاه
                                </p>
                            </div>
                            <div class="card-body">
                               {{-- open or close --}}
                               <div class="form-check form-switch">
                                 <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                 <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                               </div>
                               <div class="form-check form-switch">
                                 <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                 <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                               </div>
                               <div class="form-check form-switch">
                                 <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                                 <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
                               </div>
                               <div class="form-check form-switch">
                                 <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                 <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
                               </div>
                            </div>

                            {{-- admin menu --}}
                            <div class="card-header">
                                <p class="text-dark">
                                    اطلاعات ادمین
                                </p>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    {{-- chenge password --}}
                                    <li>
                                        <a href="{{route('forgetPassword.index')}}" dusk='changePassword_link' id="changePassword_link">تغییر رمز عبور</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                document.getElementById("onlineShop").scrollIntoView();
            </script>
        </section>    
    </main>
@endsection
