<x-layout>
    <x-slot:title>Test title</x-slot:title>

    {{--    <a href="http://href1">text1</a>--}}
    {{--<ul>--}}
    {{--    @foreach($links as $link)--}}
    {{--        <li><a href="{{$link['href']}}">{{$link['text']}}</a></li>--}}
    {{--    @endforeach--}}
    {{--</ul>--}}

{{--    <table>--}}
{{--        <tr>--}}
{{--            <th>№</th>--}}
{{--            <th>Имя</th>--}}
{{--            <th>Фамилия</th>--}}
{{--            <th>Статус</th>--}}
{{--        </tr>--}}
{{--        @foreach($users as $user)--}}
{{--            @if($user['banned'] !== true)--}}
{{--                <tr style="color: green">--}}
{{--                    @else <tr style="color: red">--}}
{{--                    @endif--}}
{{--                    <td>{{$loop->iteration}}</td>--}}
{{--                    @foreach($user as $key => $elem)--}}
{{--                        @if($key == 'banned' and $elem === true)--}}
{{--                            <td>забанен</td>--}}
{{--                        @elseif($key == 'banned' and $elem === false)--}}
{{--                            <td>активен</td>--}}
{{--                        @else--}}
{{--                            <td>{{$elem}}</td>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}

{{--    <label>--}}
{{--        <select>--}}
{{--            @foreach($arrayStr as $str)--}}
{{--                <option value="{{$loop->iteration}}">{{$str}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </label>--}}
    <ul>
        @foreach($calendarMart as $day)
            @if($numDay == $day)
                <li class="active">{{$day}}</li>
            @endif
            <li>{{$day}}</li>
        @endforeach
    </ul>


</x-layout>
