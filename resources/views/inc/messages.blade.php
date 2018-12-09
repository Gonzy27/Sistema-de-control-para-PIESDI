@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script type="text/javascript">
            $.notify({
                // options
                message: "{{$error}}",
            },{
                // settings
                type: 'danger',
                offset: {
                    y: 75
                },
                delay: 3000,
                placement: {
                    from: "top",
                    align: "center"
                }
            });
        </script>
    @endforeach

@endif

@if(Session::has('success'))
    <script type="text/javascript">
        $.notify({
            // options
            message: "{{ Session::get('success') }}",
        },{
            // settings
            type: 'success',
            offset: {
                y: 75
            },
            placement: {
                from: "top",
                align: "center"
            }
        });
    </script>
@endif

@if(Session::has('error'))
<script type="text/javascript">
    $.notify({
        // options
        message: "{{ Session::get('error') }}",
    },{
        // settings
        type: 'danger',
        offset: {
            y: 75
        },
        placement: {
            from: "top",
            align: "center"
        }
    });
</script>
@endif