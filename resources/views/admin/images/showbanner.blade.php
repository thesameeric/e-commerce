@extends('layouts.admin.main')

@section('title', 'Images - Manage Product Images')

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/app-assets/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/app-assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/app-assets/css/image-grid.css') }}">
    
@endsection

@section('content-header-left')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Images</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}"></a>
                    </li>
                    <li class="breadcrumb-item active">Manage slider images
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content-header-right')
    {{-- <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
            <div class="dropdown-menu arrow" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 40px, 0px);"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
            </div>
        </div>
    </div> --}}
@endsection

@section('content')

    <div class="row">
		<div class="col-md-12">
			<div class="card" style="zoom:" data-height="">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Add Images to <code>slider</code></h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-content collapse show" style="">
					<div class="card-body">
                        @include('layouts.admin.messages')

						<div class="row">

                        <div class="col-md-12">
                        {{ Form::open(['route' => 'slider.store', 'method' => 'POST', 'files' => 'yes', 'class' => 'dropzone form', 'id' => 'myDropzone']) }}

                        {{ Form::close() }}
                        </div>
                    </div>
					</div>
				</div>
                
			</div>
		</div>
	</div>


    <div class="row">
		<div class="col-md-12">
			<div class="card" style="zoom:" data-height="">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">View slider images</h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-content collapse show" style="">
					<div class="card-body">

                        <div class="card-text">
                            <p>Click on image to delete them from this product images.
                        </div>
                
						<div class="row">
                            
                            <div class="row-alt">
                                @foreach ($data['chunks'] as $chunk)
                                    <div class="column">
                                        @foreach ($chunk as $image)
                                                <a href="{{ route('slider.destroy', $image->id) }}" onclick="return confirm('Are you sure you want to delete this image?')">
                                                    <img src="{{ $image->getImageSource() }}" alt="logo" class="img-fluid">
                                                </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                            

                            <div class="col-md-12">
                                <!-- <a href="{{ route('products.index') }}" class="btn btn-primary mt-4 btn-glow"><i class="la la-check"></i>&nbsp;&nbsp;Complete</a> -->
                            </div>
                        </div>

					</div>
				</div>
                
			</div>
		</div>
	</div>

@endsection

@section('scripts')
    <script src="{{ asset('admin/app-assets/js/scripts/dropzone.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/lightbox.min.js') }}"></script>
@endsection