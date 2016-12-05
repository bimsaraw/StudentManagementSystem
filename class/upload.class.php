<?php
class upload {
private $image_path ;
private $file ;
	public static function upload_images($path,$image_field) {
		if($image_field['name']!=""){
                $rand = $_POST["studentId"];
                $rand2 = rand(1000,999999);
                $extension = end(explode('.', $image_field['name']));
				$string = "studentimage_".$rand.".".$extension;
		        $filename = str_replace(' ', '', $string);
				$target_path = $path ;
				$target_path = $target_path ."sinhalasindu_".$rand.".".$extension;
				move_uploaded_file ( str_replace(' ', '',$image_field ['tmp_name']), $target_path);
				return $filename;
		}
	}
}
?>