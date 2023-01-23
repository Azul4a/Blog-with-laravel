@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post Categories</h1>
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

                <a href="{{ route('category.create') }}" class="btn btn-primary mb-3" tabindex="-1" role="button"
                   aria-disabled="true">Add New Category</a>

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

                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}">
                                    {{ $category->title }}
                                </a>
                            </td>
                            <td>{{ $category->posts_count }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
                    {{ $categories->withQueryString()->links() }}
                </div>

            </div>
        </section>
    </div>
@endsection
