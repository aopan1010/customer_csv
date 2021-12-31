@extends('layouts.sidebar')

@section('content')
    <main class="common_main">
        <form action="route {{ 'serach' }}" method="POST">
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
                    <input type="month" name="from" placeholder="from_date">
                    <button type="submit">検索</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>店名</th>
                    <th>コード</th>
                    <th>エリア</th>
                    <th>訪店</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key)
                    <tr>
                        <td>{{ $key['customer_name'] }}</td>
                        <td>{{ $key['customer_code'] }}</td>
                        <td>{{ $key['area'] }}</td>
                        <td>
                            <a href="/" class="btn btn-info">訪店</a>
                        </td>
                        <td>
                            <a href="/" class="btn btn-danger">削除</a>
                        </td>
                @endforeach

                </tr>
            </tbody>
        </table>
        {{ $customers->links() }}
    </main>
@endsection
