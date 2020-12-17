<style>
    table {
        background: #fff;
        width: 100%;
        border: 0;
    }
    th {}
    td {
        border-top: 1px solid #999;
        padding: 5px;
    }
    tr:nth-child(odd) {
        background: #ddd;
    }
</style>
<table>
    <thead>
        <th>#</th>
        <th>Question</th>
        <th>Answers</th>
        <th>Match</th>
        <th>Created at</th>
        <th>Updated at</th>
    </thead>
    <tbody>
        @php
        $fmt_mof_ques = DB::table('fmt_picmatch_ques')->get();
        @endphp
        @foreach ($fmt_mof_ques as $que)
        <tr>
            <td>{{$que->id}}</td>
            <td>{{$que->question}}</td>
            @php $fmt_mof_ans = DB::table('fmt_picmatch_ans')->where('question_id', $que->id)->get() @endphp
            <td>
                <ul>
                    @foreach ($fmt_mof_ans as $ans)
                        @if($ans->match_id)
                            {{$ans->answer}}
                            @php $ans_media = DB::table('media')->where('id', $ans->media_id)->first() @endphp
                            <li><img src="{{url('/')}}/storage/{{$ans_media->url}}" style="width:40px; height:30px; object-fit:cover;"></li>
                        @endif
                    @endforeach
                </ul>
            </td>
            <td>
                <ul>
                    @foreach ($fmt_mof_ans as $ans)
                        @if(!$ans->match_id)
                            {{$ans->answer}}
                            @php $ans_media = DB::table('media')->where('id', $ans->media_id)->first() @endphp
                            <li><img src="{{url('/')}}/storage/{{$ans_media->url}}" style="width:40px; height:30px; object-fit:cover;"></li>
                        @endif
                    @endforeach
                </ul>
            </td>
            <td>{{date('F d, Y',strtotime($que->created_at))}}</td>
            <td>{{date('F d, Y',strtotime($que->updated_at))}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
