@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post Tags</h1>
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

                <a href="{{ route('tag.create') }}" class="btn btn-primary mb-3" tabindex="-1" role="button"
                   aria-disabled="true">Add New Tag</a>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Post count</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">{{ $tag->id }}</th>
                            <td>
                                <a href="{{ route('tag.edit', $tag->id) }}">
                                    {{ $tag->title }}
                                </a>
                            </td>
                            <td>{{ $tag->posts_count }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
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
                    {{ $tags->withQueryString()->links() }}
                </div>

            </div>
        </section>
    </div>
@endsection
