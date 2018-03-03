<a class="dropdown-item" href="{{route('admin:accounts.view', $notification->data['account_id'])}}">
    <span class="text-primary">
        <strong><i class="fa fa-address-card-o fa-fw"></i>&nbsp;Account Added</strong>
    </span>
    <span class="small float-right text-muted">{{date("H:i", $notification->data['time'])}}</span>
    <div class="dropdown-message small">
        User "{{$notification->data['user_name']}}" added new account!
    </div>
</a>
