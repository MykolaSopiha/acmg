@extends('manager.layouts.app')

@section('content')

    <!-- Sessions table -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-clock-o"></i> Timetable
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" id="" role="grid" style="width: 100%;" width="100%" cellspacing="0">
                                <thead>
                                <tr role="row">
                                    <th rowspan="1" colspan="1">#</th>
                                    <th rowspan="1" colspan="1">Account ID</th>
                                    <th rowspan="1" colspan="1">TV ID</th>
                                    <th rowspan="1" colspan="1">TV Pass</th>
                                    <th rowspan="1" colspan="1">Start Time</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($accounts as $account)
                                    @foreach($account->session as $session)
                                        <tr>
                                            <td>{{ $session->id }}</td>
                                            <td>
                                                <a href="https://www.facebook.com/profile.php?id={{ $session->account->profile_id }}">
                                                    {{ $session->account->profile_id }}
                                                </a>
                                            </td>
                                            <td>{{ $session->account->viewer_id }}</td>
                                            <td>{{ $session->account->viewer_pass }}</td>
                                            <td>{{ $session->timetable->start_time }}</td>
                                            <td>{{ $session->status }}</td>
                                            <td class="text-center">
                                                @if ($session->status == 'expect')
                                                    <a class="text-success p-1 showSessionModal" data-session="{{ $session->id }}" href="#">
                                                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
{{--                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing {{ $timetables->count() }} entries.</div>--}}
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="sessionModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Send result</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="{{ route('manager:updateSession') }}" method="post">
                    {!! csrf_field() !!}

                    <input type="hidden" name="sessionId" value="">

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="js-select" id="status" style="width: 100%;">
                                <option value=""></option>
                                <option value="expect">Expect</option>
                                <option value="success">Success</option>
                                <option value="fail">Fail</option>
                                <option value="trash">Trash</option>
                            </select>
                            @if ($errors->has('account_id'))
                                <p class="text-danger">{{ $errors->first('account_id') }}</p>
                            @endif
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Send</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            let $sessionModal = $('#sessionModal');
            let $sessionIdInput = $sessionModal.find('input[name="sessionId"]');

            $('.showSessionModal').on('click', function () {
                $sessionIdInput.val( $(this).data('session') );
                $sessionModal.modal();
            });

        });
    </script>
@endpush