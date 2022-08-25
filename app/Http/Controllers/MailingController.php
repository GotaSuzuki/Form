<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Form;
use SendGrid;
use Illuminate\Support\Facades\Auth;
class MailingController extends Controller
{
    public function reply($id)
   {
    $detail = Form::find($id);
    $show = Form::where('id', $id)->first();
    $user = Auth::user();
       return view('reply', ['users' => User::all(), 'detail' => $detail, 'show' => $show, 'user' => $user]);
   }

   public function sendMail(Request $request)
   {
        $id = $request->get('id');
        $show = Form::where('id', $id)->first();
       $validated = $request->validate([
           'from' => 'required|email',
           'to' => 'required|email',
           'users.*' => 'required',
           'subject' => 'required|string',
           'body' => 'required|string',
       ]);
       $from = new \SendGrid\Mail\From($validated['from']);
       /* Add selected users email to $tos array */
       $tos = new \SendGrid\Mail\To($validated['to']);
       /* Sent subject of mail */
       $subject = new \SendGrid\Mail\Subject($validated['subject']);
       /* Set mail body */
       $htmlContent = new \SendGrid\Mail\HtmlContent($validated['body']);
       $email = new \SendGrid\Mail\Mail(
           $from,
           $tos,
           $subject,
           null,
           $htmlContent
       );
       /* Create instance of Sendgrid SDK */
       $sendgrid = new SendGrid(getenv('SENDGRID_API_KEY'));
       /* Send mail using sendgrid instance */
       $response = $sendgrid->send($email);
       if ($response->statusCode() == 202) {
           return back()->with(['success' => "E-mails successfully sent out!!"]);
       }
       return back()->withErrors(json_decode($response->body())->errors);
   }
}
