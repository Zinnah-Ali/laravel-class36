@extends('admin.defoult.defoultDashboard')
@section('title', 'Blog Add Form')
@section('breadcrumb', 'Add Blog')


@section('content')

	<!-- Basic examples -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Add New Blog</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                <fieldset class="content-group">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Title</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="title" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="sub_title">Sub Title</label>
                        <div class="col-lg-10">
                            <input type="sub_title" class="form-control" name="sub_title" id="sub_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="details">Details</label>
                        <div class="col-lg-10">
                            <textarea type="text" class="form-control" name="details" id="details" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="status">Select Status</label>
                        <div class="col-lg-10">
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <a href="{{ route('blog.index') }}" class="btn btn-default">Back To Blog List</a>
                    <button type="submit" class="btn btn-primary" name="add_users">Add Blog </button>
                </div>
            </form>
        </div>
    </div>
    <!-- /basic examples -->
    
@endsection