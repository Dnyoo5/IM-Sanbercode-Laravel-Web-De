
@extends('layout.master')

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-10">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Profile Details</h3>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
                </div>
                <div class="card-body p-9">
                    {{-- Full Name --}}
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->name }}</span>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Email</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->email }}</span>
                        </div>
                    </div>

                     <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Role</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->role ?? '-' }}</span>
                        </div>
                    </div>

                    {{-- Age --}}
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Age</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $profile?->age ?? '-' }}</span>
                        </div>
                    </div>



                    {{-- Address --}}
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Address</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $profile?->address ?? '-' }}</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
