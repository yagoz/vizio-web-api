<?php

namespace User\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
 
class User extends Eloquent
{

	const DEFAULT_PICTURE_URL = 'https://images01.olx-st.com/ui/50/63/25/80/o_1484617041_c329061c003decba99405d64874ecaf1.jpg';

	const BASE_PICTURE_URL = 'https://images01.olx-st.com/';

    const BASE_POST_URL = 'https://api.olx.com/v1.0/users/images';
    
    public $timestamps = false;

    protected $attributes = array('picture'=>self::DEFAULT_PICTURE_URL);

    protected $guarded = array('id','picture');

	public function saveImage($image){

		$tmp_file = $image->move('/tmp');

        $cfile = curl_file_create($tmp_file,'image/jpeg','picture');

        $data = array('file' => $cfile);
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => self::BASE_POST_URL,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $data,
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
			throw new HttpException(400, 'Error uploading the image');
        } 

        $pictureUrl = self::BASE_PICTURE_URL .  json_decode($response)->url;

        $this->picture = $pictureUrl;
            
	}

}
