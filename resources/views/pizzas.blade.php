@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
   
    <div class="content">
        <div class="title m-b-md">
            Pizzas list :
        </div>
    @foreach($pizzas as $pizza)
    <p class="pio">{{ $pizza['type'] }} - {{ $pizza['base'] }}</p>        
    @endforeach

    </div>
</div> 
@endsection
