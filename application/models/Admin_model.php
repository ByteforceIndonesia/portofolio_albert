<?php 

class Admin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function get($table)
	{
		return $this->crud_model->read($table);
	}

	public function editQuotes ($quotes)
	{
		for($i = 0; $i<3; $i++)
		{
			if($quotes[$i] != null)
			{
				$this->crud_model->update('quotes', array('value' => $quotes[$i]), array('id' => $i+1));
			}
		}
	}

	public function uploadPortfolio($files, $uuid)
	{
		if($_FILES)
		{
			$config['upload_path']          = './assets/images/upload/portfolio';
	        $config['allowed_types']        = 'png|jpg|jpeg';
	        $config['max_size']             = 5000;
	        $config['overwrite']			= true;
	        $config['file_name']			= $uuid;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('new_port'))
			{
				$this->session->set_flashdata('message', $this->upload->display_errors());
				redirect(base_url('admin/webconfig'));
				exit;
			}else
			{
				$uploaded_data = $this->upload->data();
				return $uploaded_data['file_name'];
			}
		}
	}

	public function quotesImages ($images)
	{
		$config['upload_path']          = './assets/images';
        $config['allowed_types']        = 'jpg|jpeg';
        $config['max_size']             = 7000;
        $config['overwrite']			= true;
        
		$this->load->library('upload', $config);

		$counter = 1;

		foreach($_FILES as $filename => $file)
		{
			if($file['name'])
			{
				if($file['type'] == 'image/jpg')
					$config['file_name'] = $counter . ".jpg";
				else
					$config['file_name'] = $counter . ".png";

				$this->upload->initialize($config);

				if(!$this->upload->do_upload($filename))
					return $this->upload->display_errors();
				else
					$counter++;
			}else
				$counter++;
		}

		return "Success upload images";
	}

	public function edit($table, $data, $where)
	{
		return $this->crud_model->update($table, $data, $where);
	}

	public function create_new ($table, $data)
	{
		return $this->crud_model->create($table, $data);
	}
}