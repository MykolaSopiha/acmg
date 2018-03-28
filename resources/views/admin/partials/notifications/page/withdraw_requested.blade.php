<div class="alert alert-warning" role="alert">
    <span class="small text-muted">
        {{date("Y-m-d H:i:s", $notification->data['time'])}}
    </span>
    &#9;-&#9;
    <span class="text-warning">
        <strong><i class="fa fa-usd fa-fw"></i>&#9;Withdraw requested!&#9;</strong>
    </span>
    The user
    <a href="{{ route('admin:user.view', $notification->data['user_id']) }}">
        "{{$notification->data['user_name']}}"
    </a>
    has requested withdraw of
    <a href="{{ route('admin:withdraws.view', $notification->data['id']) }}">
        {{$notification->data['amount']}}&nbsp;{{$notification->data['currency']}}
    </a>
</div>
