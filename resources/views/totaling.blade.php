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


        <table class="table table-dark table-striped table-bordered">

            <thead class="thead-light">
                <tr>
                    <th>エリア</th>
                    <th>訪店率</th>
                </tr>
            </thead>
            @if (isset($area_counts) || isset($check_counts))
                @foreach ($check_counts as $check_count)
                    @foreach ($area_counts as $area_count)
                        <tr>
                            <td>
                                名古屋中心部
                            </td>
                            <td>
                                @if ($check_count === 0 || $area_count === 0)
                                    <p>データなし</p>
                                @else
                                    @php
                                        echo round(($check_count / $area_count) * 100);
                                    @endphp
                                    %
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                名古屋北部
                            </td>
                            <td>
                                @if ($check_count === 0 || $area_count === 0)
                                    <p>データなし</p>
                                @else
                                    @php
                                        echo round(($check_count / $area_count) * 100);
                                    @endphp
                                    %
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td>
                                名古屋南部
                            </td>
                            <td>
                                @if ($check_count === 0 || $area_count === 0)
                                    <p>データなし</p>
                                @else
                                    @php
                                        echo round(($check_count / $area_count) * 100);
                                    @endphp
                                    %
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td>
                                三河
                            </td>
                            <td>
                                @if ($check_count === 0 || $area_count === 0)
                                    <p>データなし</p>
                                @else
                                    @php
                                        echo round(($check_count / $area_count) * 100);
                                    @endphp
                                    %
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                岐阜三重尾張
                            </td>
                            <td>
                                @if ($check_count === 0 || $area_count === 0)
                                    <p>データなし</p>
                                @else
                                    @php
                                        echo round(($check_count / $area_count) * 100);
                                    @endphp
                                    %
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                土肥さん
                            </td>
                            <td>
                                @if ($check_count === 0 || $area_count === 0)
                                    <p>データなし</p>
                                @else
                                    @php
                                        echo round(($check_count / $area_count) * 100);
                                    @endphp
                                    %
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            @endif
        </table>

    @endsection
