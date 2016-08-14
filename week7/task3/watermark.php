<?php
    watermark("1.jpg", "2.png", 9, 50);

    /*制作水印图片
        $dst_dir:目标图片路径
        $src_dir:水印图片路径
        $pos:水印位置,1是顶部居左,2是顶部居中,3是顶部居右,4是中间居左,5是正中间,6是中间居右,7是底部居左,8是底部居中,9是底部居右
        $opa:水印透明度
    */
function watermark($dst_dir, $src_dir, $pos, $opa) {
    $dst_im = generate_img($dst_dir);
    $src_im = generate_img($src_dir);

    //判断图片是否存在
    if($dst_im == null || $src_im == null) {
        echo "图片不存在";
        return;
    }

    //获取图片的大小数组，图片的宽度和高度
    $dst_size = getimagesize($dst_dir);
    $dst_w = $dst_size[0];
    $dst_h = $dst_size[1];
    $dst_x = 0;
    $dst_y = 0;

    $src_size = getimagesize($src_dir);
    $src_w = $src_size[0];
    $src_h = $src_size[1];

    //判断目标图片和源图片的大小，如果源图片大于目标图片，则源图片就需要裁剪
    if($dst_w < $src_w || $dst_h < $src_h) {
        $resize_arr = resize_img($dst_w, $dst_h, $src_w, $src_h, $src_im);
        $src_im = $resize_arr[0];
        $src_w = $resize_arr[1];
        $src_h = $resize_arr[2];
    }

    //选择源图片放置的位置
    switch($pos) {
        case 1:
            $dst_x = 0;
            $dst_y = 0;
            break;

        case 2:
            $dst_x = round(($dst_w - $src_w) * 0.5);
            $dst_y = 0;
            break;

        case 3:
            $dst_x = $dst_w - $src_w;
            $dst_y = 0;
            break;

        case 4:
            $dst_x = 0;
            $dst_y = round(($dst_h - $src_h) * 0.5);
            break;

        case 5:
            $dst_x = round(($dst_w - $src_w) * 0.5);
            $dst_y = round(($dst_h - $src_h) * 0.5);
            break;

        case 6:
            $dst_x = $dst_w - $src_w;
            $dst_y = round(($dst_h - $src_h) * 0.5);
            break;

        case 7:
            $dst_x = 0;
            $dst_y = $dst_h - $src_h;
            break;

        case 8:
            $dst_x = round(($dst_w - $src_w) * 0.5);
            $dst_y = $dst_h - $src_h;
            break;

        case 9:
            $dst_x = $dst_w - $src_w;
            $dst_y = $dst_h - $src_h;
            break;

        default:
            break;
    }

    imagecopymerge($dst_im, $src_im, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $opa);
    header("content-type:image/jpeg");
    imagejpeg($dst_im);

    imagedestroy($dst_im);
    imagedestroy($src_im);
}

    //获得图片文件的后缀名
    function get_type($dir) {
        $i = strrpos($dir, ".");
        $type = strtolower(substr($dir, $i));
        return $type;
    }

    //通过路径生成图片，载入图片
    function generate_img($dir) {
        if(!file_exists($dir)) {
            return false;
        }

        $type = get_type($dir); //调用上面的函数get_type()
        if($type == ".jpg" || $type == ".jpeg") {
            $im = imagecreatefromjpeg($dir);
        } else if($type == ".png") {
            $im = imagecreatefrompng($dir);
        } else if($type == ".gif") {
            $im = imagecreatefromgif($dir);
        }
        if($im != null) {
            return $im;
        }
        return false;
    }

    //如果水印图片超出目标图片尺寸,缩小水印图片
    function resize_img($dst_w, $dst_h, $src_w, $src_h, $src_im) {
        $scale_w = $src_w / $dst_w;
        $scale_h = $src_h / $dst_h;

        if($scale_w > 1 || $scale_h > 1) {
            $scale = max(array($scale_w, $scale_h));

            $w = round($src_w / $scale);
            $h = round($src_h / $scale);
            $im = imagecreatetruecolor($w, $h);
            imagecopyresampled($im, $src_im, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
            return array($im, $w, $h);
        }

        return false;
    }
?>