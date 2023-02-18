@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
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

                <a href="{{ route('admin.post.create') }}" class="btn btn-primary" tabindex="-1" role="button"
                   aria-disabled="true">Add New</a>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Category</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Likes</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>
                                <a href="{{ route('post.show', $post->id) }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->category->title }}</td>
                            <td>
                                @foreach ($post->tags as $postTag)
                                    {{ $postTag->title }}
                                @endforeach
                            </td>
                            <td>{{ $post->likes }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="sec-btn btn btn-danger del">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $posts->withQueryString()->links() }}
                </div>

            </div>
        </section>
    </div>
@endsection
