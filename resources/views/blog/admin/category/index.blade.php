@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ route('blog.admin.categories.create') }}">Add</a></li>
            </ul>
        </nav>
           <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

            @foreach ($paginator as $item)

           <div class="card-header" id="card"># : {{ $item->id }}</div>
            <div class="card-body">
              <h5 @if (in_array($item->parent_id, [0, 1])) style="color:grey" @endif>{{ $item->parent_id }}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div> 
            <br>

            @endforeach
          
          </div>
        </div>
    </div>
    @if($paginator->total() > $paginator->count())
    <br>
    <div class="container">
      <div class="row justify-content-center">
        <div>
          {{ $paginator->Links() }}
        </div>
      </div>
    </div>
    
  @endif
</div>
@endsection