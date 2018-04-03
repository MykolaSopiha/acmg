@extends('manager.layouts.app')

@section('content')

    <!-- Sessions table -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-clock-o"></i> Sessions
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                   aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" style="width: 90.2px;" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 134.2px;" aria-label="Position: activate to sort column ascending">User
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 66.2px;" aria-label="Office: activate to sort column ascending">TV ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 30.2px;" aria-label="Age: activate to sort column ascending">TV Pass
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 70.2px;" aria-label="Start date: activate to sort column ascending">Comment
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">User</th>
                                    <th rowspan="1" colspan="1">TV ID</th>
                                    <th rowspan="1" colspan="1">TV Pass</th>
                                    <th rowspan="1" colspan="1">Comment</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($accounts as $account)
                                    <tr role="row" class="even">
                                        <td class="sorting_1">{{ $account->id }}</td>
                                        <td>{{ $account->user->name }}</td>
                                        <td>{{ $account->viewer_id }}</td>
                                        <td>{{ $account->viewer_pass }}</td>
                                        <td>{{ $account->Comment }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1
                                to 10 of {{ $accounts->count() }} entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    {{ $accounts->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>


    <!-- Accounts table -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-id-card-o"></i> Accounts
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                   aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" style="width: 90.2px;" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 134.2px;" aria-label="Position: activate to sort column ascending">User
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 66.2px;" aria-label="Office: activate to sort column ascending">TV ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 30.2px;" aria-label="Age: activate to sort column ascending">TV Pass
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 70.2px;" aria-label="Start date: activate to sort column ascending">Comment
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">User</th>
                                    <th rowspan="1" colspan="1">TV ID</th>
                                    <th rowspan="1" colspan="1">TV Pass</th>
                                    <th rowspan="1" colspan="1">Comment</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($accounts as $account)
                                    <tr role="row" class="even">
                                        <td class="sorting_1">{{ $account->id }}</td>
                                        <td>{{ $account->user->name }}</td>
                                        <td>{{ $account->viewer_id }}</td>
                                        <td>{{ $account->viewer_pass }}</td>
                                        <td>{{ $account->Comment }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1
                                to 10 of {{ $accounts->count() }} entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    {{ $accounts->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection

@push('scripts')
    <style>
        .pagination li {
            padding: 10px;
        }
    </style>
@endpush