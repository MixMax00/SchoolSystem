<?php

namespace App\Http\Controllers\Backend;

use stdClass;
use App\Models\Role;
use App\Models\Thana;
use App\Models\Trade;
use App\Models\Union;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use App\Models\District;
use App\Models\SessionYear;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\EducationQualifications;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{


    public function index()
    {
        Gate::authorize('app.student.index');
        $current_session = SessionYear::orderBy('id','DESC')->first();
        $current_ses_students = Student::where('session',$current_session->session)->get();
        return view('Backend.Admin.Student.index',[
            "current_session"     => $current_session,
            "current_ses_students" => $current_ses_students,
        ]);
    }

    public function currentSession(Request $request)
    {
        $current_ses_students = Student::where('session',$request->session_year)->get();
        return $current_ses_students;
    }

    public function currentSessionClass(Request $request)
    {

        $table_name = $request->curr_sesiion . '_' . $request->curr_class . '_students';

        if(Schema::hasTable($table_name)){
            $current_ses_class_students = DB::table($table_name)->get();
            return $current_ses_class_students;
        }




    }

    public function searchClassRoll(Request $request)
    {
        $table_name = $request->curr_sesiion . '_' . $request->curr_class . '_students';
        if($request->curr_class && $request->roll_id){
            $students = DB::table($table_name)->where('class',$request->curr_class)->where('roll',$request->roll_id)->first();
            return $students;

        }else{


        }

    }

    public function add()
    {
        Gate::authorize('app.student.create');
        $session_years = SessionYear::all();
        $classes = Classes::all();
        $courses = Course::where('status', 1)->get();
        $districts = District::all();
        return view('Backend.Admin.Student.create', [
            "courses"       => $courses,
            'districts'     => $districts,
            'classes'       => $classes,
            'session_years' =>  $session_years,
        ]);
    }

    public function details($id)
    {
        $detail = Student::with('courses','trades','districts','thanas','unions','g_districts','g_thanas','g_unions','loc_districts','loc_thanas','loc_unions')->where('id',$id)->first();
        $edu_details = Student::find($id)->studentQulification;
        return view("Backend.Admin.Student.details", compact('detail','edu_details'));
    }


    public function save(Request  $request)
    {
        Gate::authorize('app.student.index');
        //        multi school
        //        $istitute_id = auth()->user();
        //        $table_name = $istitute_id.'_'.$request->session_year.'_'.$request->classes.'_students';
        //        end multi school


        // return $request->all();

        $request->validate([
            "email" => "required|string|unique:students,email",
            "password" => "required|confirmed|min:5",
        ]);
        $role = Role::where('slug','student')->first();

        $table_name = $request->session_year . '_' . $request->class . '_students';
        $directory_student = 'assets/backend/img/student/';
        $image = $request->file('image');
        //        return $image;

        $image_url = image_upload($image, $directory_student, 300, 300);

        $doc1 = $request->file('doc1');
        $doc2 = $request->file('doc2');
        $doc3 = $request->file('doc3');
        $doc4 = $request->file('doc4');

        $directory_student_file = 'assets/backend/img/student/file/';

        if($doc1){
            $doc1_url = file_upload($doc1, $directory_student_file);
        }

        if($doc2){
            $doc2_url = file_upload($doc2, $directory_student_file);
        }

        if($doc3){
            $doc3_url = file_upload($doc3, $directory_student_file);

        }

        if($doc4){
            $doc4_url = file_upload($doc4, $directory_student_file);
        }

        // $doc1_url = file_upload($doc1, $directory_student_file);
        // $doc2_url = file_upload($doc2, $directory_student_file);
        // $doc3_url = file_upload($doc3, $directory_student_file);
        // $doc4_url = file_upload($doc4, $directory_student_file);

        if (Schema::hasTable($table_name)) {
            $std = new Student();
            $std->role_id = $role->id;
            $std->email = $request->email;
            $std->password = Hash::make($request->password);
            $std->school_id =  $request->school_id;
            $std->institute_name =  $request->institute_name;
            $std->branch =  $request->branch;
            $std->course =  $request->course;
            $std->trade =  $request->trade;
            $std->class_roll = $request->class_roll;
            $std->class =  $request->class;
            $std->group =  $request->group;
            $std->technology =  $request->technology;
            $std->semester =  $request->semester;
            $std->session =  $request->session_year;
            $std->student_name_eng = $request->student_name_eng;
            $std->student_name_ban =  $request->student_name_ban;
            $std->student_phone_1 = $request->student_phone_1;
            $std->student_phone_2 =  $request->student_phone_2;
            $std->father_name_eng =  $request->father_name_eng;
            $std->father_name_ban =  $request->father_name_ban;
            $std->father_phone_1 =  $request->father_phone_1;
            $std->father_phone_2 =  $request->father_phone_2;
            $std->mother_name_eng =  $request->mother_name_eng;
            $std->mother_name_ban =  $request->mother_name_ban;
            $std->mother_phone_1 =  $request->mother_phone_1;
            $std->mother_phone_2 =  $request->mother_phone_2;
            $std->zila = $request->zila;
            $std->upzila =  $request->upzila;
            $std->union =  $request->union;
            $std->post =  $request->post;
            $std->ward =  $request->ward;
            $std->village =  $request->village;
            $std->para =  $request->para;
            $std->g_zila =  $request->g_zila;
            $std->g_upzila =  $request->g_upzila;
            $std->g_union =  $request->g_union;
            $std->g_post =  $request->g_post;
            $std->g_ward =  $request->g_ward;
            $std->g_village =  $request->g_village;
            $std->g_para =  $request->g_para;
            $std->loc_name =  $request->loc_name;
            $std->loc_relation =  $request->loc_relation;
            $std->loc_phone =  $request->loc_phone;
            $std->loc_zila =  $request->loc_zila;
            $std->loc_upzila =  $request->loc_upzila;
            $std->loc_union =  $request->loc_union;
            $std->loc_post =  $request->loc_post;
            $std->loc_ward =  $request->loc_ward;
            $std->loc_village =  $request->loc_village;
            $std->loc_para =  $request->loc_para;
            $std->full_course_fee = $request->full_course_fee;
            $std->semester_fee =  $request->semester_fee;
            $std->internship_fee =  $request->internship_fee;
            $std->agreement =  $request->agreement;
            $std->remarks =  $request->remarks;
            $std->other_activities = $request->other_activities;
            $std->image = $image_url;
            $std->doc1 = isset($doc1_url) ? $doc1_url : ' ';
            $std->doc2 = isset($doc2_url) ? $doc2_url : ' ';
            $std->doc3 = isset($doc3_url) ? $doc3_url : ' ';
            $std->doc4 = isset($doc4_url) ? $doc4_url : ' ';

            $std->save();


            //            return $std;

            DB::table($table_name)->insert([
                'student_id' => $std->id,
                'roll'       => $std->class_roll,
                'image'      => $image_url,
                'stu_name'   => $request->student_name_eng,
                'class'      => $request->class,
                'section'    => $request->group,
            ]);

            if ($request->has('exam_name')) {

                for ($a = 0; $a < count($request->exam_name); $a++) {
                    if ($request->exam_name[$a] && $request->department[$a] && $request->board[$a] && $request->exam_roll[$a] && $request->reg[$a] && $request->gpa[$a] && $request->passing_year[$a]) {
                        $education = new EducationQualifications();
                        $education->student_id = $std->id;
                        $education->exam_name = $request->exam_name[$a];
                        $education->department = $request->department[$a];
                        $education->board = $request->board[$a];
                        $education->exam_roll = $request->exam_roll[$a];
                        $education->reg = $request->reg[$a];
                        $education->gpa = $request->gpa[$a];
                        $education->passing_year = $request->passing_year[$a];
                        $education->save();
                    }
                }
            }
        } else {
            Schema::create($table_name, function ($table) {
                $table->increments('id');
                $table->unsignedBigInteger('student_id')->nullable();
                $table->string('roll')->nullable();
                $table->string('image')->nullable();
                $table->string('stu_name')->nullable();
                $table->string('class')->nullable();
                $table->string('section')->nullable();
                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            });


            $std = new Student();

            $std->role_id = $role->id;
            $std->email = $request->email;
            $std->password = Hash::make($request->password);


            $std->school_id =  $request->school_id;
            $std->institute_name =  $request->institute_name;
            $std->branch =  $request->branch;
            $std->course =  $request->course;
            $std->trade =  $request->trade;
            $std->class_roll = $request->class_roll;
            $std->class =  $request->class;
            $std->group =  $request->group;
            $std->technology =  $request->technology;
            $std->semester =  $request->semester;
            $std->session =  $request->session_year;
            $std->student_name_eng = $request->student_name_eng;
            $std->student_name_ban =  $request->student_name_ban;
            $std->student_phone_1 = $request->student_phone_1;
            $std->student_phone_2 =  $request->student_phone_2;
            $std->father_name_eng =  $request->father_name_eng;
            $std->father_name_ban =  $request->father_name_ban;
            $std->father_phone_1 =  $request->father_phone_1;
            $std->father_phone_2 =  $request->father_phone_2;
            $std->mother_name_eng =  $request->mother_name_eng;
            $std->mother_name_ban =  $request->mother_name_ban;
            $std->mother_phone_1 =  $request->mother_phone_1;
            $std->mother_phone_2 =  $request->mother_phone_2;
            $std->zila = $request->zila;
            $std->upzila =  $request->upzila;
            $std->union =  $request->union;
            $std->post =  $request->post;
            $std->ward =  $request->ward;
            $std->village =  $request->village;
            $std->para =  $request->para;
            $std->g_zila =  $request->g_zila;
            $std->g_upzila =  $request->g_upzila;
            $std->g_union =  $request->g_union;
            $std->g_post =  $request->g_post;
            $std->g_ward =  $request->g_ward;
            $std->g_village =  $request->g_village;
            $std->g_para =  $request->g_para;
            $std->loc_name =  $request->loc_name;
            $std->loc_relation =  $request->loc_relation;
            $std->loc_phone =  $request->loc_phone;
            $std->loc_zila =  $request->loc_zila;
            $std->loc_upzila =  $request->loc_upzila;
            $std->loc_union =  $request->loc_union;
            $std->loc_post =  $request->loc_post;
            $std->loc_ward =  $request->loc_ward;
            $std->loc_village =  $request->loc_village;
            $std->loc_para =  $request->loc_para;
            $std->full_course_fee = $request->full_course_fee;
            $std->semester_fee =  $request->semester_fee;
            $std->internship_fee =  $request->internship_fee;
            $std->agreement =  $request->agreement;
            $std->remarks =  $request->remarks;
            $std->other_activities = $request->other_activities;
            $std->image = $image_url;
            $std->doc1 = isset($doc1_url) ? $doc1_url : ' ';
            $std->doc2 = isset($doc2_url) ? $doc2_url : ' ';
            $std->doc3 = isset($doc3_url) ? $doc3_url : ' ';
            $std->doc4 = isset($doc4_url) ? $doc4_url : ' ';

            $std->save();


            $std2 = DB::table($table_name)->insert([
                'student_id' => $std->id,
                'roll'       => $std->class_roll,
                'image'      => $image_url,
                'stu_name'   => $request->student_name_eng,
                'class'      => $request->class,
                'section'    => $request->group,
            ]);

            if ($request->has('exam_name')) {
                for ($a = 0; $a < count($request->exam_name); $a++) {
                    if ($request->exam_name[$a] && $request->department[$a] && $request->board[$a] && $request->exam_roll[$a] && $request->reg[$a] && $request->gpa[$a] && $request->passing_year[$a]) {
                        $education = new EducationQualifications();
                        $education->student_id = $std->id;
                        $education->exam_name = $request->exam_name[$a];
                        $education->department = $request->department[$a];
                        $education->board = $request->board[$a];
                        $education->exam_roll = $request->exam_roll[$a];
                        $education->reg = $request->reg[$a];
                        $education->gpa = $request->gpa[$a];
                        $education->passing_year = $request->passing_year[$a];
                        $education->save();
                    }
                }

            }
        }

        Toastr::success('New Student  Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return  back();
        //        return $table_name;
    }

    public function edit($id)
    {
        $edit = Student::find($id);
        return view('Backend.Admin.Student.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $table_name = $request->session_year . '_' . $request->class . '_students';
        $directory_student = 'assets/backend/img/student/';
        $image = $request->file('image');

        if($image){
            $image_url = image_upload($image, $directory_student, 300, 300);

            $doc1 = $request->file('doc1');
            $doc2 = $request->file('doc2');
            $doc3 = $request->file('doc3');
            $doc4 = $request->file('doc4');

            $directory_student_file = 'assets/backend/img/student/file/';

            if($doc1){
                $doc1_url = file_upload($doc1, $directory_student_file);
            }

            if($doc2){
                $doc2_url = file_upload($doc2, $directory_student_file);
            }

            if($doc3){
                $doc3_url = file_upload($doc3, $directory_student_file);

            }

            if($doc4){
                $doc4_url = file_upload($doc4, $directory_student_file);
            }

            // $doc1_url = file_upload($doc1, $directory_student_file);
            // $doc2_url = file_upload($doc2, $directory_student_file);
            // $doc3_url = file_upload($doc3, $directory_student_file);
            // $doc4_url = file_upload($doc4, $directory_student_file);



            if (Schema::hasTable($table_name)) {
                $std = Student::find($request->id);
                // $std->email = $request->email;
                // $std->password = Hash::make($request->password);
                // $std->school_id =  $request->school_id;
                $std->institute_name =  $request->institute_name;
                $std->branch =  $request->branch;
                $std->course =  $request->course;
                $std->trade =  $request->trade;
                $std->class_roll = $request->class_roll;
                $std->class =  $request->class;
                $std->group =  $request->group;
                $std->technology =  $request->technology;
                $std->semester =  $request->semester;
                $std->session =  $request->session_year;
                $std->student_name_eng = $request->student_name_eng;
                $std->student_name_ban =  $request->student_name_ban;
                $std->student_phone_1 = $request->student_phone_1;
                $std->student_phone_2 =  $request->student_phone_2;
                $std->father_name_eng =  $request->father_name_eng;
                $std->father_name_ban =  $request->father_name_ban;
                $std->father_phone_1 =  $request->father_phone_1;
                $std->father_phone_2 =  $request->father_phone_2;
                $std->mother_name_eng =  $request->mother_name_eng;
                $std->mother_name_ban =  $request->mother_name_ban;
                $std->mother_phone_1 =  $request->mother_phone_1;
                $std->mother_phone_2 =  $request->mother_phone_2;
                $std->zila = $request->zila;
                $std->upzila =  $request->upzila;
                $std->union =  $request->union;
                $std->post =  $request->post;
                $std->ward =  $request->ward;
                $std->village =  $request->village;
                $std->para =  $request->para;
                $std->g_zila =  $request->g_zila;
                $std->g_upzila =  $request->g_upzila;
                $std->g_union =  $request->g_union;
                $std->g_post =  $request->g_post;
                $std->g_ward =  $request->g_ward;
                $std->g_village =  $request->g_village;
                $std->g_para =  $request->g_para;
                $std->loc_name =  $request->loc_name;
                $std->loc_relation =  $request->loc_relation;
                $std->loc_phone =  $request->loc_phone;
                $std->loc_zila =  $request->loc_zila;
                $std->loc_upzila =  $request->loc_upzila;
                $std->loc_union =  $request->loc_union;
                $std->loc_post =  $request->loc_post;
                $std->loc_ward =  $request->loc_ward;
                $std->loc_village =  $request->loc_village;
                $std->loc_para =  $request->loc_para;
                $std->full_course_fee = $request->full_course_fee;
                $std->semester_fee =  $request->semester_fee;
                $std->internship_fee =  $request->internship_fee;
                $std->agreement =  $request->agreement;
                $std->remarks =  $request->remarks;
                $std->other_activities = $request->other_activities;
                $std->image = $image_url;
                $std->doc1 = isset($doc1_url) ? $doc1_url : ' ';
                $std->doc2 = isset($doc2_url) ? $doc2_url : ' ';
                $std->doc3 = isset($doc3_url) ? $doc3_url : ' ';
                $std->doc4 = isset($doc4_url) ? $doc4_url : ' ';

                $std->save();


                //            return $std;

                DB::table($table_name)->where('student_id', $std->id)->update([
                    // 'student_id' => $std->id,
                    'roll'       => $std->class_roll,
                    'image'      => $image_url,
                    'stu_name'   => $request->student_name_eng,
                    'class'      => $request->class,
                    'section'    => $request->group,
                ]);

                if ($request->has('exam_name')) {

                    for ($a = 0; $a < count($request->exam_name); $a++) {
                        if ($request->exam_name[$a] && $request->department[$a] && $request->board[$a] && $request->exam_roll[$a] && $request->reg[$a] && $request->gpa[$a] && $request->passing_year[$a]) {
                            $education =  EducationQualifications::where('student_id', $request->id)->get();
                            // $education->student_id = $std->id;
                            if($education){
                                // $education->student_id = $std->id;
                              $education->exam_name = $request->exam_name[$a];
                              $education->department = $request->department[$a];
                              $education->board = $request->board[$a];
                              $education->exam_roll = $request->exam_roll[$a];
                              $education->reg = $request->reg[$a];
                              $education->gpa = $request->gpa[$a];
                              $education->passing_year = $request->passing_year[$a];
                              $education->save();
                          }else{
                              $edu_qualificatio = new EducationQualifications();
                              $edu_qualificatio->student_id = $std->id;
                              $edu_qualificatio->exam_name = $request->exam_name[$a];
                              $edu_qualificatio->department = $request->department[$a];
                              $edu_qualificatio->board = $request->board[$a];
                              $edu_qualificatio->exam_roll = $request->exam_roll[$a];
                              $edu_qualificatio->reg = $request->reg[$a];
                              $edu_qualificatio->gpa = $request->gpa[$a];
                              $edu_qualificatio->passing_year = $request->passing_year[$a];
                              $edu_qualificatio->save();
                          }

                        }
                    }
                }
            }

            Toastr::success('Student Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);

            return  back();
        }else{
            $doc1 = $request->file('doc1');
            $doc2 = $request->file('doc2');
            $doc3 = $request->file('doc3');
            $doc4 = $request->file('doc4');

            $directory_student_file = 'assets/backend/img/student/file/';

            if($doc1){
                $doc1_url = file_upload($doc1, $directory_student_file);
            }

            if($doc2){
                $doc2_url = file_upload($doc2, $directory_student_file);
            }

            if($doc3){
                $doc3_url = file_upload($doc3, $directory_student_file);

            }

            if($doc4){
                $doc4_url = file_upload($doc4, $directory_student_file);
            }

            // $doc1_url = file_upload($doc1, $directory_student_file);
            // $doc2_url = file_upload($doc2, $directory_student_file);
            // $doc3_url = file_upload($doc3, $directory_student_file);
            // $doc4_url = file_upload($doc4, $directory_student_file);



            if (Schema::hasTable($table_name)) {
                $std = Student::find($request->id);
                // $std->email = $request->email;
                // $std->password = Hash::make($request->password);
                // $std->school_id =  $request->school_id;
                $std->institute_name =  $request->institute_name;
                $std->branch =  $request->branch;
                $std->course =  $request->course;
                $std->trade =  $request->trade;
                $std->class_roll = $request->class_roll;
                $std->class =  $request->class;
                $std->group =  $request->group;
                $std->technology =  $request->technology;
                $std->semester =  $request->semester;
                $std->session =  $request->session_year;
                $std->student_name_eng = $request->student_name_eng;
                $std->student_name_ban =  $request->student_name_ban;
                $std->student_phone_1 = $request->student_phone_1;
                $std->student_phone_2 =  $request->student_phone_2;
                $std->father_name_eng =  $request->father_name_eng;
                $std->father_name_ban =  $request->father_name_ban;
                $std->father_phone_1 =  $request->father_phone_1;
                $std->father_phone_2 =  $request->father_phone_2;
                $std->mother_name_eng =  $request->mother_name_eng;
                $std->mother_name_ban =  $request->mother_name_ban;
                $std->mother_phone_1 =  $request->mother_phone_1;
                $std->mother_phone_2 =  $request->mother_phone_2;
                $std->zila = $request->zila;
                $std->upzila =  $request->upzila;
                $std->union =  $request->union;
                $std->post =  $request->post;
                $std->ward =  $request->ward;
                $std->village =  $request->village;
                $std->para =  $request->para;
                $std->g_zila =  $request->g_zila;
                $std->g_upzila =  $request->g_upzila;
                $std->g_union =  $request->g_union;
                $std->g_post =  $request->g_post;
                $std->g_ward =  $request->g_ward;
                $std->g_village =  $request->g_village;
                $std->g_para =  $request->g_para;
                $std->loc_name =  $request->loc_name;
                $std->loc_relation =  $request->loc_relation;
                $std->loc_phone =  $request->loc_phone;
                $std->loc_zila =  $request->loc_zila;
                $std->loc_upzila =  $request->loc_upzila;
                $std->loc_union =  $request->loc_union;
                $std->loc_post =  $request->loc_post;
                $std->loc_ward =  $request->loc_ward;
                $std->loc_village =  $request->loc_village;
                $std->loc_para =  $request->loc_para;
                $std->full_course_fee = $request->full_course_fee;
                $std->semester_fee =  $request->semester_fee;
                $std->internship_fee =  $request->internship_fee;
                $std->agreement =  $request->agreement;
                $std->remarks =  $request->remarks;
                $std->other_activities = $request->other_activities;
                $std->doc1 = isset($doc1_url) ? $doc1_url : ' ';
                $std->doc2 = isset($doc2_url) ? $doc2_url : ' ';
                $std->doc3 = isset($doc3_url) ? $doc3_url : ' ';
                $std->doc4 = isset($doc4_url) ? $doc4_url : ' ';

                $std->save();


                //            return $std;

                DB::table($table_name)->where('student_id', $std->id)->update([
                    // 'student_id' => $std->id,
                    'roll'       => $std->class_roll,
                    'stu_name'   => $request->student_name_eng,
                    'class'      => $request->class,
                    'section'    => $request->group,
                ]);

                if ($request->has('exam_name')) {

                    for ($a = 0; $a < count($request->exam_name); $a++) {
                        if ($request->exam_name[$a] && $request->department[$a] && $request->board[$a] && $request->exam_roll[$a] && $request->reg[$a] && $request->gpa[$a] && $request->passing_year[$a]) {
                            $education =  EducationQualifications::where('student_id', $request->id)->first();

                            if($education){
                                  // $education->student_id = $std->id;
                                $education->exam_name = $request->exam_name[$a];
                                $education->department = $request->department[$a];
                                $education->board = $request->board[$a];
                                $education->exam_roll = $request->exam_roll[$a];
                                $education->reg = $request->reg[$a];
                                $education->gpa = $request->gpa[$a];
                                $education->passing_year = $request->passing_year[$a];
                                $education->save();
                            }else{
                                $edu_qualificatio = new EducationQualifications();
                                $edu_qualificatio->student_id = $std->id;
                                $edu_qualificatio->exam_name = $request->exam_name[$a];
                                $edu_qualificatio->department = $request->department[$a];
                                $edu_qualificatio->board = $request->board[$a];
                                $edu_qualificatio->exam_roll = $request->exam_roll[$a];
                                $edu_qualificatio->reg = $request->reg[$a];
                                $edu_qualificatio->gpa = $request->gpa[$a];
                                $edu_qualificatio->passing_year = $request->passing_year[$a];
                                $edu_qualificatio->save();
                            }

                        }
                    }
                }
            }

            Toastr::success('Student Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);

            return  back();
        }

    }

    public function trade(Request $request)
    {
        $trades = Trade::where('course_id', $request->course_id)->get();

        $output = "<option selected>--- select trade ---</option>";
        foreach ($trades as $trade) {
            echo $output = '<option value="' . $trade->id . '">' . $trade->trade_title . '</option>';
        }
    }

    public function classGroup(Request $request)
    {
        $groups = Section::where('class_id', $request->class_id)->get();

        $output = "<option selected>--- select group ---</option>";
        foreach ($groups as $group) {
            echo $output = '<option value="' . $group->id . '">' . $group->section_name . '</option>';
        }
    }



    public function upzilla(Request $request)
    {
        $thanas = Thana::where('district_id', $request->zilla_id)->get();

        $output = "<option selected>--- select upzilla ---</option>";
        foreach ($thanas as $thana) {
            echo $output = '<option value="' . $thana->id . '">' . $thana->name . '</option>';
        }
    }

    public function union(Request $request)
    {
        $unions = Union::where('upazila_id', $request->upzilla_id)->get();

        $output = "<option selected>--- select union ---</option>";
        foreach ($unions as $union) {
            echo $output = '<option value="' . $union->id . '">' . $union->name . '</option>';
        }
    }

    public function gupzilla(Request $request)
    {
        $thanas = Thana::where('district_id', $request->gzilla_id)->get();

        $output = "<option selected>--- select upzilla ---</option>";
        foreach ($thanas as $thana) {
            echo $output = '<option value="' . $thana->id . '">' . $thana->name . '</option>';
        }
    }

    public function gunion(Request $request)
    {
        $unions = Union::where('upazila_id', $request->gupzilla_id)->get();

        $output = "<option selected>--- select union ---</option>";
        foreach ($unions as $union) {
            echo $output = '<option value="' . $union->id . '">' . $union->name . '</option>';
        }
    }

    public function idupzilla(Request $request)
    {
        $thanas = Thana::where('district_id', $request->idzilla_id)->get();

        $output = "<option selected>--- select upzilla ---</option>";
        foreach ($thanas as $thana) {
            echo $output = '<option value="' . $thana->id . '">' . $thana->name . '</option>';
        }
    }

    public function idunion(Request $request)
    {
        $unions = Union::where('upazila_id', $request->idupzilla_id)->get();

        $output = "<option selected>--- select union ---</option>";
        foreach ($unions as $union) {
            echo $output = '<option value="' . $union->id . '">' . $union->name . '</option>';
        }
    }

    public function sendPDF($id)
    {

        // $pdf = Pdf::loadView('Backend.Admin.Template.pdf');
        // return $pdf->stream();
        $invoice = Student::find($id);
        Notification::route('mail','mdrabbihasan610@gmail.com')->notify(new InvoicePaid($invoice));

        Toastr::success('Email Send Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }

    public function download($id)
    {
        $data = Student::find($id);
        $pdf = Pdf::loadView('Backend.Admin.Template.pdf',compact('data'));
        return $pdf->download();
    }
}
