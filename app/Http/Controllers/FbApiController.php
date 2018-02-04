<?php

namespace App\Http\Controllers;


use FacebookResponseException;
use Facebook\Facebook;
use Facebook\FacebookApp;
use Facebook\FacebookRequest;
use Illuminate\Http\Request;

class FbApiController extends Controller
{

    private $app_id = '1574589049328324';
    private $app_secrect = 'dabaec1ffb970f31ed22ef6f68a5179a';
    private $post_id = '738172236375762';
    private $facebook;

    public function __construct()
    {
        $this->facebook = new Facebook([
            'app_id' => $this->app_id, // Replace {app-id} with your app id
            'app_secret' => $this->app_secrect,
            'default_graph_version' => 'v2.10',
        ]);
    }

    public function fbLogin()
    {

        $helper = $this->facebook->getRedirectLoginHelper();

        $permissions = ['email','user_posts']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('http://spgcrawler.dev/fb_callback', $permissions);

        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
    }

    public function fbCallbackToken(Request $request)
    {

        $helper = $this->facebook->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }


        try {
            $accessToken = $helper->getAccessToken();
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

// Logged in
        echo '<h3>Access Token</h3>';
        var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $this->facebook->getOAuth2Client();

// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        echo '<h3>Metadata</h3>';
        var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId($this->app_id); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }

            echo '<h3>Long-lived</h3>';
            var_dump($accessToken->getValue());
        }
        $request->session()->put('fb_access_token', (string)$accessToken);

    }

    public function getPost(Request $request) {

        //if(session('fb_access_token')) {
            $accessToken = 'EAAWYFJTz0sQBABEPisa9mpsrItmzcZAYVeqlQd6MsjYZCP4ZAG7FPbbXUnZAHhSlEZBDd79UGvjC0ANJcKRWyEogBFklcZCZAq5LlW4VGOakN9ZBRSWDgfT35Tbb6fViy8cVFOFlnaFI8SQxrb0ctWEuj9y7jK3iYxw5Wmqn2QEJrAZDZD';
            try {
                // Returns a `Facebook\FacebookResponse` object
                $response = $this->facebook->get(
                    '/100004545758566_738172236375762',
                    $accessToken
                );
            } catch(FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
        $grapthList = $response->getGraphEdge();
          var_dump($grapthList->getTotalCount());die;
      //  }

    }
}