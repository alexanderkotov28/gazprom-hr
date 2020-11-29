<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Position;
use App\Status;
use App\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $statuses = Status::orderBy('position')->get();
        $vacancies = Vacancy::with(['status', 'position'])->get();
        return view('admin.vacancies.index', compact('statuses', 'vacancies'));
    }

    public function add()
    {
        $positions = Position::get();
        return view('admin.vacancies.form', compact('positions'));
    }

    public function create(Request $request)
    {
        $data = $request->get('vacancy');
        $data['status_id'] = 1;
        $data['deadline'] = Carbon::parse($data['deadline']);
        $vacancy = Vacancy::create($data);
        return redirect(route('admin.vacancies.index'));
    }
}