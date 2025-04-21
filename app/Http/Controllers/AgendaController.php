<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function create()
    {
        return view('new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'jam' => 'required',
            'title' => 'required',
            'description' => 'required',
            'tempat' => 'required',
            'status' => 'required',
            'disposition' => 'required',
        ]);

        Agenda::create([
            'date' => $request->date,
            'jam' => $request->jam,
            'title' => $request->title,
            'description' => $request->description,
            'tempat' => $request->tempat,
            'status' => $request->status,
            'disposition' => $request->disposition,
        ]);

        return redirect()->back()->with('success', 'Agenda berhasil disimpan!');
    }
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->back()->with('success', 'Agenda berhasil dihapus.');
    }

    // New method to get agenda dates for a month
    public function getAgendaDatesForMonth(Request $request)
    {
        $year = $request->query('year');
        $month = $request->query('month');

        if (!$year || !$month) {
            return response()->json(['error' => 'Year and month are required'], 400);
        }

        $startDate = "$year-$month-01";
        $endDate = date("Y-m-t", strtotime($startDate));

        $dates = Agenda::whereBetween('date', [$startDate, $endDate])
            ->pluck('date')
            ->unique()
            ->values();

        return response()->json($dates);
    }

    public function getAgendasByDate($date)
    {
        $agendas = Agenda::whereDate('date', $date)
            ->orderBy('jam')
            ->get();

        return response()->json($agendas);
    }

    public function showByStatus($status)
    {
        // Validasi status agar hanya menerima yang diizinkan
        $allowedStatuses = ['draft', 'tentative', 'confirmed', 'cancel'];
        if (!in_array(strtolower($status), $allowedStatuses)) {
            abort(404); // Jika status tidak valid, tampilkan error 404
        }

        // Ambil data dari database berdasarkan status
        $agendas = Agenda::whereRaw("LOWER(status) = ?", [strtolower($status)])->get();

        // Map 'confirmed' status to 'confirm' view
        $viewName = $status === 'confirmed' ? 'confirm' : $status;
        return view("agenda.$viewName", compact('agendas', 'status'));
    }

    public function index()
    {
        $agendas = Agenda::all();
        return view('agenda.index', compact('agendas'));
    }

    public function draft()
    {
        $agendas = Agenda::where('status', 'draft')->get();
        return view('agenda.draft', compact('agendas'));
    }

    public function tentative()
    {
        $agendas = Agenda::where('status', 'tentative')->get();
        return view('agenda.tentative', compact('agendas'));
    }

    public function confirm()
    {
        $agendas = Agenda::where('status', 'confirmed')->get();
        return view('agenda.confirm', compact('agendas'));
    }

    public function cancel()
    {
        $agendas = Agenda::where('status', 'cancel')->get();
        return view('agenda.cancel', compact('agendas'));
    }

    public function dashboard()
    {
        $draft = Agenda::where('status', "draft")->get();
        $tentative = Agenda::where('status', "tentative")->get();
        $cancel = Agenda::where('status', "cancel")->get();
        $confirm = Agenda::where('status', "confirmed")->get();
        return view('dashboard', compact("draft", "tentative", "cancel", "confirm"));
    }
}
