<?php

$config = array(
    'register' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[users.email]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[6]'
        ),
        array(
            'field' => 'password_conf',
            'label' => 'Password Confirmation',
            'rules' => 'required|min_length[6]|matches[password]'
        ),
        array(
            'field' => 'first_name',
            'label' => 'First Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'last_name',
            'label' => 'Last Name',
            'rules' => 'required'
        ),
    ),
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[4]'
        )
    ),
    'student_login' => array(
        array(
            'field' => 'student_id',
            'label' => 'Student Id',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[4]'
        )
    ),
    'shipping_methods' => array(
        array(
            'field' => 'shipping_method_name',
            'label' => 'shipping_method_name',
            'rules' => 'required'
        ),
        array(
            'field' => 'rate',
            'label' => 'rate',
            'rules' => 'required'
        )
    ),
    'change_password' => array(
        array(
            'field' => 'old_password',
            'label' => 'Old password',
            'rules' => 'required'
        ),
        array(
            'field' => 'new_password',
            'label' => 'New Password',
            'rules' => 'required|min_length[6]|max_length[12]'
        ),
        array(
            'field' => 'reenter_password',
            'label' => 'Re Enter Password',
            'rules' => 'required|min_length[6]|max_length[12]|matches[new_password]'
        )
    ),


    'add_shop' => array(
        array(
            'field' => 'shop_name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'shop_email',
            'label' => 'Email',
            'rules' => 'valid_email'
        ),
        array(
            'field' => 'shop_contact',
            'label' => 'shop_contact',
            'rules' => ''
        ),
        array(
            'field' => 'shop_address',
            'label' => 'shop_address',
            'rules' => 'required'
        ),
        array(
            'field' => 'Shop_fax',
            'label' => 'Shop_fax',
            'rules' => ''
        ),
        
    ),

    'insert_category' => array(
        array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'required|min_length[3]'
        )
    ),
    
    'insert_bayan' => array(
        array(
            'field' => 'bayan',
            'label' => 'Bayan',
            'rules' => 'required' //|is_unique[bayanat.name]|min_length[3]
        )
    ),
    
    
     
     'insert_brand' => array(
        array(
            'field' => 'name',
            'label' => 'Brand Name',
            'rules' => 'required|is_unique[es_brand.name]'
        ),
        array(
            'field' => 'description',
            'label' => 'description',
            'rules' => 'required|min_length[10]'
        )
    ),
     'edit_brand' => array(
        array(
            'field' => 'name',
            'label' => 'Brand Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'description',
            'rules' => 'required|min_length[10]'
        )
    ),
    'insert_sub_category' => array(
        array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'required|min_length[3]' //|is_unique[es_sub_categories.name]
        ),
        array(
            'field' => 'under_category',
            'label' => 'Under Category',
            'rules' => 'required'
        )
    ),
    'edit_sub_category' => array(
        array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'required|min_length[3]'
        ),
        array(
            'field' => 'under_category',
            'label' => 'Under Category',
            'rules' => 'required'
        )
    ),
    'insert_sub_sub_category' => array(
        array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'required|is_unique[es_sub_sub_categories.name]|min_length[3]'
        ),
        array(
            'field' => 'under_category',
            'label' => 'Under Category',
            'rules' => 'required'
        )
    ),
    'edit_sub_sub_category' => array(
        array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'required|min_length[3]'
        ),
        array(
            'field' => 'under_category',
            'label' => 'Under Category',
            'rules' => 'required'
        )
    ),
    'edit_category' => array(
        array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'required|min_length[3]'
        )
    ),
    
     'edit_bayan' => array(
        array(
            'field' => 'bayan',
            'label' => ' bayan',
            'rules' => 'required|min_length[3]'
        )
    ),
    
//    'insert_book' => array(
//        array(
//            'field' => 'bookname',
//            'label' => 'book',
//            'rules' => 'required|is_unique[books.name]|min_length[3]'
//        )
//    ),
//	
//	
//	'edit_book' => array(
//        array(
//            'field' => 'bookname',
//            'label' => ' book',
//            'rules' => 'required|min_length[3]'
//        )
//    ),
    'insert_product' => array(
        array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'required'
        ),
        array(
            'field' => 'sub_category',
            'label' => 'Sub Category',
            'rules' => 'required'
        ),
        array(
            'field' => 'sub_sub_category',
            'label' => 'Sub Sub Category',
            'rules' => 'required'
        ),
        array(
            'field' => 'brand',
            'label' => 'brand',
            'rules' => 'required'
        ),
         array(
            'field' => 'name',
            'label' => 'Product Name',
            'rules' => 'required'
        ),
         array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required'
        ),
         array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required|numeric'
        ),
         array(
            'field' => 'stock',
            'label' => 'stock',
            'rules' => 'required|numeric'
        ),
         array(
            'field' => 'sale',
            'label' => 'Sale',
            'rules' => 'numeric'
        )
    ),
    'reset_password' => array(
        array(
            'field' => 'email_for_password_request',
            'label' => 'email_for_password_request',
            'rules' => 'required|valid_email'
        )
    ),
    'update_profile' => array(
        array(
            'field' => 'fname',
            'label' => 'first_name',
            'rules' => 'required'
        ),
        array(
            'field' => 'lname',
            'label' => 'Last Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'contact',
            'label' => 'contact',
            'rules' => 'required'
        ),
        array(
            'field' => 'address',
            'label' => 'address',
            'rules' => 'required'
        ),
        array(
            'field' => 'address',
            'label' => 'address',
            'rules' => 'required'
        ),
        array(
            'field' => 'zip',
            'label' => 'zip code',
            'rules' => 'required'
        ),

    )
);
?>