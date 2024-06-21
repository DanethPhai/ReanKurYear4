<?php

namespace App\Http\Controllers;

use App\Repository\IAdminRepository;

class AdminController extends Controller
{

    public $admin;

    public function __construct(IAdminRepository $admin)
    {
        $this->admin = $admin;
    }


    public function adminShowAllProduct() {
        $products =  $this->admin->adminShowAllProduct();
        return view('admin.post')->with('products', $products);
    }

    public function adminShowDashboard() {
        $products =  $this->admin->adminShowAllProduct();
        return view('admin.index')->with('products', $products);
    }

    public function adminGetAllComments() {
            $comments =  $this->admin->adminGetAllComments();
            return view('admin.comments')->with('comments', $comments);
    }

    public function adminDeleteComment($id) {
        $this->admin->adminDeleteComment($id);
        return redirect('/admin/products/comments');
    }

    public function adminDeleteProduct($id) {
        $this->admin->adminDeleteProduct($id);
        return redirect('/admin/products');
    }

    public function adminShowAllTeacher() {
        $teachers =  $this->admin->adminShowAllTeacher();
        return view('admin.teacher')->with('teachers', $teachers);
    }

    public function adminShowAllUser() {
        $users =  $this->admin->adminShowAllUser();
        return view('admin.user')->with('users', $users);
    }

}
