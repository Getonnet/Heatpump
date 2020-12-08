@extends('layouts.master')
@section('title')
    Dashboards
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row">

    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('Total Products')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{$products ?? 0}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-archive-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('Total Order')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{$orders ?? 0}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                            <i class="ni ni-delivery-fast"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('Total Customer')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{$customer ?? 0}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                            <i class="ni ni-satisfied"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{__('Total User')}}</h5>
                        <span class="h2 font-weight-bold mb-0">{{$user ?? 0}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-single-02"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>



{{--    <div class="row">--}}
{{--        <div class="col">--}}
{{--            <div class="card-deck flex-column flex-xl-row">--}}

{{--                <div class="card">--}}
{{--                    <div class="card-header bg-transparent">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col">--}}
{{--                                <h2 class="h3 mb-0">Total orders</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <!-- Chart -->--}}
{{--                        <div class="chart" style="margin: auto; height: 80vh;">--}}
{{--                            <canvas id="chart-bars" class="chart-canvas"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>
@endsection

@section('script')
    <!-- Optional JS -->
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script type="text/javascript">
        $(function () {

            var $chart = $('#chart-bars');

            // Init chart
            if ($chart.length) {
                initChart($chart);
            }
        });

        function initChart($chart) {

            // Create chart
            var ordersChart = new Chart($chart, {
                type: 'bar',
                responsive: true,
                maintainAspectRatio: true,
                data: {
                    labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Sales',
                        data: [25, 20, 30, 22, 17, 29]
                    }]
                }
            });

            // Save to jQuery object
            $chart.data('chart', ordersChart);
        }

    </script>
@endsection