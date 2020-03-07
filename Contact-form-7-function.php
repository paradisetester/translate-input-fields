// getting input fields values

add_filter( 'wpcf7_posted_data', 'save_application_form', 10, 1 );
function save_application_form($array){
     if($array['_wpcf7']=='21291') {
        
    $translation_array = array($array['first-n'],$array['last-name'],$array['your-message'],$array['body_part_pain']);
    $translate_Text = '';
foreach ($translation_array as $taxt) {
    $translate_Text .='&q='.rawurlencode($taxt);
}
    $translated_Text = string_translation($translate_Text); //Storing form data into translation function
    $array['first-n'] = $translated_Text[0]['translatedText'];
    $array['last-name'] = $translated_Text[1]['translatedText'];
    $array['your-message'] = $translated_Text[2]['translatedText'];
    $array['body_part_pain'] = $translated_Text[3]['translatedText'];
     }
    
    return $array;
}

// Using curl to translate string

function string_translation($text) {
     
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
  }
