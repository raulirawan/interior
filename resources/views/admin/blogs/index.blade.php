@extends('layouts.admin')

@section('title', 'Page Blogs')


@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Blogs</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Blogs
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">

                <div class="card-header">Table Blogs</div>
                <div class="card-body">
                    <a href="{{ route('admin.blogs.create') }}"class="btn btn-success mb-3">
                        Add Blog
                    </a>

                    <!--Basic Modal -->

                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 20%">Date</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->date)->format('d F Y H:i:s') }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="{{ $item->image }}" style="width: 100px">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.blogs.edit', $item->id) }}" class="btn btn-info btn-sm"
                                                id="edit">Edit</a>
                                            <a href="{{ route('admin.blogs.delete', $item->id) }}"
                                                onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
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
