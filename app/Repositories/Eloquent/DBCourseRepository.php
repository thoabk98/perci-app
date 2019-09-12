<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\DB;

class DBCourseRepository extends DBRepository implements CourseRepository
{
    public function __construct(Course $model)
    {
        parent::__construct($model);
    }

    public function listCourse($request)
    {
        return $this->model
            ->join('item_class as ic', 'ic.id', 'courses.car_class_id')
            ->select('courses.*', 'ic.name as car_class')
            ->paginate($request->per_page);
    }

    public function allCourse($params=[])
    {
        $course = $this->model;
        if (isset($params['class_id'])) {
            $course = $course->where('car_class_id', $params['class_id']);
        }
        return $course->get(['name as text', 'id']);
    }

    public function updateQuantity($qtt=1)
    {
        DB::table('courses')->increment('quantity', $qtt);
    }

}
