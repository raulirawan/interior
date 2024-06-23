@extends('layouts.admin')

@section('title', 'Page Testimonials')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Testimonials</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Testimonials
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">

                <div class="card-header">Table Testimonials</div>
                <div class="card-body">
                    <a href="{{ route('admin.testimonials.generate') }}" onclick="return confirm('Are You Sure?')"
                        type="button" class="btn btn-success mb-3">
                        Generate Testimonial
                    </a>

                    <!--Basic Modal -->

                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->name ?? '-' }}</td>
                                        <td>{{ $item->email ?? '-' }}</td>
                                        <td>
                                            <a href="https://google.com" id="copy-url" class="btn btn-success btn-sm">Copy
                                                Url</a>
                                            <button href="" class="btn btn-info btn-sm" id="detail"
                                                data-testimoni="{{ $item->testimoni ?? '-' }}" data-bs-toggle="modal"
                                                data-bs-target="#modal-detail">Detail</button>
                                            <a href="{{ route('admin.testimonials.delete', $item->id) }}"
                                                onclick="return confirm('Yakin ?')" class="btn btn-danger btn-sm">Hapus</a>
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


    <div class="modal fade text-left" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form action="#" id="form-edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Form Edit Data Category</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Testimoni</label>
                                    <textarea cols="20" rows="10" id="testimoni" class="form-control" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('down-style')
        <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/fontawesome.css" />
        <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/datatables.css" />
    @endpush
    @push('down-script')
        <script src="{{ asset('assets') }}/js/extensions/datatables.js"></script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '#detail', function() {
                    var testimoni = $(this).data('testimoni');
                    $('#testimoni').val(testimoni);
                });

                $(document).on('click', '#copy-url', function(event) {

                    event.preventDefault(); // Prevent the default link behavior

                    // Get the href attribute of the link
                    var link = $(this).attr('href');

                    // Create a temporary input element
                    var input = $('<input>');
                    $('body').append(input);

                    // Set the value of the input to the link
                    input.val(link).select();

                    // Copy the selected text
                    document.execCommand('copy');

                    // Remove the temporary input element
                    input.remove();

                    // Alert the user that the link has been copied
                    alert('Link copied to clipboard: ' + link);
                });
            });
        </script>
    @endpush

@endsection
