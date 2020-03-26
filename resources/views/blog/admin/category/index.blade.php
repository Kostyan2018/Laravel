@extends('layouts.layout')

@section('contant')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ route('blog.admin.categories.create') }}">Add</a></li>
            </ul>
        </nav>
           <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

            @foreach ($collection as $item)
           <div class="card-header"># : {{ $item->id }}</div>
            <div class="card-body">
              <h5 class="card-title">Primary card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div> 
            @endforeach
          
          </div>
        </div>
    </div>
</div>

@endsection