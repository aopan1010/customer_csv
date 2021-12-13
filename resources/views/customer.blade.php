@extends('layouts.sidebar')

@section('content')
<main class="common_main">
  <div>
    <div>
      <a href="/" class="btn btn-primary">作成</a>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>店名</th>
        <th>コード</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
    </thead>
    <tbody>
      
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <div>
              <a href="/" class="btn btn-info">編集</a>
            </div>
          </td>
          <td>
            <div>
              <a href="/" class="btn btn-danger">削除</a>
            </div>
          </td>
        </tr>
      
    </tbody>
  </table>
</main>
@endsection
