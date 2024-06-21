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
    public function index()
    {
        // $teachers = Teacher::all();
        // $teachers = DB::table('users')
        //     ->join('teachers','teachers.user_id','users.id')
        //     ->select( 'users.id','users.email', 'users.name', 'teachers.user_id', 'teachers.id','teachers.birth','teachers.tel','teachers.major','teachers.profile','teachers.certificate')
        //     ->get();
        // return view('teacher.index', compact('teachers'));
        $teachers =  $this->teacher->getAllTeachers();

        return view('teacher.index')->with('teachers', $teachers);
    }

    public function app()
    {
        $teachers =  $this->teacher->getAllTeachers();

        return view('layouts.app')->with('teachers', $teachers);
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        // $request->validate([

        //     'birth' => 'required',
        //     'tel' => 'required',
        //     'major' => 'required',
        //     'profile' => 'required:jpeg,png,jpg,gif,svg|max:2047',
        //     'certificate' => 'required:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
           $id = DB::table('users')->select('id')->orderBy('id', 'DESC')->first();
           $saveRecord = new Teacher;
           $saveRecord->user_id       = $id->id;
           $saveRecord->birth         = $request->birth;
           $saveRecord->tel           = $request->tel;
           $saveRecord->major         = $request->major;
           $saveRecord->profile       = $request->profile;
           $saveRecord->certificate   = $request->certificate;
           $saveRecord->save();

        if ($certificate = $request->file('certificate')) {
            $destinationPath = 'img/';
            $productImage = date('YmdHis') . "." . $certificate->getClientOriginalExtension();
            $certificate->move($destinationPath, $productImage);
            $input['certificate'] = "$productImage";
        }
        if ($profile = $request->file('profile')) {
            $destinationPath = 'img/';
            $productImage = date('YmdHis') . "." . $profile->getClientOriginalExtension();
            $profile->move($destinationPath, $productImage);
            $input['profile'] = "$productImage";
        }
        // $input = $request->all();

        // Teacher::create($input);
        return redirect()->route('teacher.show', $saveRecord->id)
            ->with('success','Product created successfully.');
    }

    // public function show(Teacher $teacher)
    // {
    //     return view('teacher.show', compact('teacher'));
    // }

    public function show($id)
    {
        // get single product

        $teacher = $this->teacher->getSingleTeacher($id);
        return view('teacher.show')->with('teacher', $teacher);
    }

    public function postyoulike($id)
    {
        // get single product

        $teacher = $this->teacher->getSingleTeacher($id);
        return view('teacher.postyoulike')->with('teacher', $teacher);
    }



    public function edit($id)
    {
        $teacher = $this->teacher->editTeacher($id);
        return view('teacher.edit')->with('teacher', $teacher);
        // return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'birth' => 'required',
            'tel' => 'required',
            'major' => 'required',
            'profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'certificate' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $teacher = Teacher::find($id);
        $teacher->birth = $request->get('birth');
        $teacher->tel = $request->get('tel');
        $teacher->major = $request->get('major');

        if ($request->hasFile('profile')) {
            $imageName = time().'.'.$request->profile->extension();
            $request->profile->move(public_path('img'), $imageName);
            $teacher->profile = $imageName;
        }
        if ($request->hasFile('certificate')) {
            $imageName = time().'.'.$request->certificate->extension();
            $request->certificate->move(public_path('img'), $imageName);
            $teacher->certificate = $imageName;
        }
        $teacher->save();
        return redirect()->route('teacher.show', $teacher->id)
        ->with('success','Product created successfully.');



        // $request->validate([

        //     'birth' => 'required',
        //     'tel' => 'required',
        //     'major' => 'required',
        // ]);

        // $input = $request->all();

        // // $id = DB::table('users')->select('id')->first();
        // //    $saveRecord = new Teacher;
        // //    $saveRecord->user_id    = $id->id;
        // //    $saveRecord->birth           = $request->birth;
        // //    $saveRecord->tel         = $request->tel;
        // //    $saveRecord->major         = $request->major;
        // //    $saveRecord->profile       = $request->profile;
        // //    $saveRecord->certificate   = $request->certificate;
        // //    $saveRecord->save();
        // if ($profile = $request->file('profile')) {
        //     $destinationPath = 'img/';
        //     $productImage = date('YmdHis') . "." . $profile->getClientOriginalExtension();
        //     $profile->move($destinationPath, $productImage);
        //     $input['profile'] = "$productImage";
        // } else {
        //     unset($input['profile']);
        // }

        // // if ($profile = $request->file('profile')) {
        // //     $destinationPath = 'img/';
        // //     $productImage = date('YmdHis') . "." . $profile->getClientOriginalExtension();
        // //     $profile->move($destinationPath, $productImage);
        // //     $data['profile'] = "$productImage";
        // // }
        // // else {
        // //     unset($data['profile']);
        // // }



        // if ($certificate = $request->file('certificate')) {
        //     $destinationPath = 'img/';
        //     $productImage = date('YmdHis') . "." . $certificate->getClientOriginalExtension();
        //     $certificate->move($destinationPath, $productImage);
        //     $input['certificate'] = "$productImage";
        // }
        // else {
        //     unset($input['certificate']);
        // }

        // // $teacher->update($data);
        // $this->teacher->updateTeacher($id, $input);
        // return redirect()->route('teacher.index')
        //     ->with('success','Product updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')
            ->with('success','Product deleted successfully');
    }


}
