@if (session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif


@if (session('waring'))
<div class="alert alert-warning">
    {{session('waring')}}
</div>
@endif

@if (session('status'))
<div class="alert alert-warning">
    {{session('status')}}
</div>
@endif