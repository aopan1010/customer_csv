@extends('layouts.sidebar')

@section('content')
    <main class="common_main">
        @if (session('flash_message'))
            <div class="flash_message">
                {{ session('flash_message') }}
            </div>
        @endif

        <form action="{{ route('customer') }}" method="GET">
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
                    <input type="date" name="from" placeholder="from_date">
                    <span class="mx-3 text-grey">~</span>
                    <input type="date" name="until" placeholder="until_date">
                    {{ csrf_field() }}
                    <button type="submit">検索</button>
                </div>
            </div>
        </form>
        <form action="{{ route('check') }}" method="POST">
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <tr>
                        <th>店名</th>
                        <th>コード</th>
                        <th>エリア</th>
                        <th>訪店</th>
                        <th>メモ/備考</th>
                        <th>登録日</th>

                    </tr>
                </thead>

                <tbody>

                    @foreach ($customers as $key)
                        <tr>
                            <td>{{ $key['customer_name'] }}</td>
                            <td>{{ $key['customer_code'] }}</td>
                            <td>{{ $key['area'] }}</td>
                            <td>
                                <div class="btn1_wrap">
                                    <input name="check[{{ $key['id'] }}]" type="hidden" value="0">
                                    <input name="check[{{ $key['id'] }}]" value="1" id="btn_demo{{ $key['id'] }}"
                                        type="checkbox" @if ($key['check'] === 1)checked @elseif($key['check'] === 0)0 @endif>
                                    <label for="btn_demo{{ $key['id'] }}">
                                        <span>訪店</span>
                                    </label>

                                </div>
                            </td>
                            <td>
                                <textarea name="context[]" id="" cols="50" rows="3">{{ $key['memo'] }}</textarea>
                                <input type="submit" value="保存する" class="btn btn--yellow btn--cubic">
                            </td>
                            <td>
                                {{ $key['updated_at'] }}
                            </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            {{ csrf_field() }}
            <input type="submit" value="保存する" class="btn btn--yellow btn--cubic">
        </form>

    </main>
@endsection
