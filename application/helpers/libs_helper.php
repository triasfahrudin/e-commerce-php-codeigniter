<?php defined('BASEPATH') or exit('No direct script access allowed');

function tgl_panjang($tanggal, $tipe = 'sm', $time = false, $show_day = false)
{
    $tgl_pc    = explode(" ", $tanggal);
    $tgl_depan = $tgl_pc[0];
    $waktu     = $time ? $tgl_pc[1] : '';

    $tgl_depan_pc = explode("-", $tgl_depan);
    $tgl          = $tgl_depan_pc[2];
    $bln          = $tgl_depan_pc[1];
    $thn          = $tgl_depan_pc[0];

    $bln_txt = "";

    if ($tipe == "lm") {
        if ($bln == "01") {
            $bln_txt = "Januari";
        } elseif ($bln == "02") {$bln_txt = "Februari";} else if ($bln == "03") {$bln_txt = "Maret";} else if ($bln == "04") {$bln_txt = "April";} else if ($bln == "05") {$bln_txt = "Mei";} else if ($bln == "06") {$bln_txt = "Juni";} else if ($bln == "07") {$bln_txt = "Juli";} else if ($bln == "08") {$bln_txt = "Agustus";} else if ($bln == "09") {$bln_txt = "September";} else if ($bln == "10") {$bln_txt = "Oktober";} else if ($bln == "11") {$bln_txt = "November";} else if ($bln == "12") {$bln_txt = "Desember";}
    } else if ($tipe == "sm") {
        if ($bln == "01") {$bln_txt = "Jan";} else if ($bln == "02") {$bln_txt = "Feb";} else if ($bln == "03") {$bln_txt = "Mar";} else if ($bln == "04") {$bln_txt = "Apr";} else if ($bln == "05") {$bln_txt = "Mei";} else if ($bln == "06") {$bln_txt = "Jun";} else if ($bln == "07") {$bln_txt = "Jul";} else if ($bln == "08") {$bln_txt = "Ags";} else if ($bln == "09") {$bln_txt = "Sep";} else if ($bln == "10") {$bln_txt = "Okt";} else if ($bln == "11") {$bln_txt = "Nov";} else if ($bln == "12") {$bln_txt = "Des";}
    }

    $day     = date('D', strtotime($tanggal));
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu',
    );

    $tm        = $time ? " " . $waktu : "";
    $nama_hari = $show_day ? $dayList[$day] . ', ' : "";
    return $nama_hari . $tgl . " " . $bln_txt . " " . $thn . $tm;
}

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

// $user_ip = getUserIP();

function terbilang($x)
{
    $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    if ($x < 12) {
        return " " . $abil[$x];
    } elseif ($x < 20) {
        return Terbilang($x - 10) . "belas";
    } elseif ($x < 100) {
        return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
    } elseif ($x < 200) {
        return " seratus" . Terbilang($x - 100);
    } elseif ($x < 1000) {
        return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
    } elseif ($x < 2000) {
        return " seribu" . Terbilang($x - 1000);
    } elseif ($x < 1000000) {
        return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
    } elseif ($x < 1000000000) {
        return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
    }

}

