@extends('admin.layouts.admin_master')


@section('title', 'Add Users')
@section('admin')
<div class="content-wrapper">
    <div class="container-full container">
        <section class="content">
            <h3 class="header mb-5">Add new user</h3>
            <hr>
            <div class="row">
                <div class="col-12">
                    <form action="{{route('users.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control @error('name') border-danger @enderror " required
                                            value="{{ old('name') }}">
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
                                        <input type="email" name="email" class="form-control @error('email ') border-danger @enderror" required
                                            value="{{ old('email') }}">
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
                                <select name="usertype" id="select" required class="form-control @error('usertype') border-danger @enderror">
                                    <option value="" selected disabled>Select Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                                @error('usertype')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password" class="form-control @error('password') border-danger @enderror" required />
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Confirm Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password_confirmation"
                                           class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="controls">
                                <input type="submit" value="SUBMIT" class="btn-lg btn btn-primary mb-5">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection