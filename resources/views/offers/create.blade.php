@extends('layouts.app')

@section('content')
    <form action="create" method="post">
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">name</label>
          <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="name">
          <small id="helpId" class="form-text text-muted">Help text</small>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">price</label>
            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="price">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">details</label>
            <input type="text" class="form-control" name="details" id="details" aria-describedby="helpId" placeholder="details">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>
          <div class="mb-3">
              <input type="submit" value="send">
          </div>
    </form>
@endsection