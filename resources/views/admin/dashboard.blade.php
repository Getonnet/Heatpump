@extends('layouts.master')
@section('title')
    Dashboards
@endsection

@section('btn')
    @component('components.head-btn')
        <button class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">New</span>
        </button>
        <button class="btn btn-primary" type="button">All</button>
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col">
            @component('components.card')
                @slot('title')
                    Dashboards
                @endslot

                <p>This is dashboard</p>

            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection