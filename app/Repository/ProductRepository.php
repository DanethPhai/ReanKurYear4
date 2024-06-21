<?php

namespace App\Repository;

use App\Models\Product;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use DB;

class ProductRepository implements IProductRepository {

    public function getAllProducts()
    {
        // $teachers = DB::table('teachers')
        //     ->join('products','products.teacher_id','teachers.id')
        //     ->select( 'products.id','products.teacher_id', 'products.subject', 'products.level', 'products.time', 'products.price', 'products.term', 'products.detail', 'teachers.id','teachers.birth','teachers.tel','teachers.major','teachers.profile','teachers.certificate')
        //     ->get();
        // return $teachers;
        return Product::orderBy('created_at', 'ASC')->get();
    }

    public function getAllSubjects()
    {
       return Subject::all();
    }

    public function getAllTeachers()
    {
       return Teacher::all();
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function getSingleProduct($id)
    {

        return  Product::find($id);

    }

    public function getSingleTeacher($id)
    {

        return  Teacher::find($id);
    }

    public function getSingleSubject($id)
    {

        return  Subject::find($id);
    }

    public function createProduct(array $data)
    {
        // Product::create([
        //     'picture' => $data['pciture'],
        //     'title' => $data['title'],
        //     'price' => $data['price'],
        //     'description' => $data['description']
        // ]);

        $product = new Product();
        $product->subject_id = $data['subject_id'];
        $product->level_id = $data['level_id'];
        $product->price = $data['price'];
        $product->time = $data['time'];
        $product->term = $data['term'];
        $product->detail = $data['detail'];

        $product->save();

    }

    public function createTeacher(array $data)
    {

        $teacher = new Teacher();
        $teacher->birth = $data['birth'];
        $teacher->tel = $data['tel'];
        $teacher->major = $data['major'];
        $teacher->profile = $data['profile'];
        $teacher->certificate = $data['certificate'];

        $teacher->save();

    }

    public function editProduct($id)
    {
        return Product::find($id);
    }

    public function editTeacher($id)
    {
        return Teacher::find($id);
    }

    public function updateProduct($id, array $data)
    {
       Product::find($id)->update([
            'subject_id' => $data['subject_id'],
            'level_id' => $data['level_id'],
            'price' => $data['price'],
            'time' => $data['time'],
            'term' => $data['term'],
            'detail' => $data['detail'],

        ]);
    }

    public function updateTeacher($id, array $data)
    {
       Teacher::find($id)->update([
            'birth' => $data['birth'],
            'tel' => $data['tel'],
            'major' => $data['major'],

        ]);
    }

    public function teacherDeleteProduct($id)
    {
        return Product::find($id)->delete();
    }

}

?>
