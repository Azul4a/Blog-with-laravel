@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create post</h1>
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
                    <div class="col-12 w-75">
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="{{ old('title') }}">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="content" class="col-sm-2 col-form-label">Content</label>
                                <textarea name="content" id="summernote">{{ old('content') }}</textarea>
                                @error('content')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="thumbnail">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" class="custom-file-input"
                                               value="{{ old('thumbnail') }}">
                                        <label class="custom-file-label">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('thumbnail')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>Likes</label>
                                    <input type="number" name="likes" class="form-control" id="likes"
                                           placeholder="Likes"
                                           value="{{ old('likes') }}">
                                </div>
                                <div class="col">
                                    <label>Category</label>
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        @foreach ($categories as $category)
                                            <option
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label>Tags</label>
                                <select name="tags[]" class="select2 form-select" multiple="multiple"
                                        data-placeholder="Select tags"
                                        style="width: 100%;">
                                    @foreach ($tags as $tag)
                                        <option
                                            {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
