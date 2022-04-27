@extends('layouts.app')

@section('content')
    @if(Session::has('success')) 
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif

  <div class="container text-right" dir="rtl">
    <h1>{{ __('messages.Add New Offer')}}</h1>
    <div class="row">
<form action="update" method="post">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">{{__('messages.name_en')}}</label>
      <input type="text" class="form-control" name="name_en" value="{{$offer->name_en}}" id="name_en" aria-describedby="helpId" placeholder="{{__('messages.name_en')}}">
      <small id="helpId" class="form-text text-muted">Help text</small>
      @error('name_en')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="" class="form-label">{{__('messages.name_ar')}}</label>
      <input type="text" class="form-control" name="name_ar" id="name_ar" aria-describedby="helpId" placeholder="{{__('messages.name_en')}}">
      <small id="helpId" class="form-text text-muted">Help text</small>
      @error('name_ar')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
        <label for="" class="form-label">price</label>
        <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="price">
        <small id="helpId" class="form-text text-muted">Help text</small>
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      </div>

      <div class="mb-3">
        <label for="" class="form-label">english details</label>
        <input type="text" class="form-control" name="details_en" id="details_en" aria-describedby="helpId" placeholder="details">
        <small id="helpId" class="form-text text-muted">Help text</small>
        @error('details_en')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      </div>

      <div class="mb-3">
        <label for="" class="form-label">arabic details</label>
        <input type="text" class="form-control" name="details_ar" id="details_ar" aria-describedby="helpId" placeholder="details">
        <small id="helpId" class="form-text text-muted">Help text</small>
        @error('details_ar')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      </div>
      <div class="mb-3">
          <input type="submit" value="send">
      </div>
</form>
  </div>
</div>
    
@endsection