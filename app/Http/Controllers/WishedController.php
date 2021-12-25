<?php

namespace App\Http\Controllers;

use App\Models\Wished;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class WishedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg',


        ]);

        $order = 1;
        if ($order) {
            $voeux_order = $order;
            $order = $voeux_order + 1;
        }


        $formated_order = $order;
        if ($order < 10) {
            $formated_order = '00' . $order;
        } elseif ($order < 100) {
            $formated_order = '0' . $order;
        }
        $matrix = $formated_order;



        $filename = $this->move($request->file('image'));

        try {
            $data['image'] = $filename;
            $data['order'] = $order;
            $data['matrix'] = $matrix;
            $wished = Wished::create($data);
            $wished->id;
            Alert::success('Félicitations', 'Carte créée avec succès');
            return redirect()->route('wishes.show', $wished);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wished  $wished
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('wished.show', [
            'wished' => Wished::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wished  $wished
     * @return \Illuminate\Http\Response
     */
    public function edit(Wished $wished)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wished  $wished
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wished $wished)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wished  $wished
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wished $wished)
    {
        //
    }
    private function move($image)
    {
        $originalImage = $image;
        //$filename = time() . '-' . $originalImage->getClientOriginalName();
        $filename = uniqid() . $originalImage->getClientOriginalName() . '.' . $originalImage->getClientOriginalExtension();
        $thumbnailImage = Image::make($originalImage);

        $lgPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'lg' . DIRECTORY_SEPARATOR;
        $smPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'sm' . DIRECTORY_SEPARATOR;
        $xsPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'xs' . DIRECTORY_SEPARATOR;


        $thumbnailImage->resize(590, 590);
        $thumbnailImage->save($lgPath . $filename);
        $thumbnailImage->resize(90, 90);
        $thumbnailImage->save($smPath . $filename);
        $thumbnailImage->resize(45, 45);
        $thumbnailImage->save($xsPath . $filename);

        return $filename;
    }
}
