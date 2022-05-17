@extends('admin.layouts.admin_master')


@section('title', 'Edit User')
@section('admin')
<div class="content-wrapper">
    <div class="container-full container">
        <section class="content">
            <h3 class="header mb-5">Edit user:: </h3>
            <hr>
            <div class="row">
                <div class="col-12">
                    <form action="{{route('users.update', $editUser->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control @error('name') border-danger @enderror "
                                            value="{{ $editUser->name }}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control @error('email ') border-danger @enderror"
                                            value="{{ $editUser->email }}">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>User Role <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="usertype" id="select" class="form-control @error('usertype') border-danger @enderror">
                                    <option value="{{ $editUser->usertype }}" selected>Select Role</option>
                                    @if($editUser->usertype == "Admin")
                                        <option value="User">User</option>
                                    @else
                                        <option value="Admin">Admin</option>
                                    @endif

                                    
                                </select>
                                @error('usertype')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input type="submit" value="UPDATE" class="btn-lg btn btn-info mb-5">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection