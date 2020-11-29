<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Position;
use App\Requirement;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::get();
        return view('admin.positions.index', compact('positions'));
    }

    public function add()
    {
        $requirements = Requirement::with('options')->get();
        return view('admin.positions.form', compact('requirements'));
    }

    public function edit($position_id)
    {
        $requirements = Requirement::with('options')->get();
        $position = Position::with('options')->find($position_id);
        $data = $position->options->groupBy('requirement_id')->toArray();

        $result = [];
        foreach ($data as $r_id=>$value){
            $r = Requirement::with('options')->find($r_id)->toArray();
            $r['selected_requirement'] = $r;
            $r['options_multiple'] = $value;
            $result[] = $r;
        }

        return view('admin.positions.form', compact('requirements', 'position', 'result'));
    }

    public function create(Request $request)
    {
        $pos_data = $request->get('position');
        $pos_data['scheduale'] = $pos_data['sheduale'];
        unset($pos_data['sheduale']);
        $position = Position::create($pos_data);

        $requirements = json_decode($request->get('data'), true);

        $sync = [];

        foreach ($requirements as $requirement) {
            if ($requirement['selected_requirement']['type'] === 'select-years') {
//                $sync[] = $requirement['exp']['id'];
            } else {
                foreach ($requirement['options_multiple'] as $opt) {
                    $sync[] = $opt['id'];
                }
            }
        }

        $position->options()->sync($sync);
        return redirect(route('admin.positions.index'));
    }

    public function update(Request $request, $position_id)
    {
        $position = Position::find($position_id);

        $pos_data = $request->get('position');
        $pos_data['scheduale'] = $pos_data['sheduale'];
        unset($pos_data['sheduale']);

        $position->update();

        $requirements = json_decode($request->get('data'), true);

        $sync = [];

        foreach ($requirements as $requirement) {
            if ($requirement['selected_requirement']['type'] === 'select-years') {
//                $sync[] = $requirement['exp']['id'];
            } else {
                foreach ($requirement['options_multiple']??[] as $opt) {
                    $sync[] = $opt['id'];
                }
            }
        }

        $position->options()->sync($sync, false);
        return redirect(route('admin.positions.index'));
    }
}