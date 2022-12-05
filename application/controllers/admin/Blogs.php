<?php 
defined('BASEPATH') or exit ('No direct script access allowed');


class Blogs extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('blogs_model','login_model'));
        if ($this->login_model->loggedIn() == false) {
            redirect('admin/Login');
        }
    }

    public function add_blog_form() {
        $categories = $this->blogs_model->select(['status'=>1, 'category_type'=>2],'','es_categories');
        $tags = $this->blogs_model->select(['status'=>1],'','tags');

        $data = array(
            'categories' => $categories,
            'tags' => $tags,
            'content' => 'admin/cms/add_blog'
        );
        $this->load->view('admin/admin_master', $data);
    }

    public function add_blog() {
        if($this->input->post()){
            if($this->_validate(false) === true){
                $cat_id = $this->input->post('category_id');
                $sub_cat_id = $this->input->post('sub_category_id');
                $title = $this->input->post('title');
                $slug = $this->input->post('slug');
                $excerpt = $this->input->post('description');
                $body = $this->input->post('body');

                $data = array( 
                    'sub_category_id' => $sub_cat_id,
                    'user_id' => $this->session->userdata('user_id'),
                    'slug' => $slug,
                    'title' => $title,
                    'excerpt' => $excerpt,
                    'body' => $body,
                    'image' => '',
                );

                $this->blogs_model->transaction_start();
                $blog_data = $this->blogs_model->insert($data, 'blog_posts');

                // Adding the tags id and posts id in a bridging posts_tags table
                $tags = array();
                $tags = $this->input->post('tags');

                foreach($tags as $tag_id) {
                    $data = array(
                        'post_id' => $blog_data['inserted_id'],
                        'tag_id' => $tag_id
                    );
                    $this->blogs_model->insert($data,'posts_tags');
                }

                $field_name = 'blog_image';
                $folder_name = 'blog_images';
                $destination_folder = 'blog_images/blog_thumbnails';
                $file_name = $blog_data['inserted_id'];
                $this->insert_image('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'add_blog', $destination_folder, $cat_id, $body, $sub_cat_id, $tags);
            }
            else{
                $data = array(
                    'categories' => $this->blogs_model->select(['status'=>1],'','es_categories'),
                    'c_id' => $this->input->post('category_id'),
                    'blog_body' => $this->input->post('body'),
                    'sub_cat' => $this->blogs_model->select_row($this->input->post('sub_category_id'), 'id_sub_categories', 'es_sub_categories'),
                    'tags' => $this->blogs_model->select(['status'=>1],'','tags'),
                    'tags_selected' => $this->input->post('tags'),
                    'content' => 'admin/cms/add_blog'
                );
                $this->load->view('admin/admin_master', $data);
            }
        }
        else{
            $data = array(
                'categories' => $this->blogs_model->select(['status'=>1],'','es_categories'),
                'tags' => $this->blogs_model->select(['status'=>1],'','tags'),
                'content' => 'admin/cms/add_blog'
            );
            $this->load->view('admin/admin_master', $data);
        }
    }

    private function insert_image($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $destination_folder, $cat_id, $body, $sub_cat_id, $tags) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);

        if (isset($uploaded_file_data['error'])) {
            $data['image_error'] = $uploaded_file_data['error'];
            $data['c_id'] = $cat_id;
            $data['blog_body'] = $body;
            $data['sub_cat'] = $this->blogs_model->select_row($sub_cat_id, 'id_sub_categories', 'es_sub_categories');
            $data['categories'] = $this->blogs_model->select(['status'=>1],'','es_categories');
            $data['tags'] = $this->blogs_model->select(['status'=>1],'','tags');
            $data['tags_selected'] = $tags;
            $data['content'] = 'admin/cms/'.$view;
            $this->load->view('admin/admin_master', $data);
            // $this->session->set_flashdata('image_error', $uploaded_file_data['error']);
            // redirect(base_url() . 'admin/Events/' . $view);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->resize_image($folder_name, $image_name, $destination_folder, '700', '1050');
            $this->blogs_model->update_image($image_name, $column, $file_name);
            $this->trans_comp($column);
        }
    }
    
    private function trans_comp($column) {
        if ($column == 'image') {
            $this->blogs_model->transaction_complete();

            // $categories = $this->blogs_model->select(['status'=>1],'','es_categories');
            // $tags = $this->blogs_model->select(['status'=>1],'','tags');
            // $data['categories'] = $categories;
            // $data['tags'] = $tags; 
            // $data['success'] = "Added Successfully";
            // $data['content'] = 'admin/cms/add_blog';
            // $this->load->view('admin/admin_master', $data);
            $this->session->set_flashdata('success','Post Added Successfully');
            redirect(base_url('admin/Blogs/view_blogs'));
        } else {
            return TRUE;
        }
    }

    public function view_blogs() {
        $data['content'] = 'admin/cms/view_blogs';
        $data['posts'] = $this->blogs_model->get_blog_posts();
        $this->load->view('admin/admin_master', $data);
    }

    public function edit_blog($id)
    {
        $categories = $this->blogs_model->select(['status'=>1],'','es_categories');
        $tags = $this->blogs_model->select(['status'=>1],'','tags');
        $post = $this->blogs_model->select_row(base64_decode($id), 'id', 'blog_posts');
        $tags_tagged = $this->blogs_model->select(['post_id'=>base64_decode($id)],'','posts_tags'); 
        $sub_cat = $this->blogs_model->select_row($post->sub_category_id, 'id_sub_categories', 'es_sub_categories');

        $data = array(
            'categories' => $categories,
            'tags' => $tags,
            'tags_tagged' => $tags_tagged,
            'post' => $post,
            'sub_cat' => $sub_cat,
            'content' => 'admin/cms/edit_blog'
        );

        $this->load->view('admin/admin_master', $data);
    }

    public function update_blog($id) {
        $post_id = base64_decode($id);
        $this->input_validate($post_id);
        if($this->_validate(true) == true) {
            if($this->input->post('category_id') != ''){
                $cat_id = $this->input->post('category_id');
            }else{
                $cat_id = '';
            }
            $sub_cat_id = $this->input->post('sub_category_id');

            $title = $this->input->post('title');
            $slug = $this->input->post('slug');
            $excerpt = $this->input->post('description');
            $body = $this->input->post('body');

            $data = array( 
                'sub_category_id' => $sub_cat_id,
                'user_id' => $this->session->userdata('user_id'),
                'slug' => $slug,
                'title' => $title,
                'excerpt' => $excerpt,
                'body' => $body,
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $this->blogs_model->update($data, array('id' => $post_id), 'blog_posts');

            $tags = array();
            $tags = $this->input->post('tags');

            // Deleting the already avilable tags in the posts_tags table
            // Updating the new tags in the table

            $previous_tags = $this->blogs_model->select(['post_id'=>$post_id],'','posts_tags');
            
            $total_tags = count($previous_tags);

            for($i = 0; $i < $total_tags; $i++){
                $this->db->delete('posts_tags',['post_id'=>$post_id]);
            }

            foreach($tags as $tag_id){
                $data = array(
                    'post_id' => $post_id,
                    'tag_id' => $tag_id
                );
                $this->blogs_model->insert($data,'posts_tags');
            }
            
            $this->check_files($post_id, $cat_id, $body, $sub_cat_id, $tags);
        }
        else {
            $data = array(
                'categories' => $this->blogs_model->select(['status'=>1],'','es_categories'),
                'c_id' => $this->input->post('category_id'),
                'blog_body' => $this->input->post('body'),
                'sub_cat' => $this->blogs_model->select_row($this->input->post('sub_category_id'), 'id_sub_categories', 'es_sub_categories'),
                'tags' => $this->blogs_model->select(['status'=>1],'','tags'),
                'tags_selected' => $this->input->post('tags'),
                'post' => $this->blogs_model->select_row($post_id, 'id', 'blog_posts'),
                'content' => 'admin/cms/edit_blog'
            );
            $this->load->view('admin/admin_master', $data);
        }
    }

    public function check_files($post_id, $cat_id, $body, $sub_cat_id, $tags) {
        if ($_FILES['blog_image']['name'] != '') {
            $file_name = $post_id;
            $field_name = 'blog_image';
            $folder_name = 'blog_images';
            $destination_folder = 'blog_images/blog_thumbnails';
            $this->insert_image_edit('', '', 'gif|jpg|png', $field_name, $folder_name, $file_name, 'image', 'edit_blog', $post_id, $destination_folder, $cat_id, $body, $sub_cat_id, $tags);
        }
        else {
            $this->session->set_flashdata('success', 'Post Updated Successfully');
            redirect(base_url() . 'admin/Blogs/view_blogs');
        }
    }

    private function insert_image_edit($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name, $column, $view, $post_id, $destination_folder, $cat_id, $body, $sub_cat_id, $tags) {
        $uploaded_file_data = $this->do_upload($max_height, $max_width, $allowed_types, $field_name, $folder_name, $file_name);
        if (isset($uploaded_file_data['error'])) {
            $data['image_error'] = $uploaded_file_data['error'];
            $data['c_id'] = $cat_id;
            $data['blog_body'] = $body;
            $data['sub_cat'] = $this->blogs_model->select_row($sub_cat_id, 'id_sub_categories', 'es_sub_categories');
            $data['categories'] = $this->blogs_model->select(['status'=>1],'','es_categories');
            $data['tags'] = $this->blogs_model->select(['status'=>1],'','tags');
            $data['tags_selected'] = $tags;
            $data['post'] = $this->blogs_model->select_row($post_id, 'id', 'blog_posts');
            $data['content'] = 'admin/events/'.$view;
            $this->load->view('admin/admin_master', $data);
        } else {
            $image_name = $uploaded_file_data['upload_data']['file_name'];
            $this->resize_image($folder_name, $image_name, $destination_folder, '700', '1050');
            $sd = $this->blogs_model->update_image($image_name, $column, $file_name);
            $this->trans_comp_edit($column);
        }
    }

    private function trans_comp_edit($column) {
        if ($column == 'image') {
            $this->session->set_flashdata('success', 'Post Updated Successfully');
            redirect(base_url() . 'admin/Blogs/view_blogs');
        } else {
            //die('hello');
            return TRUE;
        }
    }

    public function get_sub_categories($id){
        $category_id = $id ;
        $this->input_validate($category_id);
        $data = $this->blogs_model->get_cat($category_id);
        echo json_encode($data);
    }

    public function change_status($status = '', $id = '') {
        if (base64_decode($status) == '1') {
            $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
            $this->blogs_model->update_blog_status($set, base64_decode($id), 'id', 'blog_posts');

            $post_tags = $this->blogs_model->select(['post_id'=>base64_decode($id)],'','posts_tags');
            $set = array('status' => 0,'updated_at'=>date('Y-m-d H:i:s'));
            foreach($post_tags as $post_tag){
                $this->blogs_model->update_blog_status($set, $post_tag->id, 'id', 'posts_tags');
            }
        
            $this->session->set_flashdata('success', 'Disabled Successfully');
            redirect('admin/Blogs/view_blogs');
        } elseif (base64_decode($status) == '0') {
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            $this->blogs_model->update_blog_status($set, base64_decode($id), 'id', 'blog_posts');

            $post_tags = $this->blogs_model->select(['post_id'=>base64_decode($id)],'','posts_tags');
            $set = array('status' => 1,'updated_at'=>date('Y-m-d H:i:s'));
            foreach($post_tags as $post_tag){
                $this->blogs_model->update_blog_status($set, $post_tag->id, 'id', 'posts_tags');
            }

            $this->session->set_flashdata('success', 'Enabled Successfully');
            redirect('admin/Blogs/view_blogs');
        } else {
            // $data['fail'] = 'Wrong Value';
            $this->session->set_flashdata('fail', 'Wrong Value');
            redirect('admin/Blogs/view_blogs');
        }
    }
    
    function delete_blog($id) {
        $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
        $this->blogs_model->update_blog_status($set, base64_decode($id), 'id', 'blog_posts');
        $post_tags = $this->blogs_model->select(['post_id'=>base64_decode($id)],'','posts_tags');
        $set = array('status' => 3,'updated_at'=>date('Y-m-d H:i:s'));
        foreach($post_tags as $post_tag){
            $this->blogs_model->update_blog_status($set, $post_tag->id, 'id', 'posts_tags');
        }
        $this->session->set_flashdata('success', 'Deleted Successfully');
        redirect('admin/Blogs/view_blogs');
    }
    
    private function _validate($edit) {
        $this->form_validation->set_rules('sub_category_id', 'Sub Category', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]|max_length[150]');

        if($edit == true){
            $post = $this->blogs_model->select_row(base64_decode($this->uri->segment(4)), 'id', 'blog_posts');
            if($this->input->post('slug') != $post->slug) {
                $is_unique =  '|is_unique[blog_posts.slug]';
                } else {
                $is_unique =  '';
            }
            $this->form_validation->set_rules('slug', 'Tag Slug', 'trim|required|regex_match[/^[a-zA-Z-]*$/]|min_length[3]|max_length[175]'.$is_unique);
        }
        else {
            $this->form_validation->set_rules('slug', 'Tag Slug', 'trim|required|regex_match[/^[a-zA-Z-]*$/]|min_length[3]|max_length[175]|is_unique[blog_posts.slug]');
        }

        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[40]|max_length[500]');
        $this->form_validation->set_rules('body', 'Body', 'trim|required');
        $this->form_validation->set_rules('tags[]', 'Tags', 'trim|required');

        if($this->form_validation->run() == TRUE) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>