# Translation code for form input fields using Google API

You can use this code for translating form input field translation or for string translation in any language

## Getting Started

Create Google API with Cloud translation API Enable.

### Prerequisites

You need billing account in google console to get API. Its paid and cost you 30$. First time login will get 300 $ credit in your account


### Installing

Run API in curl to translate string or form values.

```
$text = 'YOUR STRINg OR FORM VALUE'
 $apiKey = 'YOUR API KEY';
    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '' . $text . '&source=en&target=ko';
   
    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);
    $responseDecoded = json_decode($response, true);

    curl_close($handle);
 
    return $responseDecoded['data']['translations'];
```

in $url '&source=en&target=ko' these are the language in which language are we getting string and where we are going to translate. For example i am translating English to Korean.

## Running the tests

I have tested this code with Contact form 7 plugin. Code getting Input data from contact form 7  and then translating it into korean before mail.



