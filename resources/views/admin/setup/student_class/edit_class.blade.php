@extends('admin.layouts.admin_master')


@section('title', ' Edit Class: '.$data->name)
@section('admin')
<div class="content-wrapper">
    <div class="container-full container">
        <section class="content">
            <div class="row">
                   <div class="col-12">
                       <h1>Edit Student class</h1>
                       <hr> 
                    <form action="{{ route('update.student.class', $data->id) }}" method="POST">
                        @csrf
                       
                        <div class="form-group">
                            <h5>Student Class</h5>
                            <div class="controls">
                                <input type="text" name="name" id="" class="form-control" value="{{ $data->name }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                     

                        <div class="form-group">
                            <div class="controls">
                                <input type="submit" value="UPDATE" class="btn btn-primary mb-5">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
