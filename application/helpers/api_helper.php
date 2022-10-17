<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('check_expired')) {
    /**
     * @return void
     */
    function check_expired()
    {
        $ci = &get_instance();
        date_default_timezone_set('Asia/jakarta');

        $expired_token = $ci->session->userdata('expired_token');
        // $now = date('Y-m-d H:i:s', strtotime('-10 minutes'));
        $now = date('Y-m-d H:i:s');
        if ($now >= $expired_token) {
            login_api_sync();
        }
    }
}

if (!function_exists('login_api_sync')) {
    /**
     * @return void
     */
    function login_api_sync()
    {
        $ci = &get_instance();
        $url = $ci->config->item('base_api') . 'login';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'username' => $ci->session->userdata('username'),
                'password' => $ci->session->userdata('password')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);

        $ci->session->set_userdata('token', $data->token);
        $ci->session->set_userdata('expired_token', $data->expired);
    }
}

if (!function_exists('login_session_api_sync')) {
    /**
     * @return void
     */
    function login_session_api_sync()
    {
        $ci = &get_instance();
        $url = $ci->config->item('base_api') . 'login';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'username' => $ci->session->userdata('username'),
                'password' => $ci->session->userdata('password')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);

        $ci->session->set_userdata('token', $data->token);
        $ci->session->set_userdata('expired_token', $data->expired);
    }
}


if (!function_exists('api_sync_get')) {
    /**
     * @param string $url
     * @param string|array $data
     * 
     * @return object|null
     */
    function api_sync_get($url, $data = NULL)
    {

        $ci = &get_instance();
        $url = $ci->config->item('base_api') . $url;


        if ($data) {
            $data = '?' . http_build_query($data);
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . $data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}

if (!function_exists('api_sync_post')) {
    /**
     * @param string $url
     * @param string|array $data
     * 
     * @return object|null
     */
    function api_sync_post($url, $data = NULL)
    {

        $ci = &get_instance();
        $url = $ci->config->item('base_api') . $url;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}

if (!function_exists('api_sync_put')) {
    /**
     * @param string $url
     * @param string|array $data
     * 
     * @return object|null
     */
    function api_sync_put($url, $data = NULL)
    {

        $ci = &get_instance();
        $url = $ci->config->item('base_api') . $url;

        $data = parameter($data);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}

if (!function_exists('api_sync_delete')) {
    /**
     * @param string $url
     * @param string|array $data
     * 
     * @return object|null
     */
    function api_sync_delete($url, $data = NULL)
    {

        $ci = &get_instance();
        $url = $ci->config->item('base_api') . $url;
        $data = parameter($data);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}

if (!function_exists('parameter')) {
    /**
     * @param array $data
     * @param bool $urlencode
     *
     * @return string|null
     */
    function parameter($data, $urlencode = false)
    {
        if (empty($data)) return null;

        $res = [];
        foreach ($data as $key => $value) {
            $val = $urlencode ? urlencode($value) : $value;
            // masing-masing val query dimasukin ke array
            $res[] = $key . '=' . $val;
        }

        return join('&', $res);
    }
}

if (!function_exists('send_wa_content')) {
    /**
     * @param string $message
     * @param string $hp
     * @param string $id
     *
     * @return void
     */
    function send_wa_content($message, $hp, $id)
    {
        $ci = &get_instance();
        $db = $ci->load->database('db_post_office', TRUE);

        // load helper str
        $ci->load->helper('str');

        #NOTIF WA KE ATASAN
        $result = [
            'app_id' => 'myessential registrasi reseller', // [WAJIB] diisi dengan nama aplikasi, contoh hris, openbravo
            'app_trx_id' => $id, // [OPTIONAL] diisi dengan kode transaksi agar mempermudah saat tracking data
            'app_trx_id_dtl' => $id, // [OPTIONAL] diisi dengan kode transaksi agar mempermudah saat tracking data
            'wa_no' => toID($hp), // [WAJIB] diisi dengan nomor whatsapp penerima, formatnya harus pake kode negara, contoh: 6288803001686
            'wa_log' => 'new', // [WAJIB] diisi dengan text 'new'
            'wa_content' => $message, // [WAJIB] pesan whatsapp yang akan dikirim
            'wa_img' => NULL, // [OPTIONAL] diisi dengan url gambar yang akan dikirim
            'wa_category' => 'reguler', // [WAJIB] diisi dengan text 'reguler'
            'created_by' => 1, // [WAJIB] diisi aja 1
            'created_at' => date('Y-m-d H:i:s')
        ];

        $db->insert('send_whatsapp', $result);
    }
}
