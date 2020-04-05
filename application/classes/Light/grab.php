<?php defined('SYSPATH') or die('No direct script access.');

// bỏ trang này 2 3 tháng giơ

class Light_Grab{

    protected static function _create_file($episode_id,$link,$data,$patch,$domain){

        $cacheEpi = Light_Config::get('config.censor.cacheEpisode');

        $jsonData = json_encode($data);

        if($cacheEpi=='ON'){

            if (!file_exists($patch) && $jsonData!='null' && !empty($link)){
                $data=file($patch);
                $end=end($data);
                $item=explode("|",$end);
                $id=$item[0]+1;
                $data[]="$id|$episode_id|$link|$jsonData\r\n";
                file_put_contents($patch,$data);
                return $jsonData;
            }else{
                unlink($patch);
            }
        }else{

            return $jsonData;
        }
    }

    protected function _oupPlayer($class,$episode_id,$link,$patch,$domain,$fixepisode_id = NULL){

        $cacheEpi = Light_Config::get('config.censor.cacheEpisode');

        $Glet = new Light_Glet();

        if($cacheEpi=='ON') {

            $data = file($patch);
            foreach ($data as $key => $value) {
                $value = explode('|', $value);
                $value2[$value[1]] = $value;
            }
            // Phần kiểm tra All Array có hay không?

            if (!$value2["$episode_id"][3]){

                $jsonData = json_encode($Glet->$class($link));
                if ($jsonData != 'null' && !empty($link)) {
                    $end = end($data);
                    $item = explode("|", $end);
                    $id = $item[0] + 1;
                    $data[] = "$id|$episode_id|$link|$jsonData\r\n";
                    file_put_contents($patch, $data);
                    return $jsonData;
                }
            }else{
                if ($link == $value2["$episode_id"][2]){
                    if($fixepisode_id){
                        $jsonData = json_encode($Glet->$class($link));

                        foreach ($data as $k => $v) {
                            $str = explode('|', $v);
                            if ($str[1] == $fixepisode_id) {
                                $data[$k] = "";
                                break;
                            }
                        }
                        return $jsonData;
                    }else{
                        return $value2["$episode_id"][3];
                    }
                }else{
                    $jsonData = json_encode($Glet->$class($link));
                    foreach ($data as $k => $v) {
                        $str = explode('|', $v);

                        if ($str[1] == $episode_id || $jsonData=='null') {

                            $data[$k] = "";
                            break;
                        }
                    }
                    file_put_contents($patch, $data);
                    return $jsonData;
                }
            }

            /*if (!$value2["$episode_id"][3]){
                $jsonData = json_encode($Glet->$class($link));
                if ($jsonData != 'null' && !empty($link)) {
                    $end = end($data);
                    $item = explode("|", $end);
                    $id = $item[0] + 1;
                    $data[] = "$id|$episode_id|$link|$jsonData\r\n";
                    file_put_contents($patch, $data);
                    return $value2["$episode_id"][3];
                }
            } else {

                if ($link == $value2["$episode_id"][2]) {



                } else {



                }

            }*/
        }else{
            return json_encode($Glet->$class($link));
        }
    }

    public static function process($film_id,$episode_id,$link,$domain){

        $Glet = new Light_Glet();

        switch ($link) {

            case strpos($link,'youtube.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->youtube($link,$episode_id);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('youtube',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'tv.zing.vn')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->tvZing($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('tvZing',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'dailymotion.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->dailymotion($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('dailymotion',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'openload.co')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->openload($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('openload',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'http://nhaccuatui.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->nhaccuatui($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('nhaccuatui',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'http://v.nhaccuatui.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->Vnhaccuatui($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('Vnhaccuatui',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'picasaweb.google.com')!==false || strpos($link,'get.google.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->picasaGoogle($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('picasaGoogle',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'drive.google.com')!==false || strpos($link,'docs.google.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->driveGoogle($link,$episode_id);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('driveGoogle',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'photos.google.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->photosGoogle($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('photosGoogle',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'plus.google.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->plusGoogle($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('plusGoogle',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'sendvid.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->sendvid($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('sendvid',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'myvideo.az')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->myvideo($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('myvideo',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'phimbathu.com')!==false:

                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->phimbathu($link,$episode_id);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('phimbathu',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'phim14.net')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->phim14($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('phim14',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'xemphimbox.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->xemphimbox($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('xemphimbox',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'phimvtv3.net')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->vietsubhd($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('phimvtv3',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'www.vietsubhd.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->vietsubhd($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('vietsubhd',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'test.com')!==false:

                $data = $Glet->test();

                break;

            case strpos($link,'biphim.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->biphim($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('biphim',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'phimvang.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->phimvang($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('phimvang',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'tapcuoi.net')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->tapcuoi($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('tapcuoi',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'phimlt08.com')!==false || strpos($link,'phimlt.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->phimlt08($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('phimlt08',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'phimck.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->phimck($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('phimck',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'mphim.net')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->mphimnet($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('mphimnet',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'phimkk.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->phimkk($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('phimkk',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'tronbo.net')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->tronbonet($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('tronbonet',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'kenhhd.tv')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->kenhhdtv($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('kenhhdtv',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'dangcaphd.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->dangcaphd($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('dangcaphd',$episode_id,$link,$patch,$domain);
                }
                break;

            case strpos($link,'phim4v.com')!==false:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->phim4v($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('phim4v',$episode_id,$link,$patch,$domain);
                }
                break;

            default:
                $patch = 'data/episode_'.$domain.'/'.$film_id.'_cache.txt';

                if(!file_exists($patch) || filemtime($patch) < (time() - 7*24*60*60)){
                    $data = $Glet->Appdefault($link);
                    @ksort($data);
                    return self::_create_file($episode_id,$link,$data,$patch,$domain);
                }else{
                    return self::_oupPlayer('Appdefault',$episode_id,$link,$patch,$domain);
                }
                break;
        }
    }
}