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

                $twilioAccountSid = 'ACe8ab2bc356670e13e162c6e09ff2abfd';
                $twilioApiKey = 'SK1937ae56927a91438162016470a05927';
                $twilioApiSecret = '0tBXnY8RbaoSZSBg7ynFfrQm5cPX3NyG';
                $twilioServiceSid = 'IS65f8dd0532eb44a3a43507f4c16ece87';
                $authtoken = '3040f869b07033bcd782e746edceeb74';
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
