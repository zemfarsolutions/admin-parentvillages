<?php

namespace App\Http\Controllers;

use App\Models\Intake;
use App\Models\IntakeAnswer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IntakeController extends Controller
{
    public function index()
    {
        $total_records = Intake::all()->count();

        return view('intakes.index', compact('total_records'));
    }

    public function view(Intake $intake)
    {
        $records = Intake::where('id', $intake->id)
            ->with(['answers' => function ($query) {

                $query->with('question');
            }])
            ->first();

        return view('intakes.view', compact('intake'));
    }

    public function create()
    {
        $users = User::all();
        return view('intakes.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address_1' => 'required',
                'address_2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'postal_code' => 'required',
                'gender' => 'required',
                'language' => 'required',
                'age' => 'required',
                'signed' => 'required',
                'question_1' => 'array|required',
                'question_2' => 'required',
                'question_3' => 'required',
                'question_4' => 'array|required',
                'question_5' => 'required',
                'question_6' => 'required',
                'question_7' => 'required',
                'question_8' => 'required',
                'question_9' => 'array|required',
                'question_10' => 'array|required',
                'question_11' => 'required',
                'question_12' => 'array|required',
                'question_13' => 'required',
                'question_14' => 'required',
                'question_15' => 'array|required',
                'question_16' => 'required',
                'question_17' => 'array|required',
                'question_18' => 'required',
                'question_19' => 'required',
                'question_20' => 'required',
                'question_21' => 'required',
                'question_22' => 'required',
                'question_23' => 'array|required',
                'question_24' => 'array|required',
                'question_25' => 'required',
                'question_26' => 'required',
                'question_27' => 'required',

            ],
            $messages = [
                'question_1.required' => 'Field is required',
                'question_2.required' => 'Field is required',
                'question_3.required' => 'Field is required',
                'question_4.required' => 'Field is required',
                'question_5.required' => 'Field is required',
                'question_6.required' => 'Field is required',
                'question_7.required' => 'Field is required',
                'question_8.required' => 'Field is required',
                'question_9.required' => 'Field is required',
                'question_10.required' => 'Field is required',
                'question_11.required' => 'Field is required',
                'question_12.required' => 'Field is required',
                'question_13.required' => 'Field is required',
                'question_14.required' => 'Field is required',
                'question_15.required' => 'Field is required',
                'question_16.required' => 'Field is required',
                'question_17.required' => 'Field is required',
                'question_18.required' => 'Field is required',
                'question_19.required' => 'Field is required',
                'question_20.required' => 'Field is required',
                'question_21.required' => 'Field is required',
                'question_22.required' => 'Field is required',
                'question_23.required' => 'Field is required',
                'question_24.required' => 'Field is required',
                'question_25.required' => 'Field is required',
                'question_26.required' => 'Field is required',
                'question_27.required' => 'Field is required',

            ]
        );

        if ($validate->fails()) {
            return back()
                ->withErrors($validate)
                ->withInput();
        }

        $folderPath = public_path('assets/media/client/signatures/');

        $image_parts = explode(";base64,", $request->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . uniqid() . '.' . $image_type;

        $needle = 'signatures/';
        $path = substr($file, strpos($file, $needle) + strlen($needle));

        file_put_contents($file, $image_base64);

        $intake = Intake::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'gender' => $request->gender,
            'language' => $request->language,
            'age' => $request->age,
            'signature' => $path,
        ]);

        foreach ($request->toArray() as $key => $value) {

            if (strpos($key, 'question') !== false) {

                $question_id = filter_var($key, FILTER_SANITIZE_NUMBER_INT);

                if (gettype($value) == "array") {

                    for ($i = 0; $i < count($value); $i++) {

                        IntakeAnswer::create([
                            'intake_id' => $intake->id,
                            'question_id' => (int)$question_id,
                            'answer' => $value[$i]
                        ]);
                    }
                } else {

                    IntakeAnswer::create([
                        'intake_id' => $intake->id,
                        'question_id' => (int)$question_id,
                        'answer' => $value
                    ]);
                }
            }
        }

        return redirect()->route('intakes.index')->with('success', 'Participant Intake form submitted successfully.');
    }

    public function edit(Intake $intake)
    {
        $users = User::all();
        return view('intakes.edit', compact('intake', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address_1' => 'required',
                'address_2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'postal_code' => 'required',
                'gender' => 'required',
                'language' => 'required',
                'age' => 'required',
                'question_1' => 'array|required',
                'question_2' => 'required',
                'question_3' => 'required',
                'question_4' => 'array|required',
                'question_5' => 'required',
                'question_6' => 'required',
                'question_7' => 'required',
                'question_8' => 'required',
                'question_9' => 'array|required',
                'question_10' => 'array|required',
                'question_11' => 'required',
                'question_12' => 'array|required',
                'question_13' => 'required',
                'question_14' => 'required',
                'question_15' => 'array|required',
                'question_16' => 'required',
                'question_17' => 'array|required',
                'question_18' => 'required',
                'question_19' => 'required',
                'question_20' => 'required',
                'question_21' => 'required',
                'question_22' => 'required',
                'question_23' => 'array|required',
                'question_24' => 'array|required',
                'question_25' => 'required',
                'question_26' => 'required',
                'question_27' => 'required',

            ],
            $messages = [
                'question_1.required' => 'Field is required',
                'question_2.required' => 'Field is required',
                'question_3.required' => 'Field is required',
                'question_4.required' => 'Field is required',
                'question_5.required' => 'Field is required',
                'question_6.required' => 'Field is required',
                'question_7.required' => 'Field is required',
                'question_8.required' => 'Field is required',
                'question_9.required' => 'Field is required',
                'question_10.required' => 'Field is required',
                'question_11.required' => 'Field is required',
                'question_12.required' => 'Field is required',
                'question_13.required' => 'Field is required',
                'question_14.required' => 'Field is required',
                'question_15.required' => 'Field is required',
                'question_16.required' => 'Field is required',
                'question_17.required' => 'Field is required',
                'question_18.required' => 'Field is required',
                'question_19.required' => 'Field is required',
                'question_20.required' => 'Field is required',
                'question_21.required' => 'Field is required',
                'question_22.required' => 'Field is required',
                'question_23.required' => 'Field is required',
                'question_24.required' => 'Field is required',
                'question_25.required' => 'Field is required',
                'question_26.required' => 'Field is required',
                'question_27.required' => 'Field is required',

            ]
        );

        if ($validate->fails()) {
            return back()
                ->withErrors($validate)
                ->withInput();
        }

        if (isset($request->signed)) {
            $folderPath = public_path('assets/media/client/signatures/');

            $image_parts = explode(";base64,", $request->signed);

            $image_type_aux = explode("image/", $image_parts[0]);

            $image_type = $image_type_aux[1];

            $image_base64 = base64_decode($image_parts[1]);

            $file = $folderPath . uniqid() . '.' . $image_type;

            $needle = 'signatures/';
            $path = substr($file, strpos($file, $needle) + strlen($needle));

            file_put_contents($file, $image_base64);

            Intake::where('id', $id)
                ->update([
                    'signature' => $path
                ]);
        }

        Intake::where('id', $id)
            ->update([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'gender' => $request->gender,
                'language' => $request->language,
                'age' => $request->age,
                'signature' => $path,
            ]);

        $delete_intake_ans = IntakeAnswer::where('intake_id', $id)->delete();

        if ($delete_intake_ans) {
            foreach ($request->toArray() as $key => $value) {

                if (strpos($key, 'question') !== false) {

                    $question_id = filter_var($key, FILTER_SANITIZE_NUMBER_INT);

                    if (gettype($value) == "array") {

                        for ($i = 0; $i < count($value); $i++) {

                            IntakeAnswer::create([
                                'intake_id' => $id,
                                'question_id' => (int)$question_id,
                                'answer' => $value[$i]
                            ]);
                        }
                    } else {

                        IntakeAnswer::create([
                            'intake_id' => $id,
                            'question_id' => (int)$question_id,
                            'answer' => $value
                        ]);
                    }
                }
            }
            return back()->with('success', 'Participant Intake form updated successfully.');
        } else {
            return back()->with('error', 'Fail to Update Participant Intake form.');
        }
    }

    public function destroy(Intake $intake)
    {
        $intake->answers()->delete();
        $intake->delete();

        return back()->with('error', 'Intake deleted successfully.');
    }
}
