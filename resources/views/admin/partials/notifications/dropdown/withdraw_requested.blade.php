<a class="dropdown-item" href="{{route('admin:withdraws.view', $notification->data['id'])}}">
    <span class="text-warning">
        <strong><i class="fa fa-usd fa-fw" aria-hidden="true"></i>Withdraw Requested</strong>
    </span>
    <span class="small float-right text-muted">{{date("H:i", $notification->data['time'])}}</span>
    <div class="dropdown-message small">
        User "{{$notification->data['user_name']}}" requested withdraw a payment
        of {{ $notification->data['amount'] . ' ' . $notification->data['currency'] }}.
    </div>
</a>
