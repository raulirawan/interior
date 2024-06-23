@extends('layouts.admin')

@section('title', 'Page Edit Project')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Project</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Project
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">

                <div class="card-header">Edit Data Setting</div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" id="form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">About Us</label>
                                    <textarea name="about_us" id="about_us" class="form-control @error('about_us') is-invalid @enderror" cols="30"
                                        rows="10" placeholder="Enter About Us" required>{{ $setting->about_us ?? '' }}</textarea>
                                    @error('about_us')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $setting->phone ?? '' }}" name="phone" placeholder="Enter Phone"
                                        required>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Link WhatsApp</label>
                                    <input type="text" class="form-control @error('link_whatsapp') is-invalid @enderror"
                                        value="{{ $setting->link_whatsapp ?? '' }}" name="link_whatsapp"
                                        placeholder="Enter Link WhatsApp" required>
                                    @error('link_whatsapp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $setting->email ?? '' }}" name="email" placeholder="Enter Email"
                                        required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Address</label>
                                    <textarea name="address" id="editor" class="form-control @error('address') is-invalid @enderror" id="address"
                                        cols="30" rows="10" placeholder="Enter Address" required>{{ $setting->address ?? '' }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                <a href="{{ route('admin.settings.index') }}"
                                    class="btn btn-light-secondary me-1 mb-1">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
