 <?php
    defined('BASEPATH') or exit('NO direct script access aloowed');

    require APPPATH . '/libraries/REST_Controller.php';

    use Restserver\Libraries\REST_Controller;

    require APPPATH . 'libraries/Format.php';

    class SMS extends REST_Controller
    {
        function index_post()
        {
            $data = array(

                'id' => $this->post('id'),
                'nomor' => $this->post('nomor'),
                'provider' => $this->post('provider'),
                'nominal' => $this->post('nominal'),
                'tanggal' => $this->post('tanggal'),
            );
            $insert = $this->db->insert('pengguna', $data);
            if ($insert) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
