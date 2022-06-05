@if (session('input_success'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>x</span>
        </button>
        {{ session('input_success')}}
    </div>  
</div>
@endif
@if (session('update_success'))
<div class="alert alert-warning alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>x</span>
        </button>
        {{ session('update_success')}}
    </div>  
</div>
@endif