@extends('layouts.sidebar')

@section('content')
<main class="common_main">
  <div>
    <div>
      <h2>表示するエリア</h2>
      <p>
        <select name="area">
        <option value="名古屋中心部">名古屋中心部</option>
        <option value="名古屋北部">名古屋北部</option>
        <option value="名古屋南部">名古屋南部</option>
        <option value="三河">三河</option>
        <option value="岐阜三重尾張">岐阜三重尾張</option>
        </select>
        </p>
    </div>
  </div>
  <div>
    <div>
      <h2>いつのデータを表示しますか？</h2>
      <form action="hashtag" method="GET">
        <input type="month" name="from" placeholder="from_date">
            <span class="mx-3 text-grey">~</span>
        <input type="month" name="until" placeholder="until_date">
        <button type="submit">検索</button>
    </form>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>店名</th>
        <th>コード</th>
        <th>エリア</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
    </thead>
    <tbody>
      
        <tr>
          <td>test</td>
          <td>test</td>
          <td>area</td>
          <td>
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
