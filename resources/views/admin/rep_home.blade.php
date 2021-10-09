@extends('layouts.admin')

@section('content')


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row">
                       
                   
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-credit-card text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$money->total}} SAR</h2>
                                    <p class="mb-0">الايرادات </p>
                                </div>
                                <div class="card-content">
                                    <div id="revenue-gain-chart-new"></div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-credit-card text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$orders->total}} </h2>
                                    <p class="mb-0">عدد الطلبات <a href="{{route('safer_orders')}}">عرض الطلبات </a> </p>
                                </div>
                                <div class="card-content">
                                    <div id="revenue-gain-chart-new"></div>
                                </div>
                            </div>

                  

                        
                    </div>
                


                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <script src="../../../js/chart.js/Chart.min.js"></script>

    <!-- END: Content-->
<script>
    $(window).on("load", function () {

var $primary = '#7367F0';
var $danger = '#EA5455';
var $warning = '#FF9F43';
var $info = '#0DCCE1';
var $primary_light = '#8F80F9';
var $warning_light = '#FFC085';
var $danger_light = '#f29292';
var $info_light = '#1edec5';
var $strok_color = '#b9c3cd';
var $label_color = '#e7eef7';
var $white = '#fff';

});
</script>
@endsection
