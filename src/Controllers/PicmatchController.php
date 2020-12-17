<?php

namespace edgewizz\picmatch\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Media;
use Edgewizz\Edgecontent\Models\ProblemSetQues;
use Edgewizz\Picmatch\Models\PicmatchAns;
use Edgewizz\Picmatch\Models\PicmatchQues;
use Illuminate\Http\Request;

class PicmatchController extends Controller
{
    //
    public function test(){
        dd('hello');
    }
    public function store(Request $request){
        $pmQ = new PicmatchQues();
        $pmQ->question = $request->question;
        $pmQ->difficulty_level_id = $request->difficulty_level_id;
        $pmQ->save();
        /* answer1 */
        if($request->answer_1_media){
            $answer_1 = new PicmatchAns();
            $answer_1->question_id = $pmQ->id;
            $answer_1->answer = $request->answer_1;
                $answer_1_media = new Media();
                $request->answer_1_media->storeAs('public/answers', time().$request->answer_1_media->getClientOriginalName());
                $answer_1_media->url = 'answers/'.time().$request->answer_1_media->getClientOriginalName();
                $answer_1_media->save();
            $answer_1->media_id = $answer_1_media->id;
            $answer_1->save();
            if($request->match_1_media){
                $match_1 = new PicmatchAns();
                $match_1->question_id = $pmQ->id;
                $match_1->answer = $request->match_1;
                    $match_1_media = new Media();
                    $request->match_1_media->storeAs('public/answers', time().$request->match_1_media->getClientOriginalName());
                    $match_1_media->url = 'answers/'.time().$request->match_1_media->getClientOriginalName();
                    $match_1_media->save();
                $match_1->media_id = $match_1_media->id;
                $match_1->match_id = $answer_1->id;
                $match_1->save();
            }
        }
        /* //answer1 */
        /* answer2 */
        if($request->answer_2_media){
            $answer_2 = new PicmatchAns();
            $answer_2->question_id = $pmQ->id;
            $answer_2->answer = $request->answer_2;
                $answer_2_media = new Media();
                $request->answer_2_media->storeAs('public/answers', time().$request->answer_2_media->getClientOriginalName());
                $answer_2_media->url = 'answers/'.time().$request->answer_2_media->getClientOriginalName();
                $answer_2_media->save();
            $answer_2->media_id = $answer_2_media->id;
            $answer_2->save();
            if($request->match_2_media){
                $match_2 = new PicmatchAns();
                $match_2->question_id = $pmQ->id;
                $match_2->answer = $request->match_2;
                    $match_2_media = new Media();
                    $request->match_2_media->storeAs('public/answers', time().$request->match_2_media->getClientOriginalName());
                    $match_2_media->url = 'answers/'.time().$request->match_2_media->getClientOriginalName();
                    $match_2_media->save();
                $match_2->media_id = $match_2_media->id;
                $match_2->match_id = $answer_2->id;
                $match_2->save();
            }
        }
        /* //answer2 */
        /* answer3 */
        if($request->answer_3_media){
            $answer_3 = new PicmatchAns();
            $answer_3->question_id = $pmQ->id;
            $answer_3->answer = $request->answer_3;
                $answer_3_media = new Media();
                $request->answer_3_media->storeAs('public/answers', time().$request->answer_3_media->getClientOriginalName());
                $answer_3_media->url = 'answers/'.time().$request->answer_3_media->getClientOriginalName();
                $answer_3_media->save();
            $answer_3->media_id = $answer_3_media->id;
            $answer_3->save();
            if($request->match_3_media){
                $match_3 = new PicmatchAns();
                $match_3->question_id = $pmQ->id;
                $match_3->answer = $request->match_3;
                    $match_3_media = new Media();
                    $request->match_3_media->storeAs('public/answers', time().$request->match_3_media->getClientOriginalName());
                    $match_3_media->url = 'answers/'.time().$request->match_3_media->getClientOriginalName();
                    $match_3_media->save();
                $match_3->media_id = $match_3_media->id;
                $match_3->match_id = $answer_3->id;
                $match_3->save();
            }
        }
        /* //answer3 */
        /* answer4 */
        if($request->answer_4_media){
            $answer_4 = new PicmatchAns();
            $answer_4->question_id = $pmQ->id;
            $answer_4->answer = $request->answer_4;
                $answer_4_media = new Media();
                $request->answer_4_media->storeAs('public/answers', time().$request->answer_4_media->getClientOriginalName());
                $answer_4_media->url = 'answers/'.time().$request->answer_4_media->getClientOriginalName();
                $answer_4_media->save();
            $answer_4->media_id = $answer_4_media->id;
            $answer_4->save();
            if($request->match_4_media){
                $match_4 = new PicmatchAns();
                $match_4->question_id = $pmQ->id;
                $match_4->answer = $request->match_4;
                    $match_4_media = new Media();
                    $request->match_4_media->storeAs('public/answers', time().$request->match_4_media->getClientOriginalName());
                    $match_4_media->url = 'answers/'.time().$request->match_4_media->getClientOriginalName();
                    $match_4_media->save();
                $match_4->media_id = $match_4_media->id;
                $match_4->match_id = $answer_4->id;
                $match_4->save();
            }
        }
        /* //answer4 */
        if($request->problem_set_id && $request->format_type_id){
            $pbq = new ProblemSetQues();
            $pbq->problem_set_id = $request->problem_set_id;
            $pbq->question_id = $pmQ->id;
            $pbq->format_type_id = $request->format_type_id;
            $pbq->save();
        }
        return back();
    }
    public function edit($id, Request $request){
        
    }
    public function imagecsv($question_image, $images){
        foreach($images as $valueImage){
            $uploadImage = explode(".", $valueImage->getClientOriginalName());
            if($uploadImage[0] == $question_image){
                // dd($valueImage);
                $media = new Media();
                $valueImage->storeAs('public/question_images', time() . $valueImage->getClientOriginalName());
                $media->url = 'question_images/' . time() . $valueImage->getClientOriginalName();
                $media->save();
                return $media->id;
            }
        }
    }
    public function csv_upload(Request $request){

        $file = $request->file('file');
        $images = $request->file('images');
        // dd($file);
        // File Details
        $filename = time() . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        // Valid File Extensions
        $valid_extension = array("csv");
        // 2MB in Bytes
        $maxFileSize = 2097152;
        // Check file extension
        if (in_array(strtolower($extension), $valid_extension)) {
            // Check file size
            if ($fileSize <= $maxFileSize) {
                // File upload location
                $location = 'uploads';
                // Upload file
                $file->move($location, $filename);
                // Import CSV to Database
                $filepath = public_path($location . "/" . $filename);
                // Reading file
                $file = fopen($filepath, "r");
                $importData_arr = array();
                $i = 0;
                while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
                    $num = count($filedata);
                    // Skip first row (Remove below comment if you want to skip the first row)
                    if ($i == 0) {
                        $i++;
                        continue;
                    }
                    for ($c = 0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata[$c];
                    }
                    $i++;
                }
                fclose($file);
                // Insert to MySQL database
                foreach ($importData_arr as $importData) {
                    $insertData = array(
                        "question" => $importData[1],
                        "option1" => $importData[2],
                        "media1" => $importData[3],
                        "match1" => $importData[4],
                        "match_media1" => $importData[5],
                        "option2" => $importData[6],
                        "media2" => $importData[7],
                        "match2" => $importData[8],
                        "match_media2" => $importData[9],
                        "option3" => $importData[10],
                        "media3" => $importData[11],
                        "match3" => $importData[12],
                        "match_media3" => $importData[13],
                        "option4" => $importData[14],
                        "media4" => $importData[15],
                        "match4" => $importData[16],
                        "match_media4" => $importData[17],
                        "level" => $importData[18],
                    );
                    // var_dump($insertData['answer1']);
                    /*  */
                    if ($insertData['question']) {
                        $fill_Q = new PicmatchQues();
                        $fill_Q->question = $insertData['question'];
                        if(!empty($insertData['level'])){
                            if($insertData['level'] == 'easy'){
                                $fill_Q->difficulty_level_id = 1;
                            }else if($insertData['level'] == 'medium'){
                                $fill_Q->difficulty_level_id = 2;
                            }else if($insertData['level'] == 'hard'){
                                $fill_Q->difficulty_level_id = 3;
                            }
                        }
                        $fill_Q->save();
                        if($request->problem_set_id && $request->format_type_id){
                            $pbq = new ProblemSetQues();
                            $pbq->problem_set_id = $request->problem_set_id;
                            $pbq->question_id = $fill_Q->id;
                            $pbq->format_type_id = $request->format_type_id;
                            $pbq->save();
                        }

                        if ($insertData['option1'] == '-') {
                        } else {
                            $f_Ans1 = new PicmatchAns();
                            $f_Ans1->question_id = $fill_Q->id;
                            $f_Ans1->answer = $insertData['option1'];
                            if (!empty($insertData['media1']) && $insertData['media1'] != '') {
                                $media_id = $this->imagecsv($insertData['media1'], $images);
                                $f_Ans1->media_id = $media_id;
                            }
                            $f_Ans1->save();
                            if ($insertData['match1'] == '-') {
                            } else {
                                $match1 = new PicmatchAns();
                                $match1->question_id = $fill_Q->id;
                                $match1->answer = $insertData['match1'];
                                if (!empty($insertData['match_media1']) && $insertData['match_media1'] != '') {
                                    $media_id = $this->imagecsv($insertData['match_media1'], $images);
                                    $match1->media_id = $media_id;
                                }
                                $match1->match_id = $f_Ans1->id;
                                $match1->save();
                            }
                        }

                        if ($insertData['option2'] == '-') {
                        } else {
                            $f_Ans2 = new PicmatchAns();
                            $f_Ans2->question_id = $fill_Q->id;
                            $f_Ans2->answer = $insertData['option2'];
                            if (!empty($insertData['media2']) && $insertData['media2'] != '') {
                                $media_id = $this->imagecsv($insertData['media2'], $images);
                                $f_Ans2->media_id = $media_id;
                            }
                            $f_Ans2->save();
                            if ($insertData['match2'] == '-') {
                            } else {
                                $match2 = new PicmatchAns();
                                $match2->question_id = $fill_Q->id;
                                $match2->answer = $insertData['match2'];
                                if (!empty($insertData['match_media2']) && $insertData['match_media2'] != '') {
                                    $media_id = $this->imagecsv($insertData['match_media2'], $images);
                                    $match2->media_id = $media_id;
                                }
                                $match2->match_id = $f_Ans2->id;
                                $match2->save();
                            }
                        }

                        if ($insertData['option3'] == '-') {
                        } else {
                            $f_Ans3 = new PicmatchAns();
                            $f_Ans3->question_id = $fill_Q->id;
                            $f_Ans3->answer = $insertData['option3'];
                            if (!empty($insertData['media3']) && $insertData['media3'] != '') {
                                $media_id = $this->imagecsv($insertData['media3'], $images);
                                $f_Ans3->media_id = $media_id;
                            }
                            $f_Ans3->save();
                            if ($insertData['match3'] == '-') {
                            } else {
                                $match3 = new PicmatchAns();
                                $match3->question_id = $fill_Q->id;
                                $match3->answer = $insertData['match3'];
                                if (!empty($insertData['match_media3']) && $insertData['match_media3'] != '') {
                                    $media_id = $this->imagecsv($insertData['match_media3'], $images);
                                    $match3->media_id = $media_id;
                                }
                                $match3->match_id = $f_Ans3->id;
                                $match3->save();
                            }
                        }

                        if ($insertData['option4'] == '-') {
                        } else {
                            $f_Ans4 = new PicmatchAns();
                            $f_Ans4->question_id = $fill_Q->id;
                            $f_Ans4->answer = $insertData['option4'];
                            if (!empty($insertData['media4']) && $insertData['media4'] != '') {
                                $media_id = $this->imagecsv($insertData['media4'], $images);
                                $f_Ans4->media_id = $media_id;
                            }
                            $f_Ans4->save();
                            if ($insertData['match4'] == '-') {
                            } else {
                                $match4 = new PicmatchAns();
                                $match4->question_id = $fill_Q->id;
                                $match4->answer = $insertData['match4'];
                                if (!empty($insertData['match_media4']) && $insertData['match_media4'] != '') {
                                    $media_id = $this->imagecsv($insertData['match_media4'], $images);
                                    $match4->media_id = $media_id;
                                }
                                $match4->match_id = $f_Ans4->id;
                                $match4->save();
                            }
                        }
                        
                    }
                    /*  */
                }
                // Session::flash('message', 'Import Successful.');
            } else {
                // Session::flash('message', 'File too large. File must be less than 2MB.');
            }
        } else {
            // Session::flash('message', 'Invalid File Extension.');
        }
        return back();
    }
}
