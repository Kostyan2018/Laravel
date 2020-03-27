@extends('layouts.layout')

@section('content')
<style>

  .pag{
    margin-top: 100px;
  }
  .card{
    margin: 10px;
  }
</style>
<div class="container">
  <div class="row justify-content-center">
    
            @foreach ($paginator as $item)
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                {{-- <div class="col-md-4">
                  <img src="..." class="card-img" alt="...">
                </div> --}}
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"># : {{ $item->id }}</h5>
                    <p class="card-text" @if (in_array($item->parent_id, [0, 1])) style="color:red" @endif>Parent_id : {{ $item->parent_id }}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

  </div>
    @if($paginator->total() > $paginator->count())
    <div class="container">
      <div class="row justify-content-center">
        <div class="pag">
          {{ $paginator->Links() }}
        </div>
      </div>
    </div>    
    @endif

    <a class="btn btn-primary btn-lg btn-block" href="{{ route('blog.admin.categories.create') }}" style="margin-top:10px" role="button">Add</a>
</div>
@endsection