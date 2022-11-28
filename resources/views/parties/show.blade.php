@extends('layouts.app')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Esta Es Tu Fiesta</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Name : {{ $parties->name }}</h5>
        <p class="card-text">Address : {{ $parties->photo }}</p>
  </div>
    </hr>
  </div>
</div>