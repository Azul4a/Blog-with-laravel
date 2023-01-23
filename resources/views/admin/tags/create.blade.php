@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create tag</h1>
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
                        <form action="{{ route('tag.store') }}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <label for="title">Tag name</label>
                                <input type="text" name="title" id="title"
                                       class="form-control @error('title') is-invalid @enderror" placeholder="Tag name">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Create">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
