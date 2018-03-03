<div class="alert alert-primary" role="alert">
    <span class="small text-muted">
        {{date("Y-m-d H:i:s", $notification->data['time'])}}
    </span>
    &#9;-&#9;
    <span class="text-success">
        <strong><i class="fa fa-user fa-fw"></i>&#9;New Account!&#9;</strong>
    </span>
    The user "{{$notification->data['user_name']}}" added a new
    <a href="{{route('admin:accounts.view', $notification->data['account_id'])}}">account</a>.
</div>
