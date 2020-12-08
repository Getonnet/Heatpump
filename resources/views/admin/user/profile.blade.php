@extends('layouts.master')
@section('title')
    {{__('Profile')}}
@endsection



@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-5 col-xs-6">
            @component('components.card')

                    <div class="card-body">
                        <a href="#!">
                            <img class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px;" src="{{asset($table->photo)}}" alt="Admin Image">
                        </a>
                        <div class="pt-4 text-center">
                            <h5 class="h3 title">
                                <span class="d-block mb-1">{{$table->name}}</span>
                                <small class="h4 font-weight-light text-muted">{{$table->roles->title ?? ''}}</small>
                            </h5>
                            <p class="text-indigo">{{$table->email}}</p>
                        </div>
                    </div>

            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection