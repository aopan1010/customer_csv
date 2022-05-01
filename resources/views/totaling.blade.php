@extends('layouts.sidebar')
@section('content')
    <main class="common_main">

        @if (session('flash_message'))
            <div class="flash_message">
                {{ session('flash_message') }}
            </div>
        @endif

        <form action="{{ route('index_totaling') }}" method="GET">

            <div>
                <div>
                    <h2>いつのデータを表示しますか？</h2>
                    <input type="date" name="from" placeholder="from_date" required>
                    <span class="mx-3 text-grey">~</span>
                    <input type="date" name="until" placeholder="until_date" required>
                    {{ csrf_field() }}
                    <button type="submit">検索</button>
                </div>
            </div>
        </form>


        @if (isset($from) && isset($until))
            <p><span class="badge badge-secondary">{{ $from }}</span>から<span
                    class="badge badge-secondary">{{ $until }}</span>のデータです
            </p>
        @endif
        <table class="table table-dark table-striped table-bordered">

            <thead class="thead-light">
                <tr>
                    <th>エリア</th>
                    <th>訪店率</th>
                </tr>
            </thead>
            @if (isset($array))
                @foreach ($array as $area => $value1)
                    <tr>
                        <td>
                            <p>{{ $area }}</p>
                        </td>
                        <td>
                            @if ($value1[0] === 0 || $value1[1] === 0)
                                <p>データなし</p>
                            @else
                                @php
                                    echo round(($value1[1] / $value1[0]) * 100);
                                @endphp
                                %
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif


        </table>
    @endsection
