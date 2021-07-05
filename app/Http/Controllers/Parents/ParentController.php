<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ParentsRequest;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Type_Blood;
use App\Models\ParentAttachment;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Str;
use App\Models\My_Parent;
class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_parents = My_Parent::all();
        return view('Pages.Parents.index', compact('my_parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Nationalities = Nationalitie::all();
        $Type_Bloods = Type_Blood::all();
        $Religions = Religion::all();


        return view('pages.Parents.add_parent', compact('Nationalities', 'Type_Bloods', 'Religions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParentsRequest $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validated();
            $my_parent = new My_Parent();
            $my_parent->Email = $request->Email;
            $my_parent->Password = Hash::make($request->Password);
            $my_parent->Name_Father = ['en' => $request->Name_Father_en, 'ar' => $request->Name_Father];
            $my_parent->National_ID_Father = $request->National_ID_Father;
            $my_parent->Passport_ID_Father = $request->Passport_ID_Father;
            $my_parent->Phone_Father = $request->Phone_Father;
            $my_parent->Job_Father = ['en' => $request->Job_Father_en, 'ar' => $request->Job_Father];
            $my_parent->Nationality_Father_id = $request->Nationality_Father_id;
            $my_parent->Blood_Type_Father_id = $request->Blood_Type_Father_id;
            $my_parent->Religion_Father_id = $request->Religion_Father_id;
            $my_parent->Name_Mother = ['en' => $request->Name_Mother_en, 'ar' => $request->Name_Mother];
            $my_parent->National_ID_Mother = $request->National_ID_Mother;
            $my_parent->Passport_ID_Mother = $request->Passport_ID_Mother;
            $my_parent->Phone_Mother = $request->Phone_Mother;
            $my_parent->Job_Mother = ['en' => $request->Job_Mother_en, 'ar' => $request->Job_Mother];
            $my_parent->Nationality_Mother_id = $request->Nationality_Mother_id;
            $my_parent->Blood_Type_Mother_id = $request->Blood_Type_Mother_id;
            $my_parent->Religion_Mother_id = $request->Religion_Mother_id;
            $my_parent->Address_Mother = $request->Address_Mother;
            $my_parent->Address_Father = $request->Address_Father;

            $my_parent->save();

            if($request->hasFile('photos')){
                  //  $photo->store('parents', $photo->getClientOriginalName());
                   $imageName = $request->photos->getClientOriginalName();
                  $base = $request->photos->move('images/parents' , $imageName);
                    ParentAttachment::create([
                        'file_name' => $base,
                        'parent_id' => My_Parent::latest()->first()->id,
                    ]);

                DB::commit();
                  toastr()->success(trans('messages.success'));
                return redirect()->route('pages.parents');
            }

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $Nationalities = Nationalitie::all();
            $Type_Bloods = Type_Blood::all();
            $Religions = Religion::all();
            $my_parent = My_Parent::find($id);
    return view('pages.Parents.edit_parent', compact('Nationalities', 'Type_Bloods', 'Religions', 'my_parent'));
        }catch (\Exception $e){

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParentsRequest $request )
    {
        try {

        $validated = $request->validated();
            $my_parents = My_Parent::findOrFail($request->id);
        $my_parents->update([
            $my_parents->Email = $request->Email,
            $my_parents->Password = $request->Password,
            $my_parents->Name_Father = ['en' => $request->Name_Father_en, 'ar' => $request->Name_Father],
            $my_parents->National_ID_Father = $request->National_ID_Father,
            $my_parents->Passport_ID_Father = $request->Passport_ID_Father,
            $my_parents->Phone_Father = $request->Phone_Father,
            $my_parents->Job_Father = ['en' => $request->Job_Father_en, 'ar' => $request->Job_Father],
            $my_parents->Nationality_Father_id = $request->Nationality_Father_id,
            $my_parents->Blood_Type_Father_id = $request->Blood_Type_Father_id,
            $my_parents->Religion_Father_id = $request->Religion_Father_id,
            $my_parents->Name_Mother = ['en' => $request->Name_Mother_en, 'ar' => $request->Name_Mother],
            $my_parents->National_ID_Mother = $request->National_ID_Mother,
            $my_parents->Passport_ID_Mother = $request->Passport_ID_Mother,
            $my_parents->Phone_Mother = $request->Phone_Mother,
            $my_parents->Job_Mother = ['en' => $request->Job_Mother_en, 'ar' => $request->Job_Mother],
            $my_parents->Nationality_Mother_id = $request->Nationality_Mother_id,
            $my_parents->Blood_Type_Mother_id = $request->Blood_Type_Mother_id,
            $my_parents->Religion_Mother_id = $request->Religion_Mother_id,
            $my_parents->Address_Mother = $request->Address_Mother,
            $my_parents->Address_Father = $request->Address_Father,
            ]);

        toastr()->success(trans('messages.Update'));
            return redirect()->route('pages.parents');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
      $photos =  ParentAttachment::select('*')->where('parent_id', '=', $id)->get();
      foreach ($photos as $photo){
             $image = Str::after($photo->file_name, 'public/' );
           $image = base_path('public/' .  $image);
           unlink($image);

      }
       ParentAttachment::where('parent_id', $id)->delete();
        My_Parent::find($id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('pages.parents');
    }
}
