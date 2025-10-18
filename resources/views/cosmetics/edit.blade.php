@extends('admin_master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Banner Two</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/cosmetics')}}">All Banner Two</a></li>
                            <li class="breadcrumb-item active">Edit Banner Two</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Edit Banner Two</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('cosmetics.update',$cosmetic->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="required">*</span></label>
                                    <textarea
                                        class="form-control description"
                                        required=""
                                        name="title"
                                    >
                                    {!!old('title', $cosmetic->title)!!}
                                </textarea>
                                    @error('title')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description <span class="required">*</span></label>
                                    <textarea
                                        class="form-control description"
                                        required=""
                                        name="description"
                                    >
                                    {!!old('description', $cosmetic->description)!!}
                                </textarea>
                                    @error('description')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Image <span class="required">*</span></label>
                                    <input name="image" type="file" id="image" accept="image/*" class="dropify"
                                           data-height="200"
                                           data-default-file="{{ URL::to($cosmetic->image ?: '') }}"
                                    />
                                    @error('image')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group w-100 px-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
