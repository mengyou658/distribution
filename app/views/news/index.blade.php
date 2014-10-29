@extends('layout')

@section('content')
<div class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".deliver-source">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand visible-xs" href="/">分享</a>
      </div>

      <div class="collapse navbar-collapse deliver-source" >
<form class="navbar-form text-center deliver-source-form" role="search">
<div class="form-group">
  <input type="text" class="form-control deliver-source-input" placeholder="">
</div>
<button type="submit" class="btn btn-primary btn-wide deliver-source-submit">分享</button>
</form>
      </div>
    </div>
</div>
news.index
@stop