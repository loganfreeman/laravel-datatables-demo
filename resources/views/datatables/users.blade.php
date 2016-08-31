@extends('layouts.master')

@section('head')
  {!! SEOMeta::generate() !!}
  {!! OpenGraph::generate() !!}
  {!! Twitter::generate() !!}
      <!-- OR -->
  {!! SEO::generate() !!}

    <!-- MINIFIED -->
  {!! SEO::generate(true) !!}
@stop

@section('content')
<div class="table-responsive">
  <table class="table table-striped table-inverse table-hover">
      <thead class="thead-default">
        <tr class="bg-primary">
          <th>Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
          </tr>
      @endforeach
      </tbody>
  </table>
</div>
@stop
