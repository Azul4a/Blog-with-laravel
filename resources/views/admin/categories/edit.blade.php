@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit category</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            {{--                            {{ Breadcrumbs::render() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('category.update', $category->id) }}" method="POST" class="w-25">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="title">Category name</label>
                                <input type="text" name="title" id="title"
                                       class="form-control @error('title') is-invalid @enderror" placeholder="Category name" value="{{ $category->title }}">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
