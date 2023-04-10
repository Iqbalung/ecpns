<?php

namespace App\Http\Controllers\API;

use App\Feedback;
use App\QuizCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LmsSeries;
use App\Quiz;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

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

        $data = [
            'categories' => $categories,
            'quizzes'    => $quizzes,
            'lms_cates'  => $lms_cates,
            'lms_series' => $lms_series
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
}
