<?php


//use GuzzleHttp\Psr7\Request;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    $name = "mahmoed alrabaie";
    return view('about', compact('name'));
});


Route::post('store', function (Request $request) {
    $name = $request->myname;
    return view('about', compact('name'));
});

Route::get('tasks',function(){

    $tasks= DB::table('tasks')->get();

    return view('tasks',compact('tasks'));
});

Route::get('tasks/show/{id}' , function($id){

    $task= DB::table('tasks')->find($id);
    //dd($task);
    return view('show',compact('task'));

});

Route::get('todo', function () {

    // $tasks =DB::table('tasks')->get();
    $tasks= Task::all();


    return view('todo', compact('tasks'));
});

Route::post('store',function(Request $request){

    // DB::table('tasks')->insert([
    //     'title'=> $request-> title
    // ]);

    $task = new Task;
    $task-> title = $request-> title;
    $task -> save();

    return redirect()-> back();

  //  ******************************

});
Route::post('del/{id}', function (Request $d) {
    $tasks = DB::table('tasks')->get();
    $ti = 0;
    foreach ($tasks as $t => $task) {
        $ti = $task->title;
    }
    DB::table('tasks')->where('title', '=', $ti)->delete();
    // $tit = $d->tit;
    // DB::table('tasks')->where('title', $tit)->delete();
    return redirect()->back();
});

//*******************mid************************ */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/all', function () {
    $products = DB::table('products')->get();
    return view('createproduct', compact('products'));
});
Route::get('/create', function () {
    return view('createproduct');
});
Route::post('/store', function (Request $r) {
    DB::table('products')->insert([
        'name' => $r->Product_Name,
        'price' => $r->Product_Price,
        'quantity' => $r->Product_Qty
    ]);
    return redirect()->back();
});
Route::get('del/{id}', function (Request $d, $id) {

    $delete = DB::table('products')->where('id', '=', $id)->delete();
    if ($delete) {
        return redirect()->back();
    }
});
Route::get('/form', function () {
    return view('nameform');
});

Route::post('/nameform', function (Request $d, $id) {
    $data = [
        'name' => $d->Product_Name
    ];
    $result = DB::table('products')
        ->where('id', $id)
        ->update($data);
    if ($result) {
        return redirect()->back();
    }
});
