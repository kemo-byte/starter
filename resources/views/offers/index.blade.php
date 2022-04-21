
@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">{{__('messages.name')}}</th>
            <th scope="col">{{__('messages.price')}}</th>
            <th scope="col">{{__('messages.details')}}</th>
          </tr>
        </thead>
        <tbody>
    
          @foreach($offer as $offer)
            <tr>
              <td>{{ $offer->name }}</td>
              <td>{{ $offer->price }}</td>
              <td>{{ $offer->details }}</td>
            </tr>
          @endforeach  
        </tbody>
      </table>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
  


@endsection