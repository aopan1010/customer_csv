@extends('layouts.sidebar')
@section('content')
<form action="{{ route('submit_import') }}" method="post" enctype="multipart/form-data" id="csvUpload">
 <h3>インポート先エリア</h3>
  <p>
    <select name="area">
    <option value="名古屋中心部">名古屋中心部</option>
    <option value="名古屋北部">名古屋北部</option>
    <option value="名古屋南部">名古屋南部</option>
    <option value="三河">三河</option>
    <option value="岐阜三重尾張">岐阜三重尾張</option>
    </select>
    </p>
  <h3>データ選択</h3>
<input type="file" value="ファイルを選択" name="csv">
{{ csrf_field() }}
<button type="submit">インポート</button>
</form>
 <!-- フラッシュメッセージ -->
 @if (session('flash_message'))
 <div class="flash_message">
     {{ session('flash_message') }}
 </div>
@endif

@endsection
