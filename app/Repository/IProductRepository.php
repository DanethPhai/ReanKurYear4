<?php
namespace App\Repository;

interface IProductRepository {

    public function getAllProducts();

    public function getAllTeachers();

    public function getAllUsers();

    public function getAllSubjects();

    public function getSingleProduct($id);

    public function getSingleSubject($id);

    public function getSingleTeacher($id);

    public function createProduct(array $data);

    public function createTeacher(array $data);

    public function editProduct($id);

    public function editTeacher($id);

    public function updateProduct($id, array $data);

    public function updateTeacher($id, array $data);

    public function teacherDeleteProduct($id);


}




?>
