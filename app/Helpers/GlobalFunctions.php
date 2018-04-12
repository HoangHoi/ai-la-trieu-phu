<?php

if (!function_exists('image_create_from_file')) {
    function image_create_from_file($filename)
    {
        if (!file_exists($filename)) {
            throw new InvalidArgumentException('File "' . $filename . '" not found.');
        }
        $fileInfo = getimagesize($filename);
        switch ($fileInfo[2]) {
            case IMAGETYPE_JPEG:
                return imagecreatefromjpeg($filename);
            case IMAGETYPE_PNG:
                return imagecreatefrompng($filename);
            case IMAGETYPE_GIF:
                return imagecreatefromgif($filename);
            default:
                throw new InvalidArgumentException('File "' . $filename . '" is not valid jpg, png or gif image.');
        }
    }
}
if (!function_exists('convert_vietnamese_to_ascii')) {
    function convert_vietnamese_to_ascii($str)
    {
        $unicode = [
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        ];
        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return $str;
    }
}
if (!function_exists('remove_nonalphabet_characters')) {
    function remove_nonalphabet_characters($string)
    {
        return preg_replace('/[^A-Za-z ]/', '', $string);
    }
}
if (!function_exists('remove_special_character')) {
    function remove_special_character($string)
    {
        $regex = '/[\ `~!@#$%^&*()\-=+{}<>,._\-\\\\\/\?\|;:\"\'\[\]]+/';
        return trim(preg_replace($regex, '_', $string), '_');
    }
}

if (!function_exists('resize_image')) {
    /**
     * @param Image $image
     * @param string $savePath
     * @param array $savePath
     */
    function resize_image($image, $savePath, $maxSize = ['width' => 50, 'height' => 50])
    {
        $resizeName = $image->filename . '.rez.' . $image->extension;
        if ($image->extension != 'gif') {
            if ($image->height() > $image->width()) {
                $image->resize($maxSize['width'], null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                $image->resize(null, $maxSize['height'], function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $image->save("{$savePath}/{$resizeName}");
        }
    }
}

if (!function_exists('get_resized_image')) {
    /**
     * @param string $url
     * @return string
     */
    function get_resized_image($url)
    {
        if (!$url) {
            return null;
        }
        $rezUrl = str_replace_last('.', '.rez.', $url);
        if (Storage::disk('public')->exists($rezUrl)) {
            return Storage::disk('public')->url($rezUrl);
        }
        return Storage::disk('public')->url($url);
    }
}

if (!function_exists('encrypt_id')) {
    /**
     * @param integer $id
     * @return string
     */
    function encrypt_id($id)
    {
        if (!$id) {
            return null;
        }

        $id = intval($id);
        $id = dechex($id + 307843200);
        $id = str_replace(1, 'H', $id);
        $id = str_replace(2, 'L', $id);
        $id = str_replace(3, 'R', $id);
        $id = str_replace(4, 'V', $id);
        $id = str_replace(5, 'N', $id);

        return $id;
    }
}

if (!function_exists('decrypt_id')) {
    /**
     * @param string $id
     * @return integer
     */
    function decrypt_id($id)
    {
        if (!$id) {
            return null;
        }

        $id = str_replace('H', 1, $id);
        $id = str_replace('L', 2, $id);
        $id = str_replace('R', 3, $id);
        $id = str_replace('V', 4, $id);
        $id = str_replace('N', 5, $id);

        $id = hexdec($id);
        return $id - 307843200;
    }
}

if (!function_exists('make_slug')) {
    /**
     * @param string $name
     * @return string
     */
    function make_slug($name)
    {
        return str_slug($name);
        // if (!$name) {
        //     return null;
        // }
        // $name = convert_vietnamese_to_ascii($name);

        // $regex = '/[\ `~!@#$%^&*()\-=+{}<>,._\-\\\\\/\?\|;:\"\'\[\]]+/';
        // return strtolower(trim(preg_replace($regex, '-', $name), '-'));
    }
}
