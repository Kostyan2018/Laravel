@extends('layouts.layout')

@section('content')
<style>

  /* .pag{
    margin-top: 100px;
  } */
  .card{
    margin: 10px;
    min-width: 450px;
  }
  /* .container{
    height: 50vh;
  } */
</style>
<div class="container">
  
  <div class="row justify-content-center">
    
            @foreach ($paginator as $item)
            <div class="card">
              <h5 class="card-header">№ : {{ $item->id }}</h5>
              <div class="card-body">
                <h5 class="card-title" @if (in_array($item->parent_id, [0, 1])) style="color:red" @endif>
                  Parent_id : {{ $item->parent_id }}
                </h5>
              <p class="card-text">{{ $item->slug }}</p>
              <a href="{{ route('blog.admin.categories.edit', $item->id) }}" class="btn btn-primary">Edit</a>
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
</div><a class="btn btn-primary btn-lg btn-block" href="{{ route('blog.admin.categories.create') }}" role="button">Add</a>
@endsection