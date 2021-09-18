<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Booking::all();

        return view('booking', compact('data'));
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
        $booking = Booking::create([
            'name' => $request->name,
            'phoneNo' => $request->phoneNo,
            'title' => $request->title,
            'vip' => $request->vip,
            'room' => $request->room,
            'date' => $request->date,
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
            'status' => $request->status,
            'dateSubmit' => $request->dateSubmit,
        ]);

        return back()->with('success', 'text');
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
        $booking = Booking::findOrFail($id);

        return view('edit', [
            'booking' => $booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->name = $request->name;
        $booking->phoneNo = $request->phoneNo;
        $booking->title = $request->title;
        $booking->vip = $request->vip;
        $booking->room = $request->room;
        $booking->date = $request->date;
        $booking->startTime = $request->startTime;
        $booking->endTime = $request->endTime;
        $booking->status = $request->status;
        $booking->dateSubmit = $request->dateSubmit;

        $booking->save();

        return back()->with('success', 'text');
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

    public function search()
    {
    }
}
