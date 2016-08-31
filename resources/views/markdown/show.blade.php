@extends('layouts.master')

@section('content')

  <h1>Markdown playground</h1>

  <ul>
      @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>


  @if(Session::has('message'))
      <div class="alert alert-info">
        {{Session::get('message')}}
      </div>
  @endif


  @if(Session::has('markdown'))
    <div class="panel panel-default">
      <div class="panel-body">
        {!! Session::get('markdown') !!}
      </div>
    </div>
  @endif



  {{ Form::open(array(
      'route'       => 'markdown.show',
      'class' => 'form'
  )) }}
  <div class="form-group">
  {{ Form::label('markdown', 'Markdown text') }}

  {{ Form::textarea('markdown_text', null,
     array('required',
              'class'=>'form-control',
              'id' => 'markdown_text')) }}
  </div>

  <div class="form-group">
      {!! Form::submit('Submit',
        array('class'=>'btn btn-primary')) !!}
  </div>
  {{ Form::close() }}


  {{ Form::open(array(
      'route'       => 'markdown.download',
      'class' => 'form'
  )) }}
  <div class="form-group">
  {{ Form::label('markdown', 'Markdown text') }}

  {{ Form::textarea('markdown_text', null,
     array('required',
              'class'=>'form-control',
              'id' => 'markdown_text')) }}
  </div>

  <div class="form-group">
      {!! Form::submit('Download PDF',
        array('class'=>'btn btn-primary')) !!}
  </div>
  {{ Form::close() }}

@stop
