@extends('admin.defoult.defoultDashboard')
@section('title', 'User Edite List')
@section('breadcrumb', 'Edite')


@section('content')

	<!-- Basic examples -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Edite Users</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{ url('users/edite_list', $userInfo->id) }}" method="POST" enctype="multipart/form-data">
                <fieldset class="content-group">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="name">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $userInfo->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="email">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="email" id="email" value="{{ $userInfo->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="password">Password</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="password" id="password" value="{{ $userInfo->password }}">
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <a href="{{ url('users/user_list') }}" class="btn btn-default">Back To List</a>
                    <button type="submit" class="btn btn-primary" name="add_users">Update </button>
                </div>
            </form>
        </div>
    </div>
    <!-- /basic examples -->
    
@endsection