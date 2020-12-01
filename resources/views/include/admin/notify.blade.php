
@if ($errors->any())
    <!-- Validation error notification -->
    @foreach ($errors->all() as $error)
        <script type="text/javascript">
            $(function () {
                $.notify({
                    // options
                    message: "{{$error}}"
                },{
                    // settings
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "center"
                    },
                    timer: 2000,
                });
            });
        </script>
    @endforeach
    <!-- /Validation error notification -->
@endif


@if(session()->has('message'))
    <!-- General notification -->

    <script type="text/javascript">
        $(function () {
            $.notify({
                // options
                message: "{{ session()->get('message') }}"
            },{
                // settings
                type: "{{session()->get('type')}}",//success, danger, warning, info
                placement: {
                    from: "top",
                    align: "center"
                },
                timer: 1000,
            });
        });
    </script>
    <!-- General notification -->
@endif
