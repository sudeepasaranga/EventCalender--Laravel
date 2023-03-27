<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $events = Event::all();
 
         return response()->json([
             'events' => $events,
         ]);
     }

     public function store(Request $request)
     {
         $validated = $request->validate([
             'title' => 'required|string',
             'description' => 'required|string',
             'start_date' => 'required|date',
             'end_date' => 'required|date|after:start_date',
         ]);
 
         $event = new Event;
         $event->title = $validated['title'];
         $event->description = $validated['description'];
         $event->start_date = $validated['start_date'];
         $event->end_date = $validated['end_date'];
         $event->save();
 
         return response()->json([
             'event' => $event,
             
         ]);
     }

     public function show($id)
     {
         $event = Event::find($id);
 
         return response()->json([
             'event' => $event,
         ]);
     }

     public function update(Request $request, $id)
     {
         $validated = $request->validate([
             'title' => 'string',
             'description' => 'string',
             'start_date' => 'date',
             'end_date' => 'date|after:start_date',
         ]);
 
         $event = Event::find($id);
         if (!$event) {
             return response()->json([
                 'message' => 'Event not found',
             ], 404);
         }
 
         $event->title = $validated['title'] ?? $event->title;
         $event->description = $validated['description'] ?? $event->description;
         $event->start_date = $validated['start_date'] ?? $event->start_date;
         $event->end_date = $validated['end_date'] ?? $event->end_date;
         $event->save();
 
         return response()->json([
             'event' => $event,
         ]);
     }

     public function destroy($id)
     {
         $event = Event::find($id);
         if (!$event) {
             return response()->json([
                 'message' => 'Event not found',
             ], 404);
         }
 
         $event->delete();
 
         return response()->json([
             'message' => 'Event deleted successfully',
         ]);
     }


    
}
