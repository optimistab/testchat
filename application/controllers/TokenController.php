<?php

require 'C:/wamp64/www/loginproject/vendor/autoload.php';

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;

class TokenController extends CI_Controller
{
        public function generate(Request $request)
        {

                $twilioAccountSid = 'AC737613321b1765f9bfbdaf11222cf3a5';
                $twilioApiKey = 'SK626aeccb14751a59e55524ce5448df55';
                $twilioApiSecret = 'BSJoKaITLmtUsTc1dHinTer4laqFSKzU';
                $twilioServiceSid = 'IS7bce28e279a04d11b2b808ec212c7087';
                $authtoken = '99b2a453866dd784cbdefaee07fabbfb';
          // Required for IP messaging grant
            //    $ipmServiceSid = 'IS7bce28e279a04d11b2b808ec212c7087';
            //    $identity = $this->Api_model->get_users($_SESSION)
                $identity = $_SESSION['username'];
                $token = new AccessToken(
                        $twilioAccountSid,
                        $twilioApiKey,
                        $twilioApiSecret,
                        3600,
                        $identity
                );

                $chatGrant = new ChatGrant();
                $chatGrant->setServiceSid($twilioServiceSid);
                $token->addGrant($chatGrant);

                return response()->json([
                        'token' => $token->toJWT()
                ]);
        }
}
