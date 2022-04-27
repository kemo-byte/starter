
@extends('layouts.app')

@section('content')


<div class="container">
  @if(Session::has('errors')) 
  <div class="alert alert-danger">
    {{Session::get('errors')}}
  </div>
@endif
  @if(Session::has('success')) 
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
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
              <td><a class="btn btn-info" style="color:white" href="/offers/edit/{{$offer->id}}">Edit</a></td>

            </tr>
          @endforeach  
        </tbody>
      </table>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
  


@endsection