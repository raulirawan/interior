@extends('layouts.admin')

@section('title', 'Page Create Project')

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

                <div class="card-header">Create Data Project</div>
                <div class="card-body">
                    <form action="{{ route('admin.projects.store') }}" id="form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" name="name" placeholder="Enter Name" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="helpInputTop">Category</label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror" required>
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="helpInputTop">Image</label>
                                    <input type="file" class="form-control-file form-control" id="image"
                                        name="image[]" accept="image/*" onchange="previewImage(this)" multiple>
                                    {{-- <div id="image-error" class="invalid-feedback" style="display: block"></div> --}}
                                    <div class="form-text text-muted">
                                        - Please upload an image with a minimum resolution of 1171x540 pixels. <br>
                                        - Extension Image .jpg .png .jpeg<br>
                                        - max size 2MB
                                    </div>
                                    <h5 class="mt-4" id="header-image-preview" style="display: none">Image Preview:</h5>
                                    <div class="mt-3" id="div-image-preview" style="display: none; display: inline-flex">

                                    </div>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Description</label>
                                    <textarea name="description" id="editor" class="form-control @error('description') is-invalid @enderror"
                                        id="description" cols="30" rows="40"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                <a href="{{ route('admin.projects.index') }}"
                                    class="btn btn-light-secondary me-1 mb-1">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
    @push('down-script')
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });

            function previewImage(event) {
                const elem = $(event);
                var files = event.files;
                $("#div-image-preview").empty();
                $("#div-image-preview").show();
                $("#header-image-preview").show();
                if (files.length > 0) {
                    var index = 0;
                    for (var i = 0; i < files.length; i++) {

                        var reader = new FileReader();

                        var file = files[i];
                        if (file) {
                            const tmpImg = new Image();
                            tmpImg.src = window.URL.createObjectURL(file);
                            tmpImg.onload = function() {
                                $(elem).data(`imageWidth${index}`, tmpImg.naturalWidth);
                                $(elem).data(`imageHeight${index}`, tmpImg.naturalHeight);
                            }
                            reader.onload = function(e) {

                                $("<div class='preview-image'>").html(
                                    `<img src="${e.target.result}" alt="${file.name}" class="img-fluid preview" style="max-height: 300px;">`
                                ).appendTo(
                                    "#div-image-preview");

                            }
                            reader.readAsDataURL(file);
                        }
                    }
                }
            }
            $(document).ready(function() {
                // validate jquery
                $.validator.addMethod("filesize", function(value, element, param) {
                    return this.optional(element) || (element.files[0].size <= param);
                }, 'File size must be less than {0} bytes.');


                $.validator.addMethod(
                    "fixDimension",
                    function(value, element, param) {
                        if (element.files.length == 0) return true;
                        for (var i = 0; i < element.files.length; i++) {
                            var width = $(element).data(`imageWidth${i}`);
                            var height = $(element).data(`imageHeight${i}`);
                            if (typeof param[2] === "undefined" || param[2] === null) {
                                if (width == param[0] && height == param[1]) {
                                    return true;
                                }
                                return false;
                            } else {
                                if (width <= param[0] && height <= param[1]) {
                                    return true;
                                }
                                return false;
                            }
                        }

                    },
                    "Please upload an image with dimensions {0}x{1} pixels."
                );


                $("#form").validate({
                    rules: {
                        "image[]": {
                            required: true,
                            extension: "jpg|jpeg|png",
                            filesize: 2097152, // 2 MB in bytes
                            fixDimension: [1171, 540]
                        }
                    },
                    messages: {
                        image: {
                            required: "Please choose an image.",
                            extension: "Please upload a valid image file (jpg, jpeg, png).",
                            filesize: "File size must be less than 2MB.",
                            minResolution: "Image resolution must be at least 370x394 pixels."
                        }
                    },
                    errorElement: "div",
                    errorClass: "invalid-feedback",
                    errorPlacement: function(error, element) {
                        error.insertAfter(element);
                    }
                });

                // $("form").submit(function() {
                //     if (!$(this).valid()) {
                //         return false;
                //     }


                //     return true;
                // });
            });
        </script>
    @endpush
@endsection
