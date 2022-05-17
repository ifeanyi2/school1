@extends('admin.layouts.admin_master')


@section('title', ' Edit User Profile :: '.$user->name)
@section('admin')
<div class="content-wrapper">
    <div class="container-full container">
        <section class="content">
            <div class="row">
                   <div class="col-12">
                    <form action="{{ route('profile.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Name </h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control @error('name') border-danger @enderror "
                                            value="{{ $user->name }}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Email </h5>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control @error('email ') border-danger @enderror"
                                            value="{{ $user->email }}">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Profile Image </h5>
                                    <div class="controls">
                                        <input id="image" type="file" name="image" class="form-control @error('image') border-danger @enderror"
                                            value="{{ $user->image }}">
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Current Profile Image </h5>
                                    <div class="controls">
                                       <img src="{{ (!empty($user->image))? url('uploads/user_images/'.$user->image) : url('uploads/no_image.jpg') }}" style="width: 90px" alt="image" id="showImage" class="img-responsive">
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Facebook Link </h5>
                                    <div class="controls">
                                        <input type="text" name="facebook" class="form-control @error('facebook') border-danger @enderror "
                                            value="{{ $user->facebook }}">
                                            @error('facebook')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Twitter Link </h5>
                                    <div class="controls">
                                        <input type="text" name="twitter" class="form-control @error('twitter ') border-danger @enderror"
                                            value="{{ $user->twitter }}">
                                        @error('twitter')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>LinkedIn Link </h5>
                                    <div class="controls">
                                        <input type="text" name="linkedin" class="form-control @error('linkedin') border-danger @enderror "
                                            value="{{ $user->linkedin }}">
                                            @error('linkedin')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Gender</h5>
                                    <div class="controls">
                                       <select name="gender" id="" class="form-control">
                                           <option value="" selected="" disabled>Select Gender</option>
                                           <option value="Male" 
                                           {{ $user->gender == "Male" ? "selected" : "" }}>
                                           Male
                                        </option>
                                           <option value="Female" 
                                           {{ $user->gender == "Female" ? "selected" : "" }}>
                                           Female
                                        </option>
                                       </select>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Mobile</h5>
                            <div class="controls">
                                <input type="text" name="mobile" id="" class="form-control">
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <h5>Address </h5>
                            <div class="controls">
                                <input type="text" name="address" id="" class="form-control">
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
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage').attr('src', e.target.result)
          }
          reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection