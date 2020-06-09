<?php

//require __DIR__ . '/vendor/autoload.php';
require 'C:/wamp64/www/loginproject/vendor/autoload.php';
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
//use Illuminate\Http\Request;
//use App\User;
// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC737613321b1765f9bfbdaf11222cf3a5';
$token = 'd0850a44838cd49b26459652e69bb1d7';
$client = new Client($sid, $token);
$TWILIO_SERVICE_SID = 'IS7bce28e279a04d11b2b808ec212c7087';

//$key = $twilio->keys("SKea54265d0834a6c031f3fa83e0dab935")->fetch();

class Api extends CI_Controller {

    //public function messages(Request $request)
    public function __construct()
    {
      parent::__construct();
      if(!isset($_SESSION['user_logged'])){
        $this->session->set_flashdata("error","Please login first to view this page");
        redirect("auth/login");
      }
    }
    public function messages()
    {
    //   $this->load->model('Api_model');
    //  $users = $this->Api_model->get_users();
    //
    // $this->load->view('chat',compact('users'));

      $this->load->view('chat');
    }
    // public function index(Request $request)
    // {
    //         $users = User::where('id', '<>', $request->user()->id)->get();
    //
    //         return view('messages.index', compact('users'));
    // }

  }
    // public function chat(Request $request, $ids)
    //       {
    //       $authUser = $request->user();
    //       $otherUser = User::find(explode('-', $ids)[1]);
    //       $users = User::where('id', '<>', $authUser->id)->get();
    //
    //       $twilio = new Client($sid,$token);
    //
    //       // Fetch channel or create a new one if it doesn't exist
    //       try {
    //               $channel = $twilio->chat->v2->services($TWILIO_SERVICE_SID)
    //                       ->channels($ids)
    //                       ->fetch();
    //       } catch (\Twilio\Exceptions\RestException $e) {
    //               $channel = $twilio->chat->v2->services($TWILIO_SERVICE_SID)
    //                       ->channels
    //                       ->create([
    //                               'uniqueName' => $ids,
    //                               'type' => 'private',
    //                       ]);
    //       }
    //
    //       // Add first user to the channel
    //       try {
    //               $twilio->chat->v2->services($TWILIO_SERVICE_SID)
    //                       ->channels($ids)
    //                       ->members($authUser->email)
    //                       ->fetch();
    //
    //       } catch (\Twilio\Exceptions\RestException $e) {
    //               $member = $twilio->chat->v2->services($TWILIO_SERVICE_SID)
    //                       ->channels($ids)
    //                       ->members
    //                       ->create($authUser->email);
    //       }
    //
    //       // Add second user to the channel
    //       try {
    //               $twilio->chat->v2->services($TWILIO_SERVICE_SID)
    //                       ->channels($ids)
    //                       ->members($otherUser->email)
    //                       ->fetch();
    //
    //       } catch (\Twilio\Exceptions\RestException $e) {
    //               $twilio->chat->v2->services($TWILIO_SERVICE_SID)
    //                       ->channels($ids)
    //                       ->members
    //                       ->create($otherUser->email);
    //       }
    //
    //       return view('messages.chat', compact('users', 'otherUser'));
    //       }
