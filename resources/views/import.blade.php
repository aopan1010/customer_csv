@extends('layouts.sidebar')
@section('content')
<form action="import/upload" method="post" enctype="multipart/form-data" id="csvUpload">
<input type="file" value="ファイルを選択" name="csv">
{{ csrf_field() }}
<button type="submit">インポート</button>
</form>
@endsection
