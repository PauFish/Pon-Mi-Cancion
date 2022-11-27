@extends('layouts.app')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Student</div>
  <div class="card-body">
       
      <form action="{{ url('student/' .$parties->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$parties->id}}" id="id" />
        <label>Nombre</label></br>
        <input type="text" name="name" id="name" value="{{$parties->name}}" class="form-control"></br>
        <label>Photo</label></br>
        <input type="text" name="photo" id="photo" value="{{$parties->address}}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success"></br>

    </form>
    
  </div>
</div>
  
@stop