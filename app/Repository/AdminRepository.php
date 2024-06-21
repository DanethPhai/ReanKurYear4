<?php


namespace App\Repository;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Teacher;
use App\Models\User;

class AdminRepository implements IAdminRepository {

    public function adminShowAllProduct()
    {
        return Product::all();
    }

    public function adminShowAllTeacher()
    {
        return Teacher::all();
    }

    public function adminShowAllUser()
    {
        return User::all();
    }

    public function adminGetAllComments()
    {
        return Comment::all();
    }

    public function adminDeleteComment($id)
    {
        return Comment::find($id)->delete();
    }

    public function adminDeleteProduct($id)
    {
        return Product::find($id)->delete();
    }



}



?>
