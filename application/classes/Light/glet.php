<?php

if($_SERVER['HTTP_HOST'] == 'localhost'){
    require 'curl.php';
}

require 'gibberishaes.php';
require 'Gkencode.php';

class Light_Glet{

    protected $pregDefault="\<source\ssrc=\'(.*?)\'\s";
    protected $pregDefault2="\<source\ssrc=\"(.*?)\"\s";
    protected $pregDefault3="file:.*?\"(.*?)\",";
    protected $pregDefault4="iframe\ssrc=\"(.*?)\"\i";
    protected $pregDefault5='source\s.*?src=\"(.*?)\"';

    public function _dataResult($url, $img, $quality, $itag = NULL){
        $dataVideo = array_filter(array(
            //'file'       => DOMAIN.'proxy/'._combinPass($url,'encode'),
            'file'  => $url,
            'img'   => $img,
            'label' => $quality,
            'type'  => "video/mp4",
        ));

        return $dataVideo;
    }

    public function _combinPass($str, $value){
        switch ($value) {
            case 'encode': {
                $hash = "vWYpjQAMNdU5z/POJGF2xaZXSVgL9DIfcB1=rCuHt6+8nysm0i3olbq4EkKewh7TR";
                $key = "ZXTlPv9uMIRhejyzCc3HwGtUiaVSxqYfQpBKmk5DdON2AWJ41nE06gL8soF/+r7=b";
                return strtr(base64_encode(trim($str)), $key, $hash);
                break;
            }
            case 'decode': {
                $hash = "vWYpjQAMNdU5z/POJGF2xaZXSVgL9DIfcB1=rCuHt6+8nysm0i3olbq4EkKewh7TR";
                $key = "ZXTlPv9uMIRhejyzCc3HwGtUiaVSxqYfQpBKmk5DdON2AWJ41nE06gL8soF/+r7=b";
                return base64_decode(strtr(trim($str), $hash, $key));
                break;
            }
        }
    }

    public function _filter_resolution($filter){
        $arr=array(
            '18',
            '43',
            '22',
            '37',
            '38',
            '59'
        );

        if(in_array($filter,$arr)){
            return TRUE;
        }
    }

    public function _chacSource($str){
        $arr=array(
            'type',
            'label',
            'file',
        );

        $arr2 = array('"type"','"label"','"file"');

        $str = str_replace($arr,$arr2,$str);
        return $str;
    }

    public function fecthItemPicasa($data){
        $objItem = NULL;
        $arrData = array();
        $data = explode(',"url\u003d',$data);
        $data = @explode('"',$data[1]);
        if (substr_count($data[0],',url\u003d')>0){
            $v = explode(',url\u003d',$data[0]);
            $n = count($v);
            $link ="";
            for ($i=0;$i<$n;$i++)
            {
                $default = false;
                $link = urldecode($v[$i]);
                $link = str_replace(array('\u003d', '\u0026'), array('=', '&'), $link);
                $quality = explode('quality=', $link);
                if (substr_count($link,"video/mp4") > 0 ){
                    $link = explode(";", $link);
                    $link = $link[0];
                    $link = str_replace("&itag", "?itag", $link);
                    $label = str_replace(array('hd720', 'large' , 'medium', 'small'), array('720', '480' , '360' , '240'), $quality[1]);
                    $arrData[] = array (
                        'file' => $link,
                        'type' => 'mp4',
                        'label' => $label
                    );
                }

            }

        } else {
            $link = urldecode($data[0]);
            $link = str_replace(array('\\u003d', '\\u0026'), array('=', '&'), $link);
            if (substr_count($link,"video/mp4") > 0){
                $link = explode(";", $link);
                $link = $link[0];
                $link = str_replace("&itag", "?itag", $link);
                $quality = explode('quality=', $link);
                $arrData[] = array (
                    'file' => $link,
                    'type' => 'mp4',
                    'label' => str_replace(array('hd720', 'large' , 'medium', 'small'), array('720', '480' , '360' , '240'), $quality[1])
                );
            }
        }
        return array_reverse($arrData);
    }

    public function _resolution_video($itag){

        $arr=array(
            '137'=>'1080p',
            '136'=>'720p',
            '135'=>'480p',
            '134'=>'360p',
            '133'=>'240p', // Error
            '160'=>'144p',
            '140'=>'140p', // Error

            '18'=>'360p',
            '34'=>'360p',
            '59'=>'480p',
            '48'=>'480p',
            '44'=>'480p',
            '35'=>'480p',
            '43'=>'480p',
            '22'=>'720p',
            '45'=>'720p',
            '46'=>'1080p',
            '37'=>'1080p',

            'hd720' => '720p',
            'large' => '480p',
            'medium' => '360p',

            'm18'=>'360p',
            'm34'=>'360p',
            'm43'=>'480p',
            'm44'=>'480p',
            'm35'=>'480p',
            'm22'=>'720p',
            'm45'=>'720p',
            'm46'=>'1080p',
            'm37'=>'1080p',

            '640'=>'640p',
            '1280'=>'1280p',

            '1080'=>'1080p',
            '720'=>'720p',
            '360'=>'360p',
            '480'=>'480p',

            '1080p'=>'1080p',

            '1080P'=>'1080p',
            '720P'=>'720p',
            '360P'=>'360p',
            '480P'=>'480p',

            '360p SD'=>'360p',
            '720p HD'=>'720p',

            '360p'=>'360p',
            '720p'=>'720p',

            '832000' => '480p',
            '320000'=>'240p',
            '2176000'=>'720p',

            '5'=>'240p',
            '36'=>'240p',
            '17'=>'144p',
            '514'=>'514p',
            '320x240'=>'240p',
            '512x384'=>'384p',
            '360x640'=>'360p',
            '848x480'=>'480p',
            '1280x720'=>'720p',
            '1920x1080'=>'1080p',
            '720x1280'=>'720p',
            '640x360'=>'640p',
            '1280x720'=>'1280p',

            'location'=>'480p',
            'lowquality'=>'360p',
            'highquality'=>'720p',

            'mobile'=>'144p',
            'lowest'=>'240p',
            'low'=>'360p',
            'sd'=>'480p',
            'hd'=>'720p',
            'full'=>'1280p',

            'f360'=>'360p',
            'f480'=>'480p',
            'f720'=>'720p'
        );

        return $arr[$itag];
    }

    public function _filter_video($filter){

        $arr=array(
            'video/3gpp',
            'image/gif',
            'image/jpeg',
            'application/x-shockwave-flash',
            'video/3gpp',
            'video/x-flv',
            'jpg',
            'sd_src_no_ratelimit',
            'hd_src_no_ratelimit',
            'http://',
            'f3gp',
            'Video3GP',
            '3gp',
            'http://r2',
            'application/dash xml',
            'application/x-mpegURL',
            'stream14',
            ''
        );

        if(in_array($filter,$arr)){
            return TRUE;
        }
    }

