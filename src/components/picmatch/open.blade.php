<div>
    <style>
        .fmt_box{
            margin: 10px 20px;
            padding: 10px 20px;
            border: 4px solid #eeeeee;
            background: #fff;
            box-shadow: 2px 4px 8px #b1b1b1;
        }
        .fmt_headline{
            font-size: 20px;
            margin:10px 0;
        }
        .fmt_label{
            font-size: 14px;
        }
        .fmt_input{
            padding:4px 10px;
            border:1px solid #707070;
            border-radius: 4px;
            display: block;
            font-size: 16px;
        }
        .fmt_sub_btn{
            padding:6px 20px;
            margin:10px 0;
            border-radius: 8px;
            background:#0047d4;
            color:#fff;
            border:none;
            letter-spacing: 1px;
            cursor: pointer;
        }
        .fmt_checkbox{
            width: 22px;
            height: 22px;
            display: block;
        }
        .fmt_flex{
            display: flex;
            margin: 10px 0;
        }
        #addOption{
            padding: 6px 20px;
            background: #049e04;
            color: #fff;
            cursor: pointer;
        }
    </style>
    <form action="{{route('fmt.picmatch.store')}}" method="post" class="fmt_box" enctype="multipart/form-data">
        <input type="integer" name="problem_set_id" value="{{$pbs72 ?? ''}}" hidden style="border:1px solid #000000;">
        <input type="integer" name="format_type_id" value="{{$fmt72 ?? ''}}" hidden style="border:1px solid #000000;">
        <div class="fmt_headline">Add a Picture Matching Question</div>
        <div>
            <label class="fmt_label" for="">Question</label>
            <input class="fmt_input" type="text" name="question" placeholder="Question" required>
        </div>
        <div class="my-2" style="margin: 20px 0;">
            <label class="bloc" for="">Difficulty Level</label>
            @php $d_levels = DB::table('difficulty_levels')->get(); @endphp
            <select name="difficulty_level_id" id="" class="w-full my-2 px-2 py-2 border border-gray-500 rounded-lg">
                @foreach ($d_levels as $level)
                <option value="{{$level->id}}">{{$level->name}}</option>
                @endforeach
            </select>
        </div>
        <hr>
        {{-- answer1-match1 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 1</label>
                <input class="fmt_input" type="text" name="answer_1" placeholder="Answer" >
                <input style="margin-top:10px;" type="file" name="answer_1_media" id=""required>
            </div>
            <div style="margin-left:20px;">
                <label class="fmt_label" for="">Match for Answer 1</label>
                <input class="fmt_input" type="text" name="match_1" placeholder="Match for Answer 1" >
                <input style="margin-top:10px;" type="file" name="match_1_media" id=""required>
            </div>
        </div>
        {{-- //answer2-match2 --}}
        {{-- answer2-match2 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 2</label>
                <input class="fmt_input" type="text" name="answer_2" placeholder="Answer">
                <input style="margin-top:10px;" type="file" name="answer_2_media" id="">
            </div>
            <div style="margin-left:20px;">
                <label class="fmt_label" for="">Match for Answer 2</label>
                <input class="fmt_input" type="text" name="match_2" placeholder="Match for Answer 2">
                <input style="margin-top:10px;" type="file" name="match_2_media" id="">
            </div>
        </div>
        {{-- //answer2-match2 --}}
        {{-- answer3-match3 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 3</label>
                <input class="fmt_input" type="text" name="answer_3" placeholder="Answer">
                <input style="margin-top:10px;" type="file" name="answer_3_media" id="">
            </div>
            <div style="margin-left:20px;">
                <label class="fmt_label" for="">Match for Answer 3</label>
                <input class="fmt_input" type="text" name="match_3" placeholder="Match for Answer 3">
                <input style="margin-top:10px;" type="file" name="match_3_media" id="">
            </div>
        </div>
        {{-- //answer3-match3 --}}
        {{-- answer4-match4 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 4</label>
                <input class="fmt_input" type="text" name="answer_4" placeholder="Answer">
                <input style="margin-top:10px;" type="file" name="answer_4_media" id="">
            </div>
            <div style="margin-left:20px;">
                <label class="fmt_label" for="">Match for Answer 4</label>
                <input class="fmt_input" type="text" name="match_4" placeholder="Match for Answer 4">
                <input style="margin-top:10px;" type="file" name="match_4_media" id="">
            </div>
        </div>
        {{-- //answer4-match4 --}}
        <div>
            <input type="submit" class="fmt_sub_btn" value="Submit">
        </div>
    </form>
    {{-- <button id="addOption">Add option</button> --}}
</div>
<form action="{{route('fmt.picmatch.csv')}}" method="POST" enctype='multipart/form-data' style="margin:20px 40px;">
    @csrf
    <input type="integer" name="problem_set_id" value="{{$pbs72 ?? ''}}" hidden style="border:1px solid #000000;">
    <input type="integer" name="format_type_id" value="{{$fmt72 ?? ''}}" hidden style="border:1px solid #000000;">
    <div style="display:block; padding:10px;">
        <div style="font-size:12px;">CSV</div>
        <input style="display:block;" type="file" name="file" >
    </div>
    <div style="display:block; padding:10px;">
        <div style="font-size:12px;">Images</div>
        <input style="display:block;" type="file" name="images[]" multiple accept="image/*" placeholder="image" required>
    </div>
    <button type="submit" style="display: inline-block; margin:10px; padding:4px 20px; background:green; color:#fff; text-transform:uppercase; border-radius:4px;">submit</button>
</form>
{{-- <script>
    var addOption = document.getElementById('addOption');

</script> --}}