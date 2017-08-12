<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends MY_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->is_logged_in();
    
    // Force SSL
    //$this->force_ssl();

    // Form and URL helpers always loaded (just for convenience)
    $this->load->helper('url');
    $this->load->helper('form');
  }

  public function index(){
    if( !$this->require_role('admin') ) return;
    
    $this->load->model('Usuario_model');

    $data['title'] = 'Usuarios';
    $data['usuarios'] = $this->Usuario_model->buscar_todos();
    
    $this->load->view('layout/header', $data);
    $this->load->view('usuarios/index', $data);
    $this->load->view('layout/footer');
  }

  public function nuevo(){
    $data['title'] = 'Registro de nuevo Usuario';

    $this->load->view('layout/header', $data);
    $this->load->view('usuarios/nuevo', $data);
    $this->load->view('layout/footer');
  }

  public function create_user(){
    // Customize this array for your user
    $user_data = [
      'username'   => 'skunkbot1',
      'passwd'     => 'PepeLePew7',
      'email'      => 'skunkbot1@example.com',
      'auth_level' => '9', // 9 if you want to login @ examples/index.
    ];

    $this->is_logged_in();

    // echo $this->load->view('examples/page_header', '', TRUE);

    // Load resources
    $this->load->helper('auth');
    $this->load->model('usuario_model');
    $this->load->model('examples/validation_callables');
    $this->load->library('form_validation');

    $this->form_validation->set_data( $user_data );

    $validation_rules = [
      [
        'field' => 'username',
        'label' => 'username',
        'rules' => 'max_length[12]|is_unique[' . db_table('user_table') . '.username]',
        'errors' => [
          'is_unique' => 'Username already in use.'
        ]
      ],
      [
        'field' => 'passwd',
        'label' => 'passwd',
        'rules' => [
          'trim',
          'required',
          [ 
            '_check_password_strength', 
            [ $this->validation_callables, '_check_password_strength' ] 
          ]
        ],
        'errors' => [
          'required' => 'The password field is required.'
        ]
      ],
      [
        'field'  => 'email',
        'label'  => 'email',
        'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
        'errors' => [
          'is_unique' => 'Email address already in use.'
        ]
      ],
      [
        'field' => 'auth_level',
        'label' => 'auth_level',
        'rules' => 'required|integer|in_list[1,6,9]'
      ]
    ];

    $this->form_validation->set_rules( $validation_rules );

    if( $this->form_validation->run() )
    {
      $user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
      $user_data['user_id']    = $this->usuario_model->get_unused_id();
      $user_data['created_at'] = date('Y-m-d H:i:s');

      // If username is not used, it must be entered into the record as NULL
      if( empty( $user_data['username'] ) )
      {
        $user_data['username'] = NULL;
      }

      $this->db->set($user_data)
        ->insert(db_table('user_table'));

      if( $this->db->affected_rows() == 1 )
        echo '<h1>Congratulations</h1>' . '<p>User ' . $user_data['username'] . ' was created.</p>';
    }
    else
    {
      echo '<h1>User Creation Error(s)</h1>' . validation_errors();
    }

    // echo $this->load->view('examples/page_footer', '', TRUE);
  }
  
}
