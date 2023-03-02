<script src="{{ asset('user/js/notify/bootstrap-notify.min.js') }}"></script>
<script>
    @if(Session::has('success'))
        $.notify({
            icon: 'fa fa-check-circle',
            title: '<strong>Success !</strong>',
            message: "{{ Session::get('success') }}"
        },{
            type: 'success'
        });
        @php
            Session::forget('success');
        @endphp
    @endif
    @if(Session::has('error'))
        $.notify({
            icon: 'fa fa-exclamation-circle',
            title: '<strong>Error !</strong>',
            message: "{{ Session::get('error') }}"
        },{
            type: 'danger'
        });
        @php
            Session::forget('error');
        @endphp
    @endif
    @if($errors->any())
        @foreach($errors->all() as $error)
            $.notify({
                message: "{{ $error }}"
            },{
                type: 'danger'
            });
        @endforeach
    @endif
</script>
