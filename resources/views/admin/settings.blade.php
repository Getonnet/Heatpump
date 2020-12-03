@extends('layouts.master')
@section('title')
    Website Settings
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-8 col-md-6">
            @component('components.card')
                @slot('title')
                    Settings
                @endslot
                <form action="#" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Website Name</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>

                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>

            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection