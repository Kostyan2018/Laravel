<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\all;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dsd = BlogCategory::all();
        // dd($dsd);
        $paginator = BlogCategory::paginate(6);
        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $item = new BlogCategory();
      $categoryList = BlogCategory::all();

      return view('blog.admin.categories.edit',
        compact('item', 'categoryList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
       $data = $request->input();
       if(empty($data['slug'])){
           $data['slug'] = Str::slug($data['title']);
       }
       

       //Створює об'єкт але не додає його в БД
       $item = new BlogCategory($data);
       $item->save();
       
    //    Створює об'єкт та додає його в БД
    //    $item = (new BlogCategory())->create($data);

       if($item instanceof BlogCategory) {
           return redirect()->route('blog.admin.categories.edit', [$item->id])
           ->with(['success' => 'Успішно збережено']);
       } else {
          return back()->withErrors(['msg' => 'Помилка збереження'])
          ->withInput();
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BlogCategory::findOrFail($id);
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit',
        compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item = BlogCategory::find($id);
        if (empty($item)) {
            return back()
            ->withErrors(['msg' => "Запис №=[{$id}] не знайдений"])
             ->withInput();
        }

        $data = $request->all();
        if(empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $result = $item->update($data);  
        
        // long variant:
        // $result = $item
        // ->fill($data)
        // ->save();
        
        if($result) {
            return redirect()
            ->route('blog.admin.categories.edit', $item->id)
            ->with(['success' => 'Успішно збережено']);
        }else{
            return back()
            ->withErrors(['msg' => 'Помилка збереження'])
            ->withInput();  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
