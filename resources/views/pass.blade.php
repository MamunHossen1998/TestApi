@extends('layout')

@section('content')

      <ul>
        @foreach ($customer as $element)
          <li>{{ $element }}</li>
        @endforeach
      </ul>


@endsection
