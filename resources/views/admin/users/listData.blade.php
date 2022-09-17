@extends('admin.defoult.defoultDashboard')
@section('title', 'User Data List')
@section('breadcrumb', 'List')

@section('content')
    
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">User Data List</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li style="margin-right: 10px; color:#fff; "><a href="{{ url('users/user_add') }}" class="btn btn-primary add-new">Add New</a></li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($users))
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td><span class="label label-success">Active</span></td>
                            <td class="text-center">
                                <a href="{{ url('users/edite_list', $user->id) }}"><i class="icon-pencil7"></i></a>
                                {{-- <a href="{{ url('users/delete_list', $user->id) }}"><i class="icon-trash"></i></a> --}}

                                <form class="d-inline" action="{{ url('users/delete_list', $user->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                   <button type="submit">
                                        <i class="icon-trash"></i>
                                   </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="6">Not Found Data</td>
                    </tr>
                @endif
                    
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

@endsection