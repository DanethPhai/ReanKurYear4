<?php
namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Repository\IProductRepository;
use Illuminate\Http\Request;
use DB;

class TeacherController extends Controller
{
    public $teacher;

    public function __construct(IProductRepository $teacher) {
        $this->teacher = $teacher;
    }

    public function getSingleTeacher($id) {
        $teacher =  $this->teacher->getSingleTeacher($id);
        return view('layouts.app')->with('teacher', $teacher);
    }
}
