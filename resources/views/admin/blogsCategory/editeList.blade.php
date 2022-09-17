@extends('admin.defoult.defoultDashboard')
@section('title', 'Blog Edite Form')
@section('breadcrumb', 'Edite Category')


@section('content')

	<!-- Basic examples -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Edite Blog Category</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('blogCategory.update', $blogCategoryInfo->id) }}" method="POST" enctype="multipart/form-data">
                <fieldset class="content-group">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="name">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $blogCategoryInfo->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="status">Select Status</label>
                        <div class="col-lg-10">
                            <select name="status" id="status" class="form-control">
                                <option value="1" @if ( $blogCategoryInfo->status == 1 ) Selected @endif > Active</option>
                                <option value="0" @if ( $blogCategoryInfo->status == 0 ) Selected @endif >In Active</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <a href="{{ route('blogCategory.index') }}" class="btn btn-default">Back To List</a>
                    <button type="submit" class="btn btn-primary" name="add_users">Update </button>
                </div>
            </form>
        </div>
    </div>
    <!-- /basic examples -->
    
@endsection