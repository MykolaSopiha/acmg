<div class="alert alert-success" role="alert">
    <span class="small text-muted">
        {{date("Y-m-d H:i:s", $notification->data['time'])}}
    </span>
    &#9;-&#9;
    <span class="text-success">
        <strong><i class="fa fa-user fa-fw"></i>&#9;New User!&#9;</strong>
    </span>
    The user under the nickname "{{$notification->data['name']}}" has registered in the system.
</div>
