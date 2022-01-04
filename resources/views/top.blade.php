@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome!</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        サイトマップ
                        <li class="">
                            <a class="" href="{{ route('index_import') }}">CSVインポート</a>
                        </li>
                        <li class="">
                            <a class="" href="{{ route('customer') }}">顧客管理画面</a>
                        </li>
                        <li class="">
                            <a class="" href="{{ route('index_totaling') }}">訪店率集計</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
