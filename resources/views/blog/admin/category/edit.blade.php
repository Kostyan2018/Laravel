@extends('layouts.layout')

@section('content')
    @php
       /** @var \App\Models\BloCategory $item */
    @endphp

<form action="{{ route('blog.admin.categories.update', $item->id) }}" method="post">
    @method('PATCH')
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.category.includes.item_edit_main_col')
            </div>
            <div class="col-md-3">
                @include('blog.category.includes.item_edit_add_col')
            </div>
        </div>
    </div>
</form>
@endsection