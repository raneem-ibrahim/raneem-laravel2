<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\contact;
use Notification;
// use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;
// use Illuminate\Notifications\Notification;
class AdminController extends Controller
{
    public function booking(){
        $datas = booking::all();
        return view('dashborde.pages.booking ' , compact('datas'));
    }
    public function create_room(){
       
        return view('dashborde.pages.room ' );
}
public function add_room(Request $request )
{
     $data = new Room();
     $data ->room_title = $request->title;
     $data ->desecription = $request->description;
     $data ->room_type = $request->type;
     $data ->Price = $request->Price;
     $data ->wifi = $request->wifi;
     $image = $request->image;
     if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('room',$imagename);
        $data->image=$imagename;

     }
     $data->save();
    return redirect()->back(); 


}
public function messages(){
    $datas = contact::paginate(2);
    return view('dashborde.pages.messages' ,compact('datas'));
}
public  function send_email($id)
{
     $data = contact::findOrFail($id);
   return view('dashborde.pages.send_email' , compact('data'));
    //  return view('dashborde.pages.send_email');
}
public function mail(Request $request, $id)
{
    $data = contact::findOrFail($id);

    // تأكد من استقبال جميع القيم من الفورم
    $details = [
        'greeting'     => $request->input('greeting'),  // يجب أن يكون 'greeting'
        'emailbody'    => $request->input('emailbody'), // يجب أن يكون 'emailbody'
        'action_text'  => $request->input('action_text'),
        'action_url'   => $request->input('action_url'),
        'endline'      => $request->input('endline'),
    ];

    // إرسال الإشعار عبر البريد
    $data->notify(new SendEmailNotification($details));

    return redirect()->back()->with('success', 'Email sent successfully!');
}



     public function display_room()
     {
         $datas = Room::all();
        return view('dashborde.pages.display_room' , compact('datas'));
     }
     public function room_delete($id)
     {
        $data = Room::findOrFail($id);
        $data->delete();
        return redirect()->back();
     }
     public function room_update($id)
     {
        $data = Room::findOrFail($id);
    return view('dashborde.pages.room_update' , compact('data'));
     }
     public function room_edit(Request $request , $id)
     {
      $data = Room::findOrFail($id);
      $data->room_title = $request->title;
      $data->desecription = $request->desecription;
      $data->price = $request->price;
      $data->wifi = $request->wifi;
      $data->room_type = $request->room_type;
      $image=$request->image;
      if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('room', $imagename);
        $data->image=$imagename;
      }
      $data->save();
      return redirect()->back();
     }
}
