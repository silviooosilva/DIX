<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateRequest;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class newsController extends Controller
{
    public function index()
    {
        $data = DB::table('news')->where('created_by', '=', auth()->user()->name)->get();
        return view('news.index', ['data' => $data]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function createNews(StoreUpdateRequest $request)
    {

        $data = $request->all();
        $data['photo'] = $request->photo->store('newsImages');
        news::create($data);
        return back()->withStatus(__('News created!'));
    }

    public function show(int $id)
    {
        $data = DB::table('news')->where('id', '=', $id)->first();
        return view('news.show', ['data' => $data]);
    }

    public function update(int $id)
    {
        $data = DB::table('news')->where('id', '=', $id)->first();
        return view('news.update', ['data' => $data]);
    }

    public function updateNews(StoreUpdateRequest $request, int $id)
    {
        $data = news::find($id);

        if ($data['photo']) {
            Storage::delete($data['photo']);
        }
        $newPhoto = $request->photo->store('newsImages');

        DB::table('news')->where('id', '=', $id)->update([
            'title' => $request['title'],
            'author' => $request['author'],
            'content' => $request['content'],
            'created_by' => auth()->user()->name,
            'photo' => $newPhoto
        ]);
        return back()->withStatus(__('News Updated'));
    }

    public function delete(int $id)
    {
        if (news::where('id', $id)->exists()) {
            $data = news::find($id);
            $data->delete();
            return redirect('/news')->withStatus(__('News deleted'));
        }
    }
}
