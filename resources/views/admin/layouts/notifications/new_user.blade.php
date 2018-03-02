<a class="dropdown-item" href="{{route('admin:users.edit', $notifications->data['id'])}}" onclick="">
    <span class="text-success">
        <strong><i class="fa fa-long-arrow-up fa-fw"></i>New User</strong>
    </span>
    <span class="small float-right text-muted">{{$notifications->data['date']}}</span>
    <div class="dropdown-message small">{{$notifications->data['name']}} joined us! This is an automated server response message.</div>
</a>
