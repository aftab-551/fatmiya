<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Blogs extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('blogs_model',));
    }

    public function all_blogs(){
        $data['content'] = 'website/blogs/all_blogs';
        $data['footer_blog_post'] = $this->footer_blog_post;
        $this->load->view('website/master', $data);
    }

    public function ajax_blogs(){
        $posts_count = count($this->blogs_model->select(['status'=>1], '', 'blog_posts'));

        $this->load->library('pagination');
        $config['base_url'] = base_url('blog/ajax_blogs');
        $config['total_rows'] = $posts_count;
        $config['per_page'] = 2;
        
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();

        //Check if the 3rd URI segment that is page number is not empty
        // -1 is used to fix the issue caused by using use_page_numbers option;
        // After using -1 we will multiply it by per_page which returns the exact page / offset number we are in
        $page = $this->uri->segment(3) ? ($this->uri->segment(3) - 1) * $config['per_page'] : '0';
 
        $posts = $this->blogs_model->get_posts_with_ajax_pagination($config['per_page'], $page);
        $recent_posts = $this->blogs_model->get_recent_posts();

        $data['blog_posts'] = $posts;
        $data['recent_posts'] = $recent_posts;
        $data['links'] = $links;
        $this->load->view('website/blogs/ajax_blogs', $data);
    }

    public function blog_details($slug){
        $blog_post = $this->blogs_model->get_post_details($slug);
        $post_tags = $this->blogs_model->get_blog_tags(['blog_posts.id'=>$blog_post->id]);
        $data = array(
            'views'=> ++$blog_post->views,
        );
        $this->blogs_model->update($data, ['slug'=>$slug], 'blog_posts');

        $data['post'] = $blog_post;
        $data['tags'] = $post_tags;
        $data['footer_blog_post'] = $this->footer_blog_post;
        $data['content'] = 'website/blogs/blog_detail';
        $this->load->view('website/master', $data);
    }

}


?>