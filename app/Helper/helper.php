<?php 

function getThumbnail($url) {
	$parts = explode('v=',$url);
	$get = end($parts);
	$http = 'http://img.youtube.com/vi/'.$get.'/hqdefault.jpg';
	return $http;
}

function moreArticle($str) {
	if (strlen($str) > 110) {
		$more = substr($str,110).'...';
	}
	else {
		$more = $str;
	}

	return $more;
}

function infoFooter($ktr) {
	$info_footer = App\Models\InfoFooterModel::where('keterangan',$ktr)->get();
	return $info_footer;
}

function human_date($date) {
	$explode = explode('-',$date);
	return $explode[2].' '.month($explode[1]).' '.$explode[0];
}

function month($month) {
	$array = [
		'01' => 'Januari',
		'02' => 'Februari',
		'03' => 'Maret',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Juni',
		'07' => 'Juli',
		'08' => 'Agustus',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember'
	];
	return $array[$month];
}

function downloadDocs($file) {
	$filePath = public_path('/dokumen/'.$file);
	if (file_exists($filePath)) {
		header('Content-Description: File Transfer');
		header('Content-Type: '.mime_content_type($filePath));
		header('Content-Disposition: attachment; filename="'.$file.'"');
		header('Content-Length: '.filesize($filePath));
		flush();
		readfile($filePath);
		exit;
	} 
}

function playYoutube($link)
{
    if(strpos($link,'.be')!==false) {
        $explode = explode('/',$link);
        $str = 'https://youtube.com/embed/'.$explode[3];
    }
    else {
	    $str = str_replace('watch?v=','embed/',$link);
    }

	return $str;
}

function convertTime($time)
{
	if (strpos($time,'.') !== false) {
		$explode = explode('.',$time);
		$new_time = $explode[0].':'.$explode[1].':00';
	}
	else {
		$new_time = $time.':00';
	}

	return $new_time;
}

function pdfThumb($source, $target)
{
	//$source = realpath($source);
	$target = dirname($source).DIRECTORY_SEPARATOR.$target;
	$im     = new Imagick($source."[0]"); // 0-first page, 1-second page
	$im->setImageColorspace(255); // prevent image colors from inverting
	$im->setimageformat("jpeg");
	$im->thumbnailimage(160, 120); // width and height
	$im->writeimage($target);
	$im->clear();
	$im->destroy();
}