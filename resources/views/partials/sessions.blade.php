@if(Session::has('error'))
    <div class="alert-danger p-4">
        <span>{{session('error')}}</span>
    </div>
@endif
@if(Session::has('success'))
    <div class="alert-success p-4">
        <span>{{session('success')}}</span>
    </div>
@endif
