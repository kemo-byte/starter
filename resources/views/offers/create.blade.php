@extends('layouts.app')

@section('content')
    @if(Session::has('success')) 
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif

  <div class="container text-right" dir="rtl">
    <div class="row">
<form action="create" method="post">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="name">
      <small id="helpId" class="form-text text-muted">Help text</small>
      @error('name')
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
        <label for="" class="form-label">details</label>
        <input type="text" class="form-control" name="details" id="details" aria-describedby="helpId" placeholder="details">
        <small id="helpId" class="form-text text-muted">Help text</small>
        @error('details')
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