<?php
namespace Helpers;

class Func
{
    /**
     * Set the host
     * @return string
     */
    static public function host(): string
    {
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            // SSL connection
            return "https://" . $_SERVER['HTTP_HOST'];
        } else {
            return "http://" . $_SERVER['HTTP_HOST'];
        }
    }

    /**
     * Redirect to any resource
     * @param $location
     * @return void
     */
    static function redirect_to($location = NULL): void
    {
        if ($location != NULL) {
            header("Location: {$location}");
            exit;
        }
    }

    /**
     * Redirect back to referrer resource.
     * @return void
     */
    static function redirect_back(): void
    {
        if(isset($_SERVER['HTTP_REFERER'])) {
            $location = $_SERVER['HTTP_REFERER'];
        } else {
            $location = Func::host();
        }

        if (ob_get_length()) ob_end_clean();
        header('Location:' . $location);

        exit();
    }

    /**
     * Generates a random string of any length
     * @param $length
     * @return string
     */
    static function rand_string($length): string
    {
        $s = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $rand = '';
        srand((double)microtime() * 1000000);
        for ($i = 0; $i < $length; $i++) {
            $rand .= $s[rand() % strlen($s)];
        }
        return $rand;
    }

    static function dec_enc($action, $string): bool|string
    {
        $output = false;

        if(empty($string) || is_null($string)) {
            return false;
        }

        $encrypt_method = "AES-256-CBC";
        $secret_key = '6c7ff136cd13b0ff35b9979b151f225';
        $secret_iv = '3456130789f261301';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    static function putFlash($type, $message): void
    {
        $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
    }

    static function datetime_to_text($datetime = ""): string
    {
        if(!is_null($datetime)) {
            $unixdatetime = strtotime($datetime);
            return date("M d, Y, h:i A", $unixdatetime);
        } else {
            return "";
        }
    }

    static function date_to_text($datetime = ""): string
    {
        if(!is_null($datetime)) {
            $unixdatetime = strtotime($datetime);
            return date("M d, Y", $unixdatetime);
        } else {
            return "";
        }
    }

    static function pagination_links($totalItems, $perPage, $currentPage, $baseUrl)
    {
        $noOfPages = ceil($totalItems / $perPage);

        $pagePrev = ($currentPage == 1) ? 1 : ($currentPage - 1);
        $pageNext = ($currentPage == $noOfPages) ? $noOfPages : ($currentPage + 1);

        $prevPage = "<li class='page-item'><a class='page-link' href='{$baseUrl}page=$pagePrev'>Prev</a></li>";
        $nextPage = "<li class='page-item'><a class='page-link' href='{$baseUrl}page=$pageNext'>Next</a></li>";

        $firstPage = "<li class='page-item'><a class='page-link' href='{$baseUrl}page=1'><<</a></li>";
        $lastPage = "<li class='page-item'><a class='page-link' href='{$baseUrl}page=$noOfPages'>>></a></li>";

        $mainNav = [];
        for ($i = 1; $i <= $noOfPages; $i++) {
            $active = ($currentPage == $i) ? 'active' : '';
            $mainNav[$i] = "<li class='page-item $active'><a class='page-link' href='{$baseUrl}page=$i'>$i</a></li>";
        }

        if (count($mainNav) == 0) {
            return null;
        }

        $showableIndex = array_unique([
            1,
            2,
            ($currentPage - 2),
            ($currentPage - 1),
            $currentPage,
            ($currentPage + 1),
            ($currentPage + 2),
            ($noOfPages - 1),
            $noOfPages
        ]);

        $smartLink = '';
        foreach ($showableIndex as $index) {
            if (isset($mainNav[$index])) {
                $smartLink .= $mainNav[$index];
            }
        }

        $link = $firstPage . $prevPage . $smartLink . $nextPage . $lastPage;

        return $link;
    }
}