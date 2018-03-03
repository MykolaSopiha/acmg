<a class="dropdown-item" href="{{route('admin:users.view', $notification->data['id'])}}">
    <span class="text-success">
        <strong><i class="fa fa-user fa-fw"></i>New User</strong>
    </span>
    <span class="small float-right text-muted">{{date("H:i", $notification->data['time'])}}</span>
    <div class="dropdown-message small">
        New user "{{$notification->data['name']}}" registered in the system.
    </div>
</a>
