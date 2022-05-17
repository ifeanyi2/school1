@extends('admin.layouts.admin_master')


@section('title', 'Users')
@section('admin')
<div class="content-wrapper">
    <div class="container-full container">

        <div class="row mt-5">
            <div class="col-12 mt-5" style="margin-top: 20px">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Users Data Table</h3>
                        <a style="float: right" href="{{ route('users.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Date Joined</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $n = 1;
                                    @endphp
                                    @if(count($allData) > 0)
                                        @foreach($allData as $value)
                                            <tr>
                                                <td>{{ $n++ }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>
                                                    <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($value->image))? url('uploads/user_images/'.$value->image) : url('uploads/no_image.jpg') }}" alt="{{ $value->name }}" style="width: 90px !important">
                                                </td>
                                                <td>{{ $value->usertype }}</td>
                                                <td>
                                                    {{ $value->created_at->toFormattedDateString()  
                                                    }}
                                                </td>
                                                <td>
                                                    <a title="Edit User" href="{{ route('users.edit', $value->id) }}" class="btn btn-info btn-small"><i class="fa fa-edit"></i></a>

                                                    <a href="{{ route('users.delete', $value->id) }}" class="btn btn-small btn-danger" id="delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                             
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endif


                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
