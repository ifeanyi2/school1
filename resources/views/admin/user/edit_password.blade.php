@extends('admin.layouts.admin_master')


@section('title', ' Update Password')
@section('admin')
<div class="content-wrapper">
    <div class="container-full container">
        <section class="content">
            <div class="row">
                   <div class="col-12">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                       
                        <div class="form-group">
                            <h5>Current password</h5>
                            <div class="controls">
                                <input type="password" name="current_password" id="" class="form-control">
                                @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <h5>Password </h5>
                            <div class="controls">
                                <input type="password" name="password" id="" class="form-control">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Confirm password </h5>
                            <div class="controls">
                                <input type="password" name="password_confirmation" id="" class="form-control">
                                @error('address')
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
