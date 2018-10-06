<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/news/index/news
	 *	- or -
	 * 		http://example.com/index.php/news/index/news/view
	 *	- or -
	 *              
	 */

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');   // load database 'news_db'
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['news'] = $this->news_model->get_news();  // Select * FROM 'news'
                $data['title'] = 'News archive';
                
		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($slug);  // Select * FROM 'news' WHERE ('slug' = $slug) 
                
		if (empty($data['news_item']))
		   {
		        show_404();
		   }

		$data['title'] = $data['news_item']['title'];

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');               
        }
        
        public function create()
	{
		$this->load->helper('form');                // load form helper
		$this->load->library('form_validation');    // load validation library

		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');   // set rules of the field 'title': required
		$this->form_validation->set_rules('text', 'Text', 'required');     // set rules of the field 'text':  required

		if ($this->form_validation->run() === FALSE)          // checks if the form validation have ran successfully:
		      {                                                    // - NOT SUCCESSFULLY
			$this->load->view('templates/header', $data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');

		      }
		   else
		      {                                                    // - SUCCESSFULLY
			$this->news_model->set_news();             // INSERT INTO news (id, title, slug, text) VALUES 
			$this->load->view('news/success');         //                  ('', $data['title'], $data['slug'], $data['text'])
		      }
	}
}
