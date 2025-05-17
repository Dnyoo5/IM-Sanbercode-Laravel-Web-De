@extends('layout.master')

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-10">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Edit Profile</h3>
                    </div>
                </div>
                <div class="card-body border-top p-9">
                    <form  class="form" method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="name" class="form-control form-control-lg form-control-solid"
                                    placeholder="Full name" value="{{ old('name', $user->name) }}" required />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Email</label>
                            <div class="col-lg-8 fv-row">
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid"
                                    value="{{ $user->email }}" readonly />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Age</label>
                            <div class="col-lg-8 fv-row">
                                <input type="number" min="1" name="age" class="form-control form-control-lg form-control-solid"
                                    value="{{ old('age', $profile->age ?? '') }}" />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Address</label>
                            <div class="col-lg-8 fv-row">
                                <textarea name="address" class="form-control form-control-lg form-control-solid"
                                    placeholder="Address">{{ old('address', $profile->address ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">New Password</label>
                            <div class="col-lg-8 fv-row">
                                <input type="password" name="password" class="form-control form-control-lg form-control-solid"
                                    placeholder="New Password" />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Confirm Password</label>
                            <div class="col-lg-8 fv-row">
                                <input type="password" name="password_confirmation" class="form-control form-control-lg form-control-solid"
                                    placeholder="Confirm Password" />
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
