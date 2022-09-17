@extends('admin.defoult.defoultDashboard')
@section('title', 'Blogs Catgegory List')
@section('breadcrumb', 'Blog Category')

@section('content')
    
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Blog Category</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li style="margin-right: 10px; color:#fff; "><a href="{{ route('blogCategory.create') }}" class="btn btn-primary add-new">Add New</a></li>
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
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($blogsCategory))
                    @foreach ($blogsCategory as $key => $blogCategory)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $blogCategory->name }}</td>
                            <td>
                                @if ( $blogCategory->status == 1 )
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">In Active</span>
                                @endif
                                
                            </td>
                            <td class="text-center d-flex">
                                <a href="{{ route('blogCategory.edit', $blogCategory->id) }}"><i class="icon-pencil7"></i></a>
                                <form class="d-inline-flex" action="{{ route('blogCategory.destroy', $blogCategory->id) }}" method="POST">
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