@extends('layouts.admin')

@section('title', 'Page Settings')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Settings</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Settings
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">

                <div class="card-header">Table Settings</div>
                <div class="card-body">
                    <a href="{{ route('admin.settings.edit') }}" type="button" class="btn btn-success mb-3">
                        Edit Settings
                    </a>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 300px;">About US</th>
                                <td>{{ $setting->about_us ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th style="width: 300px;">Phone</th>
                                <td>{{ $setting->phone ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th style="width: 300px;">Link WhatsApp</th>
                                <td>{{ $setting->link_whatsapp ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th style="width: 300px;">Email</th>
                                <td>{{ $setting->email ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th style="width: 300px;">Address</th>
                                <td>{{ $setting->address ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>


    @push('down-style')
        <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/fontawesome.css" />
        <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/datatables.css" />
    @endpush
    @push('down-script')
        <script src="{{ asset('assets') }}/js/extensions/datatables.js"></script>
    @endpush

@endsection
