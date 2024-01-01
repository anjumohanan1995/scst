<?php

namespace App\Http\Controllers;

use App\Models\ShareMail;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\NewsList;
use App\Models\Alumni;
use Img;
use DB;
use App\Mail\SendMail;
use Mail;
use Validator;
use App\Models\IndividualMembership;
use App\Rules\ValidEmailWithoutSpecialChars;

class NewslistController extends Controller
{
    public function index(Request $request)

    {

        $data = NewsList::orderBy('display_order','desc')->get();

       /* $data = DB::table('news_lists')
    ->select('*')
    ->orderBy('id', 'desc')
    ->get();*/



        return view('newslist.index',compact('data'));
    }

    public function newsdisplay(Request $request)

    {

        $data = NewsList::orderBy('display_order','DESC')->get();

        return view('newsdisplay',compact('data'));
    }

    public function create()
    {

        return view('newslist.create');
    }

        public function store(Request $request)

    {


        $this->validate($request, [

            'title' => 'required|unique:news_lists',
        ]);



            $user=new NewsList();
            $user->title=$request->title;
            $user->content=$request->content;
            $user->date=$request->date;

            $slug = str_replace(" ", "-", $request->title);
            $slug = preg_replace('/[^\w\d\-\_]/i', '', $slug);
            $slug = strtolower($slug);

            $user->slug=$slug;

            if($request->file('image')!='')
	        {
	            $image_one = $request->file('image');

	            $input['image'] = time().'.'.$image_one->extension();


	            $destinationPath = public_path('/admin/uploads/newslist');
            	$image_one->move($destinationPath, $input['image']);
	            $user->image=$input['image'];
	        }
            $user->save();
           /*  $m_id =$user->id;
            $data = NewsList::find($m_id);
            $emails = IndividualMembership::select('email')->get();


            foreach ($emails as $key => $email) {

                    Mail::send('mail.news_mail', compact('data'), function($message) use ($email){
                        $message->from('kawikatech01@gmail.com');
                        $message->to($email->email);
                        $message->subject('Added Latest News');

                    });
                }
 */
            return redirect()->route('newslist.index')

                        ->with('success','News created successfully');

	}

	public function edit($id)
    {
        $news = NewsList::find($id);
        return view('newslist.edit',compact('news'));
    }

    public function update(Request $request, $id)

    {
        $this->validate($request, [

            'title' => 'required',
        ]);

        $user = NewsList::find($id);

        $user->title=$request->title;
        $user->content=$request->content;
        $user->date=$request->date;

        if($request->file('image')!='')
        {
            $image_one = $request->file('image');

            $input['image'] = time().'.'.$image_one->extension();

            $destinationPath = public_path('/admin/uploads/newslist');
        	$image_one->move($destinationPath, $input['image']);

            $user->image=$input['image'];
        }

        if($user->update()){

                    return redirect()->route('newslist.index')

                        ->with('success','News updated successfully');
        }

    }

    public function destroy($id)

    {
        NewsList::find($id)->delete();
        return redirect()->route('newslist.index')
        ->with('success','News deleted successfully');
    }

    




    public function changeNewsStatus(Request $request)
    {

        $user = NewsList::find($request->user_id);
        $user->status = $request->status;

        $user->update();

        return response()->json(['success'=>'User status change successfully.']);
    }
    public function changeOrder(Request $request)
    {

        $news = NewsList::find($request->new_id);
       // dd($news->title);
        $news->display_order = $request->order_no;

        $news->update();

        return response()->json(['success'=>'Order change successfully.']);
    }
     public function newsdetails($slug)
    {
        if($slug==NULL)
        {
            return redirect()->back();
        }
         $page=NewsList::select('*')->where('id',$slug)->first();

         if(!$page)
         {
            return redirect()->back();
         }

         return view('newsdetails',compact('page'));

    }
    // public function shareNewsMail($id){
    //     // $m_id =$event->id;
    //          $data = NewsList::find($id);
    //          $emails = IndividualMembership::select('email')->get();
    //          $email_alumni = Alumni::select('email')->get();
    //          $mergedArray = array_merge($emails->toArray(), $email_alumni->toArray());
    //          //  dd($mergedArray);
    //  //dd($emails);
    //          foreach ($mergedArray as $key => $email) {
    //          //dd($email['email']);
    //         // print_r($email['email']);
    //                   Mail::send('mail.news_mail', compact('data'), function($message) use ($email){
    //                      $message->from('websitemail@seemindia.org');
    //                      $message->to($email['email']);
    //                      $message->subject('Latest New From SEEM');

    //                  });
    //              }
    //              return redirect()->back()

    //              ->with('success','Send successfully');
    //  }
    public function shareNewsMail($id){
        // $m_id =$event->id;
             $data = NewsList::find($id);
             $emails = IndividualMembership::select('email')->get();
             $email_alumni = Alumni::select('email')->get();
             $mergedArray = array_merge($emails->toArray(), $email_alumni->toArray());
             //  dd($mergedArray);
     //dd($emails);
             foreach ($mergedArray as $key => $email) {
             //dd($email['email']);
            // print_r($email['email']);

            try {
                $validator = Validator::make(['email' => $email['email']], ['email' => 'email']);

                if ($validator->fails()) {
                    // Email is not valid, log an error or handle it as needed
                    throw new \Exception('Invalid email format: ' . $email['email']);
                }
            $emailModel = ShareMail::create([
                'email' => $email['email'],
                'date' => $data->date,
                'status' => 0,
            ]);
        } catch (\Exception $e) {
            // Log the exception (you can customize this part based on your needs)
            \Log::error('Failed to create ShareMail record: ' . $e->getMessage());
        }

                    //   Mail::send('mail.news_mail', compact('data'), function($message) use ($email){
                    //      $message->from('websitemail@seemindia.org');
                    //      $message->to($email['email']);
                    //      $message->subject('Latest New From SEEM');

                    //  });
                 }
                 return redirect()->back()

                 ->with('success','Send successfully');
     }
     public function testNewsMail()
    {
        $datas = ShareMail::where('email','!=',null)->where('status',0)->take(20)->get();
       // dd($data);
       // $data =array();
        foreach($datas as $data){
            Mail::send('mail.news_mail', compact('data'), function($message) use ($data){
            $message->from('websitemail@seemindia.org');
            $message->to($data['email']);
            // $message->cc('chithra.seem1@gmail.com');
            //$message->bcc('sujiraj@kawikatechnologies.com');
            $message->subject('Latest New From SEEM');

            $updatedRows = ShareMail::where('id', $data->id)
                ->update(['status' => 1]);

                $emailModel = Email::create([
                    'recipient_to' => $data['email'],
                    'recipient_cc' => 'chithra.seem1@gmail.com',
                    'recipient_bcc' => 'sujiraj@kawikatechnologies.com',
                    'subject' => 'Latest New From SEEM',
                    'sent_at' => now(),
                    //'sent_to' => $name, // Ensure $name contains a non-null value
                ]);
            });
            }


    }

}