    public function _decodeHTML($arr){
        $decodehtml=str_replace(
            array('%5B','%7B','%22','%2C','%3A','%5C%2F','%3F','%3D','%7D','%5D','%5Cu00253D','%26','%2F','%2B','%7C','%3B','\u00257B', '\u002522', '\u00253A', '\u00252C', '\u00255B', '\u00255C\u00252F', '\u00252F', '\u00253F', '\u00253D', '\u002526','\u0026','\u003d','&amp;'),
            array('[','{','"',',',':','\/','?','=','}',']','=','&','/','+','|',';','{', '"', ':', ',', '[', '\/', '/', '?', '=', '&','&','=','&'), $arr);
        return htmlspecialchars_decode($decodehtml);
    }

    public function _checkExitLinkDocs($html){
        if (substr_count($html, "&fmt_stream_map=") > 0){
            $data = explode('&fmt_stream_map=',$html);
            $data = explode('&',$data[1]);
            $data[0] = urldecode($data[0]);
            return $data[0];
        } else if (substr_count($html, '"fmt_stream_map","') > 0){


            $data = explode('"fmt_stream_map","',$html);
            $data = explode('"',$data[1]);

            return $data[0];
        }
        return "";
    }

    public function getIp(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']) == true){
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        }else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) == true){
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else if(isset($_SERVER['HTTP_X_FORWARDED']) == true){
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        }else if(isset($_SERVER['HTTP_FORWARDED_FOR']) == true){
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        }else if(isset($_SERVER['HTTP_FORWARDED']) == true){
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        }else if(isset($_SERVER['REMOTE_ADDR']) == true){
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }else{
            $ipaddress = '127.0.0.1';
        }
        return $ipaddress;
    }

    public function _viewSource($url , $device = false, $referer = true, $noheader = false , $transferHerder = false , $cookie = '' , $json = false){
        $headers = array(
            "User-Agent: Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36",
            "Content-Type: application/x-www-form-urlencoded",
        );

        if ($referer == true){

            $referer = $url;
        }

        if ($device == true){

            $headers = array(
                "Mozilla/5.0 (Linux; U; Android 2.3.7; zh-cn; c8650 Build/GWK74) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1s",
                "Connection: keep-alive', 'Keep-Alive: 300', 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7', 'Accept-Language: en-us,en;q=0.5",
            );
        }
        if ($noheader == true){
            $headers = array(
                //"User-Agent: Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36",
                "Content-Type: application/x-www-form-urlencoded",

            );
            $headers[] = 'X-Forwarded-For: ' . $this->getIp();
            $headers[] = 'CLIENT-IP: ' . $this->getIp();
        }
        if ($json == true){
            $headers = array(
                "User-Agent: Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36",
                "Content-Type: application/json; charset=utf-8",
            );
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HEADER, $transferHerder );
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        if($var) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $var);
        }
        curl_setopt($ch, CURLOPT_URL,$url);

        return curl_exec($ch);
    }

    public function gkEncode($link){
        $gkencode = new Gkencode();
        $secretKey = 'QtnYUeivGXAskmJz218Q';
        return $gkencode->encrypt($link,$secretKey);
    }

    public function rc4( $key_str, $data_str ) {
        // convert input string(s) to array(s)
        $key = array();
        $data = array();
        for ( $i = 0; $i < strlen($key_str); $i++ ) {
            $key[] = ord($key_str{$i});
        }
        for ( $i = 0; $i < strlen($data_str); $i++ ) {
            $data[] = ord($data_str{$i});
        }
        // prepare key
        $state = array( 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,
            16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,
            32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,
            48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,
            64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,
            80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,
            96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,
            112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,
            128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,
            144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,
            160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,
            176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,
            192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,
            208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,
            224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,
            240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255 );
        $len = count($key);
        $index1 = $index2 = 0;
        for( $counter = 0; $counter < 256; $counter++ ){
            $index2   = ( $key[$index1] + $state[$counter] + $index2 ) % 256;
            $tmp = $state[$counter];
            $state[$counter] = $state[$index2];
            $state[$index2] = $tmp;
            $index1 = ($index1 + 1) % $len;
        }
        // rc4
        $len = count($data);
        $x = $y = 0;
        for ($counter = 0; $counter < $len; $counter++) {
            $x = ($x + 1) % 256;
            $y = ($state[$x] + $y) % 256;
            $tmp = $state[$x];
            $state[$x] = $state[$y];
            $state[$y] = $tmp;
            $data[$counter] ^= $state[($state[$x] + $state[$y]) % 256];
        }
        // convert output back to a string
        $data_str = "";
        for ( $i = 0; $i < $len; $i++ ) {
            $data_str .= chr($data[$i]);
        }
        return $data_str;
    }

    public function test(){
        $key = 'QW5oIENoYW5nIFh1aSBRdWF5IHRhcCAx';
        $text = "8ce46ffa35805780571877c8ae5808f6a5e8898ebf9d294326735716694ccb428508dffb3db1d2d3a2785f360623a25e515fbf71145966db8410216b76710141068386740d5464d4f419023b60b20e006c01c6d77a747bc924f8d366407e7ef6ddd36bbb588518780224a74e5a9efeca";
        $url = $this->_combinPass($text,'decode');

        echo '<pre>';
        print_r($url);
        echo '</pre>';
    }

    public function youtube($link,$episode_id = NULL){

        $exp=parse_url($link,PHP_URL_QUERY);
        $videoid=str_replace('v=','',$exp);

        $json='http://www.youtube.com/get_video_info?&video_id='.$videoid;

        if($contentHtml = $this->_viewSource($json, true , true, false, true)){

            parse_str($contentHtml,$data);
            parse_str($contentHtml,$dataimg);

            if($data['use_cipher_signature'] === 'False'){

                if(!is_null($data['url_encoded_fmt_stream_map'])) {

                    foreach(explode(',', urldecode($data['url_encoded_fmt_stream_map'])) as $url) {

                        $url = urldecode($url);

                        $url = str_replace(array('"','?','; ',' '), array('','&','&',''), $url);

                        parse_str($url,$data);

                        $arrDomain = parse_url($data['url']);

                        $url = str_replace($arrDomain['host'], "redirector.googlevideo.com", $data['url']);

                        unset($data['url']);

                        $link = str_replace('; codecs', '&codecs', $url . '?' . urldecode(http_build_query($data)));

                        if(strpos($link,'http://')!==false){

                            if($this->_filter_video($data['type']) != TRUE || $this->_filter_resolution($data['itag']) != FALSE) {

                                $quality = $this->_resolution_video($data['itag']);
                                $result[] = $this->_dataResult($link, $dataimg['iurl'], $quality, $data['type']);
                            }
                        }
                    }
                }else{

                    if(preg_match('/;ytplayer\.config\s*=\s*({.*?});/', $contentHtml, $matches)){

                        $jsonData  = json_decode($matches[1], true);

                        foreach (explode(',', $jsonData['args']['url_encoded_fmt_stream_map']) as $url) {
                            $url = urldecode($url);

                            $url = str_replace(array('"','?','; ',' '), array('','&','&',''), $url);

                            parse_str($url,$data);

                            $arrDomain = parse_url($data['url']);

                            $url = str_replace($arrDomain['host'], "redirector.googlevideo.com", $data['url']);

                            unset($data['url']);

                            $link = str_replace('; codecs', '&codecs', $url . '?' . urldecode(http_build_query($data)));

                            if ($this->_filter_video($data['type']) != TRUE AND $this->_filter_resolution($data['itag']) != FALSE) {

                                $quality = $this->_resolution_video($data['itag']);
                                $result[] = $this->_dataResult($link, $dataimg['iurl'], $quality, $data['type']);
                            }
                        }
                    }
                }

            }else{

                $link = str_replace('/watch?v=', '/embed/', $link);

                if(strpos(get_headers($link)[0],'302')!==false || strpos(get_headers($link)[0],'404')!==false){
                        $result[] = array('embed'=> 1,'link'=> '<div data-episode_id="'.$episode_id.'" id="error_play"></div>');
                    }else{
                        $result[] = array('embed'=> 1,'link'=> '<iframe width="100%" height="100%" src="'.$link.'" frameborder="0" allowfullscreen></iframe>');
                    }
                
            }
            return $result;
        }
    }

    public function tvZing($link){

        //$linkg = base64_encode(base64_encode($this->rc4('xps_streaming',$link)));

        //$dataURL = 'http://grab.xemphimbox.com/player.js.php?key=3e8ba187a423e3a953d34f3291a76a99&file='.$linkg;

        if($contentHtml = $this->_viewSource($link , true , true, true, true)){
       
            if(preg_match('#sources:\s(.*)\][,]#s',$contentHtml,$matches)){
                
                if($jsonData = json_decode($matches[1].']',true)){

                    foreach($jsonData as $item){

                        if ($this->_filter_video($item['type']) != TRUE || $this->_filter_resolution($data['label']) != FALSE) {

                            $quality = $this->_resolution_video($data['label']);

                            $result[] = $this->_dataResult($item['file'], NULL, $quality, $item['type']);
                        }
                    }
                }
            }else{
                $result[] = array('embed'=> 1,'link'=> '<div data-episode_id="'.$episode_id.'" id="error_play"></div>');
            }
            return $result;
        }
    }

    public function picasaGoogle($link){
        $text = $this->_viewSource($link , false , false, false, true);
        if (strpos($text , '302 Move') !== false){
            $new_link = explode('Location:' , $text);
            $new_link = explode("\r\n" , $new_link[1]);
            $new_link = trim($new_link[0]);
            if(strpos($link,"#")!==false){
                $idItemAlbum = explode("#",$link);
                $idItemAlbum = $idItemAlbum[1];
                $new_link = str_replace('?source=' , '/photo/' . $idItemAlbum . '?source=' , $new_link);
            }
            $new_link = str_replace("/pwa/" , "/pwaf/" , $new_link);
            $text = $this->_viewSource($new_link , false , false, false, true);
        }
        if (strpos($text , '302 Found') !== false){
            $new_link = explode('Location:' , $text);
            $new_link = explode("\r\n" , $new_link[1]);
            $new_link = trim($new_link[0]);
            $text = $this->_viewSource($new_link ,false , false, false, true);
        }
        $CT = $text;
        if(strpos($link,"#")!==false){
            $idItemAlbum = explode("#",$link);
            $idItemAlbum = $idItemAlbum[1];
            $m1 = '"' . $idItemAlbum . '"';
            $CT = explode($m1,$text);
            $CT = explode('"]',$CT[1]);
            $CT = $CT[0];
        }
        $arrData = $this->fecthItemPicasa($CT);

        foreach($arrData as $item){

            if ($this->_filter_video($item['type']) != TRUE) {

                $quality = $this->_resolution_video($item['label']);

                $result[] = $this->_dataResult($item['file'], NULL, $quality, $item['type']);
            }
        }
        return $result;
    }

    public function driveGoogle($link,$episode_id = NULL){

        $curl = new Light_Curl();

        $curl->setReferrer($link);

        $linkg = base64_encode(base64_encode($this->rc4('xps_streaming',$link)));

        $dataURL = 'http://grab.xemphimbox.com/player.js.php?file='.$linkg;

        if($contentHtml = $curl->get($dataURL)){

            if(preg_match('#sources\s=\s\[(.*?)\][;]#i',$contentHtml,$matches) || strpos($contentHtml,'404')!==true){

                if($jsonData = json_decode('['.$matches[1].']',true)){
                    
                    foreach($jsonData as $item){

                        if ($this->_filter_video($item['type']) != TRUE || $this->_filter_resolution($item['label']) != FALSE) {

                            $quality = $this->_resolution_video($item['label']);

                            $result[] = $this->_dataResult($item['file'], NULL, $quality, $item['type']);
                        }
                    }
                }else{
                    $link = str_replace(array('/view','/edit','/view?pli=1','/view?usp=sharing','/view/'), '/preview', $link);

                    if(strpos(get_headers($link)[0],'302')!==false || strpos(get_headers($link)[0],'404')!==false){
                        $result[] = array('embed'=> 1,'link'=> '<div data-episode_id="'.$episode_id.'" id="error_play"></div>');
                    }else{
                        $result[] = array('embed'=> 1,'link'=> '<iframe frameBorder="0" src="'.$link.'" width="100%" height="100%"></iframe>');
                    }
                }
            }
            $curl->close();
            return $result;
        }
    }

    public function photosGoogle($link){

        $curl = new Light_Curl();

        $curl->setReferrer($link);

        if($contentHtml = $curl->get($link)){

            if(preg_match('#640x360[,]36\/320x180\"[,](.*)\]#i', $contentHtml, $matches)) {
                $matches[1] = str_replace('"', '', $matches[1]);
                $matches[1] = $this->_decodeHTML($matches[1]);

                foreach (explode(',', $matches[1]) as $url) {

                    $url = urldecode($url);

                    parse_str($url, $data);

                    if ($this->_filter_video($data['type']) != TRUE) {

                        $quality = $this->_resolution_video($data[itag]);

                        $result[] = $this->_dataResult($data[url], NULL, $quality, $data['type']);
                    }
                }
            }else{
                $data = explode(',"url\u003d',$contentHtml);
                $data = explode('"',$data[1]);

                $data[0] = 'url='.$data[0];
                $data[0] = $this->_decodeHTML($data[0]);

                foreach (explode(',', $data[0]) as $url) {

                    $url = urldecode($url);

                    parse_str($url, $data);

                    if ($this->_filter_video($data['type']) != TRUE) {

                        $quality = $this->_resolution_video($data['itag']);

                        $result[] = $this->_dataResult($data['url'], NULL, $quality, $data['type']);
                    }
                }
            }
            return $result;
        }
    }

    public function plusGoogle($link){
        if(strpos($link, '?')){
            $p = explode('?',$link);
            $p = $p[1];
            parse_str($p,$a);
            preg_match('#photos/(.*?)/albums/(.*?)/(.*?)$#', $link,$match);

            if (isset( $match[1]) == true){
                $link = 'https://plus.google.com/_/photos/lightbox/photo/' . $match[1]  .'/' . $match[3];
            } else if (isset($a['oid']) == true) {
                $link = 'https://plus.google.com/_/photos/lightbox/photo/' . $a['oid']  .'/' . $a['pid'] . "?local=1";
                if (isset($a['authkey'])) {
                    $link  .= "&authkey=" . $a['authkey'];
                }
            } else {
                $pz = explode('?',$link);
                $ex = explode("photos/photo/" , $pz[0]);
                $link = 'https://plus.google.com/_/photos/lightbox/photo/' . $ex[1] . "?local=1";
                if (isset($a['authkey'])) {
                    $link  .= "&authkey=" . $a['authkey'];
                }
            }
            $link .= '&soc-app=2&cid=0&soc-platform=1&ozv=es_oz_20140723.12_p1&avw=phst%3A31&f.sid=-6129781934038072053&_reqid=273570&rt=j';

        }else{

            preg_match('#photos/(.*?)/albums/(.*?)/(.*?)$#', $link ,$match);
            if (isset( $match[1]) == true){
                $link = 'https://plus.google.com/_/photos/lightbox/photo/' . $match[1]  .'/' . $match[3];
            } else {
                $ex = explode("photos/photo/" , $link);
                $link = 'https://plus.google.com/_/photos/lightbox/photo/' . $ex[1] . "?local=1";
                if (isset($a['authkey'])) {
                    $link  .= "&authkey=" . $a['authkey'];
                }
            }
            $link .= '?soc-app=2&cid=0&soc-platform=1&ozv=es_oz_20140723.12_p1&avw=phst%3A31&f.sid=-6129781934038072053&_reqid=273570&rt=j';
        }

        if($contentHtml = $this->_viewSource($link,true , true, false, true)){
            if(strpos($contentHtml, 'The document has moved')){
                $link = explode('<A HREF="',$contentHtml);
                $link = explode('">here</A>',$link[1]);
                $link = $link[0];
                if(strpos($link, '?')){
                    $link .= '&soc-app=2&cid=0&soc-platform=1&ozv=es_oz_20140715.10_p2&avw=phst%3A31&f.sid=--1275557768769984423&_reqid=790123&rt=j';
                }else{
                    $link .= '?soc-app=2&cid=0&soc-platform=1&ozv=es_oz_20140715.10_p2&avw=phst%3A31&f.sid=--1275557768769984423&_reqid=790123&rt=j';
                }
                $contentHtml = $this->_viewSource($link,true , true, false, true);
            }
            if(strpos($contentHtml,'redirector.googlevideo.com')){

                if(strpos($contentHtml,'https://redirector.googlevideo.com')){
                    $ptc = 'https';
                }else{
                    $ptc = 'http';
                }

                if(preg_match_all('#\[([0-9]+),([0-9]+),([0-9]+),"' . $ptc . '://redirector.googlevideo.com/(.*?)"#',$contentHtml,$match)){
                    foreach ($match[4] as $k => $v){
                        $json = '{"link":"' . $ptc . '://redirector.googlevideo.com/' . $v . '"}';
                        $m = json_decode($json);
                        $vlink = $m->link;

                        if ($this->_filter_resolution($match[1][$k]) != FALSE){

                            $quality = $this->_resolution_video($match[1][$k]);

                            $result[] = $this->_dataResult($vlink, NULL, $quality, NULL);
                        }
                    }
                }
            }else if(strpos($contentHtml,'lh3.googleusercontent.com')){

                if(preg_match_all('#\[([0-9]+),([0-9]+),([0-9]+),"https://lh3.googleusercontent.com/(.*?)"#',$contentHtml,$match)){

                    foreach ($match[4] as $k => $v){
                        $json = '{"link":"https://lh3.googleusercontent.com/' . $v . '"}';
                        $m = json_decode($json);
                        $vlink = $m->link;

                        if ($this->_filter_resolution($match[1][$k]) != FALSE){

                            $quality = $this->_resolution_video($match[1][$k]);

                            $result[] = $this->_dataResult($vlink, NULL, $quality, NULL);
                        }
                    }
                }
            }
            return $result;
        }
    }

    public function nhaccuatui($link){
        if($contentHtml = $this->_viewSource($link,true , true, false, true)){

            if (preg_match('/;file=(.*?)["]/', $contentHtml, $matches)) {

                $response_xml_data = $this->_viewSource($matches[1],true , true, false, true);

                preg_match_all("#<!\[\CDATA\[(.*?)\]\]>#i", $response_xml_data, $string);
                if(preg_match('#^http#',$string[1][2])===1) {

                    if ($this->_filter_video($string[1][2])!=TRUE) {

                        $result[] = $this->_dataResult(urldecode($string[1][2]), NULL, NULL, NULL);
                    }
                }
            }

            return $result;
        }
    }

    public function Vnhaccuatui($link){

        $curl = new Light_Curl();

        $curl->setReferrer($link);

        $key = explode('key=',$link);

        //$oldUrl = "http://sub1.phim3s.net/v3/plugins_player.php?url=" . urlencode($link);

        /*if($contentHtml = $curl->get($link)){

            if(preg_match('#play_key=\"(.*?)"\s#i',$contentHtml,$matches)){

                $dataURL = 'http://v.nhaccuatui.com/flash/xml?key6='.$matches[1];

                $url = $curl->get($dataURL);

                if(preg_match('#key\>\<!\[CDATA\['.$key[1].'(.*?)\<\/highquality#s',$url,$matches)){

                    $matches[1] = str_replace(array('<![CDATA[',']]>',"<location>",'<lowquality>','<highquality>','</location>','</lowquality>',' ','</key>'),array('','','&location=','&lowquality=','&highquality=','','',''),$matches[1]);

                    parse_str(trim($matches[1]),$data);

                    if(array_filter($data)) {

                        foreach ($data as $k => $item) {
                            if(strpos($item,"http")!==false){
                                $quality = $this->_resolution_video($k);
                                $result[] = $this->_dataResult($item, NULL, $quality, NULL);
                            }
                        }
                    }
                }
            }
            return $result;
        }*/
    }

    public function thuanviettvVN($link){
        if($contentHtml = $this->_viewSource($link,true , true, false, true)){

            if (preg_match('/_tvp.playlist\s=\s\[{(.*?)}\][;]/s', $contentHtml, $matches)){

                $matches[1]=str_replace(array('file','label','sources: '),array('"file"','"label"',''),$matches[1]);

                $jsonData=json_decode($matches[1],true);

                foreach($jsonData as $url){

                    if ($this->_filter_video($url['file'])!=TRUE) {

                        $quality = $this->_resolution_video($url['label']);
                        $result[] = $this->_dataResult(urldecode($url['file']), NULL, $quality, NULL);
                    }
                }
            }
            return $result;
        }
    }

    public function dailymotion($link){
        $result[] = array('embed'=>1,'link'=> '<iframe width="100%" height="100%" src="'.$link.'" frameborder="0" allowfullscreen></iframe>');
        return $result;
    }

    public function sendvid($link){

        $rantime = mt_rand(100000,999999);

        $arrDomain = parse_url($link);

        $link = 'http://cache-4.sendvid.com'.$arrDomain['path'].'.mp4';

        $curl = new Light_Curl();

        $curl->setReferrer('http://sendvid.com');

        $result[] = $this->_dataResult(urldecode(trim($link.'?timeout='.$rantime)), NULL, NULL, NULL);

        return $result;
    }

    public function openload($link){
        $patch = str_replace('/f/','',parse_url($link,PHP_URL_PATH));

        $dataURL = 'https://api.openload.co/1/file/dlticket?file='.$patch.'&login=5093b5c9cbe82a53&key=lN_5owo1';

        if($contentHtml = $this->_viewSource($dataURL,true , true, false, true)){

            $dataURL = 'https://api.openload.co/1/file/dl?file='.$patch.'&ticket='.$contentHtml->result->ticket;

            if($contentHtml = $this->_viewSource($dataURL,true , true, false, true)) {

                $result[] = $this->_dataResult(trim($contentHtml->result->url), NULL, $quality, NULL);
            }
        }
        ksort($result);
        return $result;
    }

    public function myvideo($link){
        $oldUrl = "http://sub1.phim3s.net/v3/plugins_player.php?url=" . urlencode($link);

        if($contentHtml = $this->_viewSource($oldUrl,true , true, false, true)){

            if(preg_match('#\"link\"[:]\s\[\"(.*?)\"\][,]#i', $contentHtml, $matches)) {

                foreach(explode('", "',$matches[1]) as $item){

                    if ($this->_filter_video($item) != TRUE) {
                        $result[] = $this->_dataResult(urldecode($item), NULL, NULL, NULL);
                    }
                }
            }
            return $result;
        }
    }

    public function phim14($link){
        if($contentHtml = $this->_viewSource($link,true , true, false, true)){

            if(preg_match('#\{link:\"(.*?)\"[,]#i',$contentHtml,$matches)){

                $dataURL = 'http://player8.phim14.net/gkphp101pc/plugins/gkpluginsphp.php';

                $curl = new Light_Curl();

                $url = $curl->post($dataURL, array(
                    'link' => $matches[1],
                    'f' => 'true',
                ));

                $jsonData = (array) json_decode($url,TRUE);

                foreach($jsonData['link'] as $item){

                    if ($this->_filter_video($item[type]) != TRUE || $this->_filter_resolution($item['label']) != FALSE) {

                        $quality = $this->_resolution_video($item['label']);

                        $result[] = $this->_dataResult($item['link'], NULL, $quality, $item['type']);
                    }

                }

            }

            return $result;
        }
    }

    public function biphim($link){
        if($contentHtml = $this->_viewSource($link,true , true, false, true)){

            if(preg_match('#sources:\s[\[](.*?),\s+[\]]#s',$contentHtml,$matches)){

                $matches[1] = $this->_chacSource($matches[1]);

                $jsonData = json_decode('['.$matches[1].']',1);

                foreach($jsonData as $item){

                    if ($this->_filter_video($item['file']) != TRUE) {
                        $quality = $this->_resolution_video($item['label']);
                        $result[] = $this->_dataResult(urldecode($item['file']), NULL, $quality, NULL);
                    }
                }
            }

            return $result;
        }
    }

    public function phimvang($link){
        $link=str_replace('phimvang.com','m.phimvang.com',$link);

        if($contentHtml = $this->_viewSource($link,true , true, false, true)){

            if(preg_match('/play_url\+\'(.*?)\'\,/i',$contentHtml,$matches)){

                $dataURL='http://play.phimvang.com:8080'.$matches[1];

                if ($contentHtml = $this->_viewSource($dataURL,true , true, false, false)) {

                    foreach(json_decode($contentHtml,true) as $item){

                        $arrDomain = parse_url($item['url']);

                        if(strpos($item['url'],'googleusercontent')!==false){
                            $url = $item['url'];
                            parse_str(str_replace('=m','&itag=',$item['url']),$data);
                        }else{
                            $url = str_replace($arrDomain['host'], "redirector.googlevideo.com", $item['url']);
                            parse_str($item['url'],$data);
                        }

                        if ($this->_filter_resolution($data['itag']) != FALSE) {

                            $quality = $this->_resolution_video($data['itag']);

                            $result[] = $this->_dataResult(urldecode($url), NULL, $quality, NULL);
                        }
                    }
                }
            }
            return $result;
        }
    }

    public function mphimnet($link){
        if($contentHtml = $this->_viewSource($link,true , true, false, true)){

            if(preg_match('#sources:\s(.*)[,](\s)+\][,]#s',$contentHtml,$matches)){
                $matches[1] = str_replace(array('file','label','type'),array('"file"','"label"','"type"'),$matches[1]);
                $jsonData = (array) json_decode($matches[1].']',TRUE);

                foreach($jsonData as $item){

                    parse_str($item['file'],$data);

                    if ($this->_filter_video($item['type']) != TRUE || $this->_filter_resolution($data['itag']) != FALSE) {

                        $quality = $this->_resolution_video($data['itag']);

                        $result[] = $this->_dataResult($item['file'], NULL, $quality, $item['type']);
                    }
                }
            }
            return $result;
        }
    }

    public function phimkk($link){
        $curl = new Light_Curl();

        $curl->setReferrer($link);

        $url = $curl->get($link);

        if(preg_match('#data:\s\'(.*?)&load=#i',$url,$matches)){

            parse_str($matches[1],$data);

            $dataURL = 'http://phimkk.com/xml.php';

            $url = $curl->post($dataURL, array(
                'link' => $data['link'],
                'Next' => $data['Next']
            ));

            if(preg_match('#sources:\s\[(.*?)[,]\][,]#i',$url,$matches)){
                $matches[1] = str_replace(array('file','type','label',',}'),array('"file"','"type"','"label"','}'),$matches[1]);

                $jsonData = (array) json_decode('['.$matches[1].']',TRUE);

                foreach($jsonData as $item){

                    if ($this->_filter_video($item['type']) != TRUE || $this->_filter_resolution($item['label']) != FALSE) {

                        $result[] = $this->_dataResult($item['file'], NULL, $item['label'], $item['type']);
                    }
                }
            }
            return $result;
        }
    }

    public function tronbonet($link){
        $curl = new Light_Curl();

        $curl->setReferrer($link);

        $url = $curl->get($link);

        if(preg_match('#iframe\swidth=\"100[%]\".*?src=\"(.*?)\"#i',$url,$matches)) {

            $url = $curl->get($matches[1]);

            if(preg_match('#sources:\s(.*?)\}#i',$url,$matches)) {
                $djson = json_decode($this->_chacSource($matches[1]).'}]',1);
                foreach ($djson as $item){
                    if ($this->_filter_video($item['type'])!=TRUE || $this->_filter_resolution($item['label']) != FALSE) {

                        $quality = $this->_resolution_video($item['label']);
                        $result[] = $this->_dataResult(urldecode(trim($item['file'])), NULL, $quality, $item['type']);
                    }
                }
            }
        }
        return $result;
    }

    public function phim4v($link){
        if($contentHtml = $this->_viewSource($link,false , true, false, true)){

            if(preg_match('#sources:\s(.*?)\][,]#i',$contentHtml,$matches)){

                $jsonData = json_decode($this->_chacSource($matches[1].']'),true);

                foreach($jsonData as $item){

                    $arrDomain = parse_url($item['file']);

                    if(strpos($item['file'],'googleusercontent')!==false){
                        $url = $item['file'];
                        parse_str(str_replace('=m','&itag=',$item['file']),$data);
                    }else{
                        $url = str_replace($arrDomain['host'], "redirector.googlevideo.com", $item['file']);
                        parse_str($item['file'],$data);
                    }

                    if ($this->_filter_resolution($data['itag']) != FALSE) {

                        $quality = $this->_resolution_video($data['itag']);

                        $result[] = $this->_dataResult(urldecode($url), NULL, $quality, NULL);
                    }
                }
            }
            return $result;
        }
    }

    public function kenhhdtv($link){
        $oldUrl = "http://sub1.phim3s.net/v3/plugins_player.php?url=" . urlencode($link);

        if($contentHtml = $this->_viewSource($oldUrl,true , true, false, true)) {

            if(preg_match('#\shash[=]\"(.*?)\"#i',$contentHtml,$matches)) {

                $dataURL = 'http://kenhhd.tv/play?v=NaN';

                $curl = new Light_Curl();

                $url = $curl->post($dataURL, array(
                    'hash' => $matches[1],
                ));

                if(preg_match('#file:\s\'(.*)\'[,]#i',$url,$matches)) {

                    $result[] = $this->_dataResult($matches[1], NULL, NULL, NULL);
                }
            }
        }
        return $result;
    }

    public function dangcaphd($link){
        if($contentHtml = $this->_viewSource($link,true , true, false, true)) {

            if(preg_match('#_link[=]\"(.*?)\"\s#i',$contentHtml,$matches)) {

                $result[] = $this->_dataResult($matches[1], NULL, NULL, NULL);

            }
        }
        return $result;
    }

    public function tapcuoi($link){
        $curl = new Light_Curl();

        $url = $curl->get($link);

        $curl->setReferrer($link);

        if(preg_match('/iframe\ssrc=\"(.*?)\"\s/i',$url,$matches)){

            $url = $curl->get($matches[1]);

            if(preg_match('#sources:\s(.*?)\}#i',$url,$matches)){

                $jsonData = json_decode($this->_chacSource($matches[1]).'}]',1);

                foreach($jsonData as $item){

                    if ($this->_filter_video($item['type'])!=TRUE || $this->_filter_resolution($item['label']) != FALSE) {

                        $quality = $this->_resolution_video($item['label']);
                        $result[] = $this->_dataResult(urldecode(trim($item['file'])), NULL, $quality, $item['type']);
                    }
                }
            }
            return $result;
        }
    }

    public function phimlt08($link){
        if($contentHtml = $this->_viewSource($link,true , true, false, true)){

            if(preg_match('#iframe.*?src="(.*?)"#i',$contentHtml,$matches)){

                if ($contentHtml = $this->_viewSource($matches[1],true , true, false, true)) {

                    if(preg_match_all('#source.*?src="(.*?)"#i',$contentHtml,$matches)){

                        foreach($matches[1] as $item){

                            $str=str_replace('=','&quality=',$item);

                            parse_str($str,$data);

                            if ($this->_filter_video($item) != TRUE) {
                                $quality = $this->_resolution_video($data[quality]);
                                $result[] = $this->_dataResult(urldecode($item), NULL, $quality, NULL);
                            }
                        }
                    }else{
                        if(preg_match('#container\"><iframe.*?src=\"(.*?)\">#i',$contentHtml,$matches)) {

                            $link = trim($matches[1]);

                            $oldUrl = "http://sub1.phim3s.net/v3/plugins_player.php?url=" . urlencode($link);

                            if ($contentHtml = $this->_viewSource($oldUrl,true , true, false, true)) {

                                if($data = $this->_checkExitLinkDocs($contentHtml)){

                                    $data = str_replace(array('\\u003d', '\\u0026'), array('=', '&'), $data);

                                    $data = explode('|', $data);

                                    foreach($data as $item){

                                        if(strpos($item, '://')){

                                            $arrDomain = parse_url($item);

                                            $item = str_replace($arrDomain['host'], "redirector.googlevideo.com", $item);

                                            parse_str($item, $data);

                                            if($this->_filter_video($data['type']) != TRUE || $this->_filter_resolution($data['itag']) != FALSE){

                                                $quality = $this->_resolution_video($data['itag']);

                                                $result[] = $this->_dataResult($item, NULL, $quality, NULL);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return $result;
        }
    }

    public function phimck($link){
        if($contentHtml = $this->_viewSource($link,true , true, false, true)){

            if(preg_match('#iframe\sscrolling=\"no\".*?src=\"(.*?)\"\s#i',$contentHtml,$matches)){

                $curl = new Light_Curl();

                $curl->setReferrer($link);

                $url = $curl->get($matches[1]);

                if(preg_match('#source\ssrc=\"(.*?)\"\s#i',$url,$matches)) {

                    parse_str(str_replace('=m','&itag=',$matches[1]),$data);

                    if ($this->_filter_resolution($data['itag']) != FALSE) {

                        $quality = $this->_resolution_video($data['itag']);

                        $result[] = $this->_dataResult($matches[1], NULL, $quality, $data['type']);
                    }
                }
            }
            return $result;
        }
    }

    public function phimvtv3($link){
        $curl = new Light_Curl();

        $curl->setReferrer($link);

        $oldUrl = "http://sub1.phim3s.net/v3/plugins_player.php?url=" . urlencode($link);

        if($contentHtml = $curl->get($oldUrl)) {
            if(preg_match('#height=\"auto\"\ssrc=\"(.*?)\"\s#i',$contentHtml,$matches)){

                if($contentHtml = $curl->get($matches[1])) {
                    if (preg_match('#sources:\s(.*?),[\]][,]#i', $contentHtml, $matches)) {
                        $matches[1] = str_replace(array('file', 'default', 'label', 'type','"file"name',"'"), array('"file"', '"default"','"label"', '"type"',"filename",'"'), $matches[1]);

                        $jsonData = json_decode($matches[1].']',true);

                        foreach($jsonData as $url) {
                            if ($this->_filter_video($url['type']) != TRUE) {
                                $quality = $this->_resolution_video($url['label']);
                                $result[] = $this->_dataResult(urldecode(trim($url['file'])), NULL, $quality, $url['label']);
                            }
                        }
                    }
                }
                return $result;
            }
        }
    }

    public function phimbathu($link,$episode_id = NULL){

        $curl = new Light_Curl();

        $curl->setReferrer($link);
        
        if($contentHtml = $curl->get($link)){

            if(preg_match('#[.]decode\((.*?)\)#i',$contentHtml,$id)){

                if(preg_match_all('#source\ssrc=\"(.*?)\"#s',$contentHtml,$matches)){

                    foreach($matches[1] as $item){

                        if(strpos($link,'bilutv.com')!==false){
                            $url = GibberishAES::dec($item,'bilutv.com4590481877'.$id[1]);
                        }else{
                            $url = GibberishAES::dec($item,'phimbathu.com4590481877'.$id[1]);
                        }
                        $str=str_replace(array('&filename','=m'),array('&type','&itag='),$url);

                        parse_str($str,$data);

                        if ($this->_filter_video($data['type']) != TRUE){
                            $quality = $this->_resolution_video($data['itag']);
                            $result[] = $this->_dataResult(urldecode(trim($url)), NULL, $quality, $data['itag']);
                        }
                    }
                }
            }else{

                if(preg_match('#var\splayerSetting\s=\s\{(.*?)\}[;]#i',$contentHtml,$matches)){

                    $decjson = json_decode('{'.$matches[1].'}',true);

                    $daes = GibberishAES::dec($decjson['linkBackup'],'phimbathu.com4590481877'.$decjson['modelId']);

                    if($contentHtml = $curl->get($daes)) {

                        foreach (json_decode($contentHtml,true) as $item) {

                            if ($this->_filter_video($item['type']) != TRUE || $this->_filter_resolution($item['label']) != FALSE) {

                                $quality = $this->_resolution_video($item['label']);

                                $result[] = $this->_dataResult(urldecode(trim($item['file'])), NULL, $quality, $item['label']);
                            }
                        }
                    }else{

                        foreach ($decjson['sources'] as $item) {

                            $url = GibberishAES::dec($item['file'],'phimbathu.com4590481877'.$decjson['modelId']);

                            if ($this->_filter_video($item['type']) != TRUE || $this->_filter_resolution($item['label']) != FALSE) {

                                $quality = $this->_resolution_video($item['label']);

                                $result[] = $this->_dataResult(urldecode(trim($url)), NULL, $quality, $item['label']);
                            }
                        }

                    }
                }elseif(preg_match_all('#sources\s=\s[\[](.*?),\s+[\]];
					
	#s',$contentHtml,$matches)){
                    $matches[1] = str_replace(array('file', 'default', 'label', 'type','"file"name',"'"), array('"file"', '"default"','"label"', '"type"',"filename",'"'), $matches[1]);

                    $jsonData = (array) json_decode('['.$matches[1][0].']',TRUE);

                    $result = $jsonData;

                }elseif(preg_match_all('#decodeLink[(]\'(.*?)\',\s(.*?)[)]#s',$contentHtml,$matches)){

                    foreach($matches[1] as $key => $item){
                        if(strpos($link,'bilutv.com')!==false){
                            $url = GibberishAES::dec($item,'bilutv.com4590481877'.$matches[2][$key]);
                        }else{
                            $url = GibberishAES::dec($item,'phimbathu.com4590481877'.$matches[2][$key]);
                        }
                        $str=str_replace(array('&filename','=m'),array('&type','&itag='),$url);

                        parse_str($str,$data);

                        if ($this->_filter_video($data['type']) != TRUE || $this->_filter_resolution($data['itag']) != FALSE) {

                            $quality = $this->_resolution_video($data['itag']);

                            $result[] = $this->_dataResult(urldecode(trim($url)), NULL, $quality, $data['itag']);
                        }
                    }
                }
            }
        }else{
            $result[] = array('embed'=> 1,'link'=> '<div data-episode_id="'.$episode_id.'" id="error_play"></div>');
        }
        return $result;
    }

    public function vietsubhd($link){
        $curl = new Light_Curl();

        $curl->setReferrer($link);

        if($contentHtml = $curl->get($link)) {

            $dataURL = 'http://www.vietsubhd.com/ajaxload';
            $dataURL2 = 'http://www.vietsubhd.com/gkphp/plugins/gkpluginsphp.php';

            if (preg_match('#[\};]filmInfo.(.*?)[;]filmInfo.filmVIEWED#i', $contentHtml, $matches)){

                $matches[1]=str_replace(array("parseInt('","');","')"),array('','&',''),$matches[1]);

                parse_str($matches[1], $data);

                $url = $curl->post($dataURL, array(
                    'NextEpisode' => 1,
                    'EpisodeID' => $data['episodeID'],
                    'filmID'    => $data['filmInfo_filmID']
                ));

                preg_match('#[{]link:\"(.*?)\"[,]#i', $url, $matches);

                $url = $curl->post($dataURL2, array(

                    'link' => $matches[1],

                ));
                $jsonData=json_decode($url,true);

                foreach($jsonData['link'] as $url){

                    if ($this->_filter_video($url['type'])!=TRUE) {

                        $quality = $this->_resolution_video($url['label']);
                        $result[] = $this->_dataResult(urldecode($url['link']), NULL, $quality, NULL);
                    }
                }
            }
            return $result;
        }
    }

    public function Appdefault($link){
        $arr = array(
            'xemphimone.org'=>array(
                'pregM'=>$this->pregDefault,
                'link'=>$link,
                'HTTP_REFERER'=> 'xemphimone.org'
            ),
            'xemphimone.net'=>array(
                'pregM'=>$this->pregDefault,
                'link'=>$link,
                'HTTP_REFERER'=> 'xemphimone.net'
            ),

            'film.canthotv.vn'=>array(
                'pregM'=>"iframe\s.*?src=\".*?jwplayer/[?]l=(.*?)&",
                'link'=>$link,
                'HTTP_REFERER'=> 'film.canthotv.vn',
            ),

            'phim7.com'=>array(
                'pregM'=>$this->pregDefault3,
                'link'=>$link,
                'HTTP_REFERER'=> 'phim7.com'
            ),
        );

        $hostname=parse_url($link);
        $data=$arr[$hostname['host']];

        if($contentHtml = $this->_viewSource($data['link'],true , true, false, true)){

            $required = array('pregM','pregM2','link','HTTP_REFERER');

            $required2 = array('pregM','link','HTTP_REFERER');

            $required3 = array('pregM','quality','link','HTTP_REFERER');

            $required4 = array('pregM2','link','HTTP_REFERER');

            $required5 = array('pregM2','quality','link','HTTP_REFERER');

            if(count(array_intersect_key(array_flip($required), $data)) === count($required)) {

                if(preg_match("#$data[pregM]#i",$contentHtml,$matches)){

                    $dataURL=$matches[1];

                    if($contentHtml = $this->_viewSource($dataURL,true , true, false, true)){

                        if(preg_match("#$data[pregM2]#i",$contentHtml,$matches)) {

                            parse_str($matches[1],$data);

                            if($this->_filter_video($matches[1])!=TRUE) {

                                $quality = $this->_resolution_video($data[itag]);

                                $result[] = $this->_dataResult(urldecode($matches[1]), NULL, $quality, NULL);
                            }
                        }

                    }
                }
            }elseif(count(array_intersect_key(array_flip($required2), $data)) === count($required2)){

                if(preg_match("#$data[pregM]#i",$contentHtml,$matches)){

                    $matches[1]=str_replace('media3.canthotv','media2.canthotv',$matches[1]);

                    $matches[1]=urldecode($matches[1]);

                    $dataURL=str_replace('=','&itag=',$matches[1]);
                }

                parse_str($dataURL,$data);

                if($this->_filter_video($dataURL)!=TRUE) {

                    $quality = $this->_resolution_video($data[itag]);

                    $result[] = $this->_dataResult(urldecode($matches[1]), NULL, $quality, NULL);
                }
            }elseif(count(array_intersect_key(array_flip($required3), $data)) === count($required3)){

                if(preg_match("#$data[pregM]#s",$contentHtml,$matches)) {

                    $dataURL = $matches[1];

                    if($data['leech']){ // Phan Leech
                        $dataURL=$data['leech'].$matches[1];
                    }

                    if($contentHtml = $this->_viewSource($dataURL,true , true, false, true)){
                        if (preg_match("#$data[quality]#i", $contentHtml, $matches)) {

                            $decjson= json_decode($matches[0], true);

                            foreach ($decjson as $item) {

                                if($this->_filter_video($dataURL)!=TRUE) {

                                    $quality = $this->_resolution_video($item[height]);

                                    $result[] = $this->_dataResult(urldecode($item[url]), NULL, $quality, NULL);
                                }
                            }
                        }
                    }
                }
            }elseif(count(array_intersect_key(array_flip($required4), $data)) === count($required4)){

                if(preg_match("#$data[pregM]#i",$contentHtml,$matches)){

                    if($contentHtml = $this->_viewSource($matches[1],true , true, false, true)){

                        if(preg_match("#$data[pregM2]#i",$contentHtml,$matches)){
                            $dataURL=$matches[1];

                            parse_str($dataURL,$data);

                            if($this->_filter_video($dataURL)!=TRUE) {

                                $quality = $this->_resolution_video($data[itag]);

                                $result[] = $this->_dataResult(urldecode($dataURL), NULL, $quality, NULL);
                            }
                        }
                    }
                }
            }elseif(count(array_intersect_key(array_flip($required5), $data)) === count($required5)){

                if(preg_match("#$data[pregM2]#i",$contentHtml,$matches)) {

                    $dataURL = $matches[1];

                    if($contentHtml = $this->_viewSource($dataURL,true , true, false, true)){
                        if (preg_match("#$data[quality]#i", $contentHtml, $matches)) {

                            $jsonData= json_decode($matches[0], true);

                            foreach ($jsonData as $item) {

                                if($this->_filter_video($dataURL)!=TRUE) {

                                    $quality = $this->_resolution_video($item[height]);

                                    $result[] = $this->_dataResult(urldecode($item[url]), NULL, $quality, NULL);
                                }
                            }
                        }
                    }
                }
            }
            return $result;
        }
    }

    public function xemphimbox($link){

        $curl = new Light_Curl();

        $curl->setReferrer($link);

        if($contentHtml = $curl->get($link)) {

            preg_match('#episodeID\s[=]\sparseInt\(\'(.*?)\'\)#i',$contentHtml,$episodeID);

            preg_match('#filmID\s[=]\sparseInt\(\'(.*?)\'\)#i',$contentHtml,$filmID);

            $dataURL = 'http://xemphimbox.com/ajax';

            $dataURL2 = 'http://xemphimbox.com/players/gkphp/plugins/gkpluginsphp.php';

            $url = $curl->post($dataURL, array(
                'NextEpisode'=>1,
                'EpisodeID' =>$episodeID[1],
                'filmID'=>$filmID[1],
                'playTech'=>'auto'
            ));

            if(preg_match('#javascript\"\ssrc=\"(.*?)\"#i',$url,$match)){

                $url = $curl->get($match[1]);

                if(preg_match('#sources\s=\s\[(.*?)\][;]#i',$url,$match)){

                    $jsonData = json_decode('['.$match[1].']',true);

                    foreach ($jsonData as $item){

                        if ($this->_filter_video($item['type']) != TRUE || $this->_filter_resolution($item['label']) != FALSE) {

                            $quality = $this->_resolution_video($item['label']);

                            $result[] = $this->_dataResult($item['file'], NULL, $quality, NULL);
                        }
                    }
                }
            }else{
                if(preg_match('#url_playlist\s=\s\"(.*?)\"#i',$url,$match)){

                    if($contentHtml = $curl->get($link)) {

                        if(preg_match_all('#jwplayer:source\sfile=\"(.*?)\/>#s',$contentHtml,$match)){

                            $url = str_replace(array('amp;','" label="','" type="',' default','"'),array('&','&label=','&type=','&default',''),$match[1]);
                            foreach ($url as $item){

                                parse_str($item,$data);

                                if ($this->_filter_video($data['type']) != TRUE || $this->_filter_resolution($data['label']) != FALSE) {

                                    $quality = $this->_resolution_video($data['label']);

                                    $result[] = $this->_dataResult($item, NULL, $quality, $data['label']);
                                }
                            }
                        }
                    }
                }
            }
            return $result;
        }
    }
}