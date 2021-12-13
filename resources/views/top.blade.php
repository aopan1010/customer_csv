@extends('layouts.sidebar')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">営業リスト一覧</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          トップページです
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