function generate_uuid()
{
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

function js_alert($msg, $redirect)
{
    return '<script> alert("' . $msg . '");  window.location = "' . $redirect . '"; </script>';
}

function generateRandomString($length = 10)
{
    $characters       = '23456789abcdefghjkmnpqrstwxyz';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; ++$i) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

if (!function_exists('base64url_encode')) {
    function base64url_encode($data, $pad = null)
    {
        $data = str_replace(array('+', '/'), array('-', '_'), base64_encode($data));
        if (!$pad) {
            $data = rtrim($data, '=');
        }
        return $data;
    }
}

if (!function_exists('base64url_decode')) {
    function base64url_decode($data)
    {
        return base64_decode(str_replace(array('-', '_'), array('+', '/'), $data));
    }
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */

if (!function_exists('file_pathinfo')) {
    function file_pathinfo($filePath)
    {
        $fileParts = pathinfo($filePath);

        if (!isset($fileParts['filename'])) {$fileParts['filename'] = substr($fileParts['basename'], 0, strrpos($fileParts['basename'], '.'));}

        return $fileParts;
    }
}

if (!function_exists('username_from_email')) {
    function username_from_email($emailaddress)
    {
        $parts = explode("@", $emailaddress);
        return '<strong>' . $parts[0] . '</strong>';
    }
}

if (!function_exists('relative_time')) {
    function relative_time($date)
    {
        $date = substr($date, 0, 10);
        if (preg_match('/\d{4}-\d{2}-\d{2}/', $date)) {
            $date_array = preg_split('/[-\.\/ ]/', $date);
            return date('j M Y', mktime(0, 0, 0, $date_array[1], $date_array[2], $date_array[0]));

        } elseif (empty($date)) {
            return '';
        }
    }
}

if (!function_exists('is_valid_email')) {
    function is_valid_email($emailaddress)
    {
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

        if (preg_match($pattern, $emailaddress) === 1) {
            // emailaddress is valid
            return true;
        }

        return false;
    }
}

if (!function_exists('remove_time_from_datetime')) {
    function remove_time_from_datetime($datetime)
    {
        $ex = explode(' ', $datetime);
        return $ex[0];
    }
}

if (!function_exists('nicetime')) {
    function nicetime($date)
    {
        if (empty($date)) {
            return 'tidak ada tanggal yang dimasukkan';
        }

        $periods = array('detik', 'menit', 'jam', 'hari', 'minggu', 'bulan', 'tahun', 'dekade');
        $lengths = array('60', '60', '24', '7', '4.35', '12', '10');

        $now       = time();
        $unix_date = strtotime($date);

        // check validity of date
        if (empty($unix_date)) {
            return 'Bad date';
        }

        // is it future date or past date
        if ($now > $unix_date) {
            $difference = $now - $unix_date;
            $tense      = 'yang lalu';
        } else {
            $difference = $unix_date - $now;
            $tense      = 'dari sekarang';
        }

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; ++$j) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        return "$difference $periods[$j] {$tense}";
    }
}

if (!function_exists('format_rupiah')) {
    function format_rupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('get_settings')) {
    function get_settings($title)
    {
        $CI = &get_instance();

        $result  = "";
        $setting = $CI->db->get_where('settings', array('title' => $title))->row();
        if ($setting->tipe === 'options') {
            $result_array = explode(';', $setting->value);
            $result       = $result_array[1];
        } else {
            $result = $setting->value;
        }

        return $result;
    }
}

function filterHtml($input)
{
    // Remove HTML comments, but not SSI
    $input = preg_replace('/<!--[^#](.*?)-->/s', '', $input);

    // The content inside these tags will be spared:
    $doNotCompressTags = ['script', 'pre', 'textarea'];
    $matches           = [];

    foreach ($doNotCompressTags as $tag) {
        $regex = "!<{$tag}[^>]*?>.*?</{$tag}>!is";

        // It is assumed that this placeholder could not appear organically in your
        // output. If it can, you may have an XSS problem.
        $placeholder = "@@<'-placeholder-$tag'>@@";

        // Replace all the tags (including their content) with a placeholder, and keep their contents for later.
        $input = preg_replace_callback(
            $regex,
            function ($match) use ($tag, &$matches, $placeholder) {
                $matches[$tag][] = $match[0];
                return $placeholder;
            },
            $input
        );
    }

    // Remove whitespace (spaces, newlines and tabs)
    $input = trim(preg_replace('/[ \n\t]+/m', ' ', $input));

    // Iterate the blocks we replaced with placeholders beforehand, and replace the placeholders
    // with the original content.
    foreach ($matches as $tag => $blocks) {
        $placeholder       = "@@<'-placeholder-$tag'>@@";
        $placeholderLength = strlen($placeholder);
        $position          = 0;

        foreach ($blocks as $block) {
            $position = strpos($input, $placeholder, $position);
            if ($position === false) {
                throw new \RuntimeException("Found too many placeholders of type $tag in input string");
            }
            $input = substr_replace($input, $block, $position, $placeholderLength);
        }
    }

    return $input;
}

if (!function_exists('compress_output')) {
    //http://jeromejaglale.com/doc/php/codeigniter_compress_html
    //http://stackoverflow.com/questions/5312349/minifying-final-html-output-using-regular-expressions-with-codeigniter
    function compress_output()
    {
        $CI = &get_instance();

        $buffer = $CI->output->get_output();
        /*$re = '%# Collapse whitespace everywhere but in blacklisted elements.
        (?>             # Match all whitespans other than single space.
        [^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
        | \s{2,}        # or two or more consecutive-any-whitespace.
        ) # Note: The remaining regex consumes no text at all...
        (?=             # Ensure we are not in a blacklist tag.
        [^<]*+        # Either zero or more non-"<" {normal*}
        (?:           # Begin {(special normal*)*} construct
        <           # or a < starting a non-blacklist tag.
        (?!/?(?:textarea|pre|script)\b)
        [^<]*+      # more non-"<" {normal*}
        )*+           # Finish "unrolling-the-loop"
        (?:           # Begin alternation group.
        <           # Either a blacklist start tag.
        (?>textarea|pre|script)\b
        | \z          # or end of file.
        )             # End alternation group.
        )  # If we made it here, we are not in a blacklist tag.
        %Six'; */

        // $buffer = preg_replace($re, " ", $buffer);
        $buffer = filterHtml($buffer);

        $CI->output->set_output($buffer);
        // $CI->output->_display();
    }
}

if (!function_exists('limit_text')) {
    function limit_text($string, $limit)
    {
        $string = strip_tags($string);

        if (strlen($string) > $limit) {
            $stringCut = substr($string, 0, $limit);

            $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
        }

        return $string;
    }
}

if (!function_exists('hide_email')) {
    function hide_email($email)
    {
        return substr($email, 0, 3) . '****' . substr($email, strpos($email, '@'));
    }
}

if (!function_exists('load_image')) {
    function load_image($image_path, $width, $height, $zoom = 1, $crop = 0)
    {
        // return site_url('timthumb?src='.site_url($image_path).'&h='.$height.'&w='.$width.'&zc=0');
        return site_url('thumb?src=' . site_url($image_path) . '&size=' . $width . 'x' . $height . '&zoom=' . $zoom . '&crop=' . $crop);
        //http://via.placeholder.com/674x213
    }
}

if (!function_exists('convert_sql_date_to_date')) {
    function convert_sql_date_to_date($date, $php_date_format = 'd/m/Y')
    {
        //2017-05-17
        //17/05/2017
        $date = substr($date, 0, 10);

        if (!empty($date) && $date != '0000-00-00' && $date != '1970-01-01') {
            list($year, $month, $day) = explode('-', $date);
            $date                     = date($php_date_format, mktime(0, 0, 0, $month, $day, $year));
        } else {
            $date = '';
        }

        return $date;
    }
}

if (!function_exists('convert_date_to_sql_date')) {
    function convert_date_to_sql_date($date, $php_date_format = '')
    {
        $date = substr($date, 0, 10);
        if (preg_match('/\d{4}-\d{2}-\d{2}/', $date)) {
            //If it's already a sql-date don't convert it!
            return $date;
        } elseif (empty($date)) {
            return '';
        }

        $date_array = preg_split('/[-\.\/ ]/', $date);
        if ($php_date_format == 'd/m/Y') {
            $sql_date = date('Y-m-d', mktime(0, 0, 0, $date_array[1], $date_array[0], $date_array[2]));
        } elseif ($php_date_format == 'm/d/Y') {
            $sql_date = date('Y-m-d', mktime(0, 0, 0, $date_array[0], $date_array[1], $date_array[2]));
        } else {
            $sql_date = $date;
        }

        return $sql_date;
    }

}

function sub_menus($parent)
{
    $ci = &get_instance();

    return $ci->db->get_where('kategori', array('parent' => $parent));
}

if (!function_exists('send_email')) {
    function send_email($recipient_email_address, $subject, $message, $attachment = 'none')
    {
        $CI = &get_instance();
        $CI->load->library('My_PHPMailer');

        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->Port       = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth   = true;

        $mail->Username = $CI->config->item('mail_Username');
        $mail->Password = $CI->config->item('mail_Password');
        $mail->setFrom($CI->config->item('mail_Username'), $CI->config->item('mail_setFrom'));
        $mail->addReplyTo($CI->config->item('mail_Username'), $CI->config->item('mail_setFrom'));
        $mail->addAddress($recipient_email_address, preg_replace('/@.*?$/', '', $recipient_email_address));
        if ($attachment !== 'none') {$mail->AddAttachment($attachment);}
        $mail->Subject = $subject;
        $mail->msgHTML($message);

        if (!$mail->send()) {
            //return false;
            //echo 'Message could not be sent.';
            echo 'Mailer Error: <pre>' . $mail->ErrorInfo . '</pre>';
            //exit(0);
        }

        //return true;
    }
}
