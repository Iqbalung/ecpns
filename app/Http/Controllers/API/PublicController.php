<?php

namespace App\Http\Controllers\API;

use App\Feedback;
use App\QuizCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LmsSeries;
use App\Quiz;
use App\Imports\ImportContacts;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Input;
use Excel;
use Exception;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware(['cors']);
    }

    public function getHomeData(Request $request)
    {
        $categories = QuizCategory::getPracticeExamsCategories($this->getRequestLimit($request));
        $lms_cates  = LmsSeries::getFreeSeries($this->getRequestLimit($request));
        $quizzes    = [];
        $lms_series = [];

        if (count($categories) > 0) {
            $firstCat = $categories[0];
            $quizzes  = Quiz::where('category_id', $firstCat->id)
                ->where('show_in_front', 1)
                ->where('total_marks', '>', 0)
                ->limit(6)
                ->get();
        }

        if (count($lms_cates) > 0) {
            $firstLms   = $lms_cates[0];
            $lms_series = LmsSeries::where('lms_category_id', $firstLms->id)
                ->where('show_in_front', 1)
                ->where('total_items', '>', 0)
                ->orderby('created_at', 'desc')
                ->limit(4)
                ->get();
        }

        $quizzes = collect($quizzes)->map(function ($data) {
            $data->cost = number_format($data->cost, 2, ',', '.');

            return $data;
        });

        $testimonies = Feedback::join('users', 'users.id', '=', 'feedbacks.user_id')
            ->select(['feedbacks.title','feedbacks.description','users.name','users.image'])
            ->where('feedbacks.read_status', 1)
            ->orderBy('feedbacks.updated_at', 'desc')
            ->get();

        $data = [
            'categories'  => $categories,
            'quizzes'     => $quizzes,
            'lms_cates'   => $lms_cates,
            'lms_series'  => $lms_series,
            'testimonies' => $testimonies
        ];

        return response()->json($data, HttpResponse::HTTP_OK);
    }

    public function getExamCategories(Request $request)
    {
        $categories = QuizCategory::getPracticeExamsCategories($this->getRequestLimit($request));

        $data = [
            'categories' => $categories
        ];

        return response()->json($data, HttpResponse::HTTP_OK);
    }

    public function getTestimonies(Request $request)
    {
        $testimonies = Feedback::join('users', 'users.id', '=', 'feedbacks.user_id')
            ->select(['feedbacks.title','feedbacks.description','users.name','users.image'])
            ->where('feedbacks.read_status', 1)
            ->orderBy('feedbacks.updated_at', 'desc')
            ->get();

        $data = [
            'testimonies' => $testimonies
        ];

        return response()->json($data, HttpResponse::HTTP_OK);
    }

    private function getRequestLimit(Request $request, $limit = 8)
    {
        return $request->limit ?? $limit;
    }

    public function readExcel(Request $request)
     {
         
         $success_list = [];
         $failed_list = [];
         $summary = [];
             if (Input::hasFile('excel')) {
                 $data =  Excel::import(new ImportExcel, request()->file('excel'));
                
                 $all_records  = array();
                 $excel_record = array();
                 $final_records =array();
                 $isHavingDuplicate = 0;
                 
                 if (!empty($data) && $data->count()) {
                     foreach ($data as $key => $value) {
                         if (array_has($value, 'subject_id')) {
                             $all_records[] = $value;
                         } else {
                             foreach ($value as $record) {
                                 $all_records[] = $record;
                             }
                         }
                     }
                     
                     $questionbank = new QuestionBank();

                     $summary = (object)$this->processExcelQuestions($request, $all_records);
                 }
                 
             }

             if (isset($summary->failed_list) || isset($summary->success_list)) {
                 $data['failed_list']   =   $summary->failed_list;
                 $data['success_list']  =    $summary->success_list;

                 $this->excel_data['failed'] = $summary->failed_list;
                 $this->excel_data['success'] = $summary->success_list;
                 $this->excel_data['columns'] = $summary->columns_list;

                 $this->downloadExcel();
             } else {
                 flash('oops...!', 'improper_sheet_uploaded', 'error');
             }
        

          $data['failed_list']   =   $failed_list;
         $data['success_list']  =    $success_list;
         $data['records']      = false;
         $data['layout']       = getLayout();
         $data['active_class'] = 'exams';
         $data['heading']      = getPhrase('upload_questions');
         $data['title']        = getPhrase('report');

         //$view_name = getTheme().'::exams.questionbank.import.import-result';
         //return view($view_name, $data);
     }

}
