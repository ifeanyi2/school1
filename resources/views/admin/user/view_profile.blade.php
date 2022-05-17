@extends('admin.layouts.admin_master')


@section('title', 'User Profile :: '.$user->name)
@section('admin')
<div class="content-wrapper">
    <div class="container-full container">
        <section class="content">
            <div class="row">
                  <div class="col-12 col-lg-12 col-xl-12">
				   
				  <div class="box box-inverse bg-img" data-overlay="2">
                        <div class="flexbox px-20 pt-20">
						<label class="toggler toggler-danger text-white">
						  <a href="{{ route('profile.edit') }}" class="btn btn-success"> <i class="fa fa-edit"></i> Edit</a>
						 
						</label>
						
					  </div>
					  <div class="box-body text-center pb-50">
						<a href="{{ route('profile.view') }}">
						  <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($user->image))? url('uploads/user_images/'.$user->image) : url('uploads/no_image.jpg') }}" alt="{{ $user->name }}">
						</a>
						<h3 class="mt-2 mb-0">
                            <a class="hover-primary text-white" href="{{ route('profile.view') }}">
                                {{ $user->name }}
                            </a>
                        </h3>
						<span class="text-success"><i class="fa fa-cog w-20"></i> {{ $user->usertype }}</span>
					  </div>

					  <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
						<li>
						  <h3 class="text-info">Facebook</h3><br>
						  <span class="font-size-20"><a target="_blank" href="{{ $user->facebook }}" class="line"><div class="fa fa-eye text-info"></div></a></span>
						</li>
						<li>
						  <h3 class="text-primary">Twitter</h3><br>
						  <span class="font-size-20"><a target="_blank" href="{{ $user->twitter }}" class="line"><div class="fa fa-eye text-primary"></div></a></span>
						</li>
						<li>
						  <h3 class="text-primary">LinkedIn</h3><br>
						  <span class="font-size-20"><a target="_blank" href="{{ $user->linkedin }}" class="line"><div class="fa fa-eye text-success"></div></a></span>
						</li>
					
					  </ul>
					</div>				

				  <!-- Profile Image -->
				  <div class="box">
					<div class="box-body box-profile">            
					  <div class="row">
						<div class="col-12">
							<div>
								<p>Email :<span class="text-gray pl-10">{{ $user->email }}</span> </p>
								<p>Phone :<span class="text-gray pl-10">{{ $user->mobile }}</span></p>
								<p>Address :<span class="text-gray pl-10">{!! $user->address !!}</span></p>
								<p>Gender :<span class="text-gray pl-10">{{  $user->gender  }}</span></p>
							</div>
						</div>
						
						
					  </div>
					</div>
					<!-- /.box-body -->
                </div>
			  </div>
            </div>
        </section>
    </div>
</div>

@endsection