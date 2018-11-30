@if(session()->has('success'))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Hecho!</strong> {!! session('message') !!}
</div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong> {!! session('message') !!}
    </div>
@endif