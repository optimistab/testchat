<?php

//require __DIR__ . '/vendor/autoload.php';
require 'C:/wamp64/www/loginproject/vendor/autoload.php';
require 'TokenController.php';
//require_once('./twilio-php/Services/Twilio.php');
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;
//use Illuminate\Http\Request;
//use App\User;
// Your Account SID and Auth Token from twilio.com/console
// $sid = '';
// $token = 'd0850a44838cd49b26459652e69bb1d7';
// $client = new Client($sid, $token);
// $TWILIO_SERVICE_SID = '';

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
        $this->load->library('session');
      if(!isset($_SESSION['user_logged'])){
        $this->session->set_flashdata("error","Please login first to view this page");
        redirect("auth/login");
      }

      $twilioAccountSid = 'ACe8ab2bc356670e13e162c6e09ff2abfd';
  //    $twilioApiKey = 'SKea54265d0834a6c031f3fa83e0dab935';
    //  $twilioApiSecret = 'BHDYJ6UJOJHU6Lv9HrIaZtYaswlTqz7q';
      $twilioServiceSid = 'IS65f8dd0532eb44a3a43507f4c16ece87';
      $authtoken = '3040f869b07033bcd782e746edceeb74';
// Required for IP messaging grant
  //    $ipmServiceSid = 'IS7bce28e279a04d11b2b808ec212c7087';

      $twilio = new Client($twilioAccountSid, $authtoken);
      $identity = $_SESSION['username'];
      // $user = $twilio->chat->v2->services($twilioServiceSid)
      //                    ->users
      //                    ->create($identity);
                         //   $this->load->model('Api_model');
      $this->load->model('Api_model');

      $result['users'] = $this->Api_model->get_users();

      $tokengenerator = new TokenController ();
      $accesstoken = $tokengenerator->generate();

      $this->load->view('chat',$accesstoken,$result);
    }
  }
      //$this->load->model('Api_model');
    //  $identity  = $this->Api_model->get_users();
// Create access token
    //   $token = new Services_Twilio_AccessToken(
    //   $twilioAccountSid,
    //   $twilioApiKey,
    //   $twilioApiSecret,
    //   3600,
    //   $identity
    //   );
    // $ipmGrant = new Services_Twilio_Auth_IpMessagingGrant();
    // $ipmGrant->setServiceSid($ipmServiceSid);
    // $token->addGrant($ipmGrant);


  //  $token  = "your_auth_token";
    // $twilio = new Client($twilioAccountSid, $authtoken);
    //
    // $user = $twilio->chat->v2->services($twilioServiceSid)
    //                      ->users
    //                      ->create("identity");
    //

    // Add grant to token
    //   $this->load->model('Api_model');
    // $this->load->view('chat',compact('users'));
    //echo view('content', $data);

    // public function index(Request $request)
    // {
    //         $users = User::where('id', '<>', $request->user()->id)->get();
    //
    //         return view('messages.index', compact('users'));
    // }


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
