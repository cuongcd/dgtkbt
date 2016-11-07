<?php namespace App\Http\Controllers;

use Input;
use App\Models\Email;
use Mail;
use Config;

class EventController extends Controller
{

    protected $data;
    protected $content;

    /**
     * send email for user created
     * @param $data
     */
    public function user($data)
    {
        $email = New EmailController();
        $email->sendEmail($data);
    }

    /**
     * send email to the customer
     * @param $data
     */
    public function customer($data)
    {

    }

    /**
     * receive email from customer in contact us
     *
     */
    public function receiveEmail()
    {
        $data = Input::all();
        $data['subject'] = 'Contact Customer';
        $data['key'] = 'contact_us';
        $this->sendEmail($data);
        return \Redirect::route('home.contact')->with('mes', 'ok')->withInput();
    }

    public function sendEmail($input)
    {
        $temp = Email::where('key', '=', $input['key'])->first()->toArray();
        $content = [
            'sender_email' => $temp['sender_email'],
            'sender_name' => $temp['sender_name']
        ];
        $data['name'] = $input['name'];
        $data['phone'] = $input['phone'];
        $data['email'] = $input['email'];
        $data['content'] = $input['content'];
        $data['subject'] = $temp['subject'];
        $this->data = $data;
        $this->content = $content;
        Mail::send('emails.' . $input['key'], array('content' => $content, 'data' => $data), function ($message) {
            $message->from($this->content['sender_email'], $this->content['sender_name']);
            $message->to(Config::get('mail.username'), $this->data['name'])->subject($this->data['subject']);
        });
    }
}