<?php 
function setLang($language = "",$redirect_to=false) {
	$ci =& get_instance();

	$language = ($language != "") ? $language : "english";
	$ci->session->set_userdata('site_lang', $language);
	if($redirect_to){
		redirect($redirect_to);
	}
	else {
		redirect(base_url());
	}
}
function getUserRoleName($role_id=false) {
	$ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    if ($role_id) {
        $ci->db->select('id,title_en,title_ar');
        $ci->db->where("id", $role_id);
        $ci->db->where("is_active", '1');
        $ci->db->where("is_delete", '0');
        $query = $ci->db->get("user_role_tbl");
        if ($query->num_rows() == '1') {
            $result = $query->result_array();
            if ($language == 'English') {
                return $result['0']["title_en"];
            }
            else {
                return $result['0']["title_ar"];
            }
        } else {
            return '';
        }
    }
    else {
        return '';
    }  
}
function getUserName($user_id=false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    if ($user_id) {
        $ci->db->select('id,first_name,middle_name,last_name');
        $ci->db->where("id", $user_id);
        $ci->db->where("is_active", '1');
        $ci->db->where("is_delete", '0');
        $query = $ci->db->get("user_tbl");
        if ($query->num_rows() == '1') {
            $result = $query->result_array();
            return $result['0']["first_name"].' '.$result['0']["middle_name"].' '.$result['0']["last_name"];
        } 
        else {
            return $result['0']["email"];
        }
    }
    else {
        return '';
    }  
}
function getUserLastLoginDate($user_id=false) {
    $ci =& get_instance();
    $lng      = $ci->session->userdata('lng');
    if ($user_id) {
        $ci->db->select('web_logs_id,created_date');
        $ci->db->where("user_id", $user_id);
        $ci->db->where("actions", 'login');
        $ci->db->where("is_active", '1');
        $ci->db->where("is_delete", '0');
        $ci->db->order_by("created_date", 'desc');
        $ci->db->limit('1');
        $query = $ci->db->get("web_logs");
        // echo $ci->db->last_query();
        // exit();
        if ($query->num_rows() == '1') {
            $result = $query->result_array();
            return date('d-m-Y h:i:s A',$result['0']["created_date"]);
        } else {
            return date('d-m-Y h:i:s A');;
        }
    }
    else {
        return '';
    }  
}
function getBlogs($blog_category_id=false,$is_promoted=false,$status=false,$blog_id=false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->select(
                    'blog_categories_tbl.id as blog_categories_id,
                     blog_categories_tbl.title_en as category_title_en,
                     blog_categories_tbl.title_ar as category_title_ar,
                     blog_categories_tbl.parmalink as category_parmalink,
                     blog_tbl.*');
    $ci->db->from('blog_tbl');
    $ci->db->join('blog_categories_tbl', 'blog_categories_tbl.id = blog_tbl.blog_category_id');
    $ci->db->where("blog_tbl.is_active", '1');
    $ci->db->where("blog_tbl.is_delete", '0');
    if($blog_category_id){
        $ci->db->where("blog_tbl.blog_category_id", $blog_category_id);
    }
    if($is_promoted){
        $ci->db->where("blog_tbl.is_promoted", $is_promoted);
    }
    if($status){
        $ci->db->where("blog_tbl.status", $status);
    }
    if ($blog_id) {
        $ci->db->where("blog_tbl.id", $blog_id);
    }
    $query = $ci->db->get();
    foreach ($query->result_array() as $key => $value) {
        if ($language =='English') {
            $title = $value["title_en"];
            $category_title = $value["category_title_en"];
            $content = $value["content_en"];
            $excerpt = $value["excerpt_en"];
        }
        else {
            $title = $value["title_ar"];
            $category_title = $value["category_title_ar"];
            $content = $value["content_ar"];
            $excerpt = $value["excerpt_en"];
        }
        $value['title'] = $title;
        $value['category_title'] = $category_title;
        $value['content'] = $content;
        $value['excerpt'] = $excerpt;
        $data[$value['id']] = $value;
    }
    return $data;
}
function getAds($ads_id=false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_delete", '0');
    if ($ads_id) {
        $ci->db->where("id", $ads_id);
    }
    $query = $ci->db->get("ads_tbl");
    foreach ($query->result_array() as $key => $value) {
        if ($language == 'English') {
            $title = $value["title_en"];
            $short_desc = $value["short_desc_en"];
        }
        else {
            $title = $value["title_ar"];
            $short_desc = $value["short_desc_ar"];
        }
        $value['title'] = $title;
        $value['short_desc'] = $short_desc;
        $data[$value['id']] = $value;
    }
    return $data;
}
function getAreas($area_id=false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_delete", '0');
    if ($area_id) {
        $ci->db->where("id", $area_id);
    }
    $query = $ci->db->get("area_tbl");
    foreach ($query->result_array() as $key => $value) {
        if($language == 'English'){
            $title = $value['title_en'];
        }
        else {
            $title = $value['title_ar'];
        }
        $value['title']   = $title;
        $data[$value['id']] = $value;
    }
    return $data;
}
function getWorkingTimes($start_time= false, $end_time = false,$booked=false)
{
    $start_time = '9-01-2022 00:00:00';  //start time as string
    $end_time = '9-01-2022 23:00:00';  //end time as string
    $booked = array('12:20-12:40','13:00-13:20');    //booked slots as arrays
    $start = DateTime::createFromFormat('d-m-Y H:i:s',$start_time);  //create date time objects
    $end = DateTime::createFromFormat('d-m-Y H:i:s',$end_time);  //create date time objects
    $count = 0;  //number of slots
    $out = array();   //array of slots 
    for($i = $start; $i < $end;)  //for loop 
    {
        $avoid = false;   //booked slot?
        $time1 = $i->format('H:i');   //take hour and minute
        $i->modify("+30 minutes");      //add 20 minutes
        $time2 = $i->format('H:i');     //take hour and minute
        $slot = $time1."-".$time2;      //create a format 12:40-13:00 etc
        for($k=0;$k<sizeof($booked);$k++)  //if booked hour
        {
            if($booked[$k] == $slot)   //check
            {
               $avoid = false;   //yes. booked
            }
            if(!$avoid && $i<$end)  //if not booked and less than end time
            {
                $count++;           //add count
                $slots = ['start'=>$time1, 'stop'=>$time2];         //add count
                array_push($out,$slots); //add slot to array
            }
        }
    }
    return $out;
}
function getHeroSectionSlides($slide_id = false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_active", '1');
    $ci->db->where("owner_type", 'hero');
    if($slide_id){
        $ci->db->where("id", $slide_id);
    }
    $ci->db->order_by('slide_order','asc');
    $query = $ci->db->get('slider_tbl');
    foreach ($query->result_array() as $key => $value) {
        if ($language =='English') {
            $title = $value["title_en"];
            $short_desc = $value["short_desc_en"];
        }
        else {
            $title = $value["title_ar"];
            $short_desc = $value["short_desc_ar"];
        }
        $value['title'] = $title;
        $value['short_desc'] = $short_desc;
        $data[$value['id']] = $value;
    }
    return $data;
}
function getPage($page_id = false,$status=false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    if ($status) {
        $ci->db->where("status", $status);
    }
    $ci->db->where("is_active", '1');
    if($page_id){
        $ci->db->where("id", $page_id);
    }
    $ci->db->where("is_active", '1');
    $query = $ci->db->get('pages_tbl');
    foreach ($query->result_array() as $key => $value) {
        if ($language =='English') {
            $title      = $value["title_en"];
            $short_desc = $value["short_desc_en"];
            $long_desc  = $value["long_desc_en"];
        }
        else {
            $title      = $value["title_ar"];
            $short_desc = $value["short_desc_ar"];
            $long_desc  = $value["long_desc_ar"];
        }
        $value['title']      = $title;
        $value['short_desc'] = $short_desc;
        $value['long_desc']  = $long_desc;
        $data[$value['id']]  = $value;
    }
    return $data;
}
function getServices($id = false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_active", '1');
    if($id){
        $ci->db->where("id", $id);
    }
    $query = $ci->db->get('services_tbl');
    foreach ($query->result_array() as $key => $value) {
        if ($language =='English') {
            $title      = $value["title_en"];
            $short_desc = $value["short_desc_en"];
        }
        else {
            $title      = $value["title_ar"];
            $short_desc = $value["short_desc_ar"];
        }
        $value['title']      = $title;
        $value['short_desc'] = $short_desc;
        $data[$value['id']]  = $value;
    }
    return $data;
}
function getTestimonials($id = false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_active", '1');
    if($id){
        $ci->db->where("id", $id);
    }
    $query = $ci->db->get('testimonial_tbl');
    foreach ($query->result_array() as $key => $value) {
        if ($language =='English') {
            $remarks      = $value["remarks_en"];
        }
        else {
            $remarks      = $value["remarks_ar"];
        }
        $value['remarks']      = $remarks;
        $data[$value['id']]  = $value;
    }
    return $data;
}
function getWhyUs($id = false,$limit=false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_active", '1');
    if($id){
        $ci->db->where("id", $id);
    }
    if($limit){
        $ci->db->limit($limit);
    }
    $query = $ci->db->get('why_us_tbl');
    foreach ($query->result_array() as $key => $value) {
        if ($language =='English') {
            $title      = $value["title_en"];
            $short_desc      = $value["short_desc_en"];
        }
        else {
            $short_desc      = $value["short_desc_ar"];
        }
        $value['title']      = $title;
        $value['short_desc']      = $short_desc;
        $data[$value['id']]  = $value;
    }
    return $data;
}
function getPortfolios($id = false,$limit=false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');
    // Get all the rows of the First table (portfolio_tbl)  and 
    // the first matching row in the second table(slider_tbl)
    $data = array();
    $ci->db->select('slider_tbl.id as slide_id,slider_tbl.slide_order,slider_tbl.image,slider_tbl.owner_id as project_id,portfolio_tbl.*');
    $ci->db->from('portfolio_tbl');
    $ci->db->join('slider_tbl', 'slider_tbl.owner_id = portfolio_tbl.id');
    $ci->db->where('slider_tbl.owner_type','projects');
    $ci->db->where('portfolio_tbl.is_active','1');
    $ci->db->where('portfolio_tbl.is_delete','0');
    $ci->db->group_by('portfolio_tbl.id');
    $ci->db->order_by('slider_tbl.slide_order','ASC');
    $query = $ci->db->get();
    // echo $ci->db->last_query();
    // exit();
    foreach ($query->result_array() as $key => $value) {
        $data[$value['id']]  = $value;
    }
    return $data;
}
function getTeamMembers($id = false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_active", '1');
    if($id){
        $ci->db->where("id", $id);
    }
    $query = $ci->db->get('team_tbl');
    foreach ($query->result_array() as $key => $value) {
        if ($language =='English') {
            $remarks      = $value["remarks_en"];
        }
        else {
            $remarks      = $value["remarks_ar"];
        }
        $value['remarks']      = $remarks;
        $data[$value['id']]  = $value;
    }
    return $data;
}
function getFAQs($id = false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_active", '1');
    if($id){
        $ci->db->where("id", $id);
    }
    $query = $ci->db->get('faqs_tbl');
    foreach ($query->result_array() as $key => $value) {
        if ($language =='English') {
            $question      = $value["question_en"];
            $answer      = $value["answer_en"];
        }
        else {
            $question      = $value["question_ar"];
            $answer      = $value["answer_ar"];
        }
        $value['question']      = $question;
        $value['answer']      = $answer;
        $data[$value['id']]  = $value;
    }
    return $data;
}
function getAllMedias($id = false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_active", '1');
    if($id){
        $ci->db->where("id", $id);
    }
    $query = $ci->db->get('gallery_tbl');
    foreach ($query->result_array() as $key => $value) {
        if($language == 'English'){
            $short_desc = $value['short_desc_en'];
        }
        else{
            $short_desc = $value['short_desc_ar'];
        }
        $value['short_desc']  = $short_desc;
        $data[$value['id']] = $value;
    }
    return $data;
}
function getCategory($id = false,$type=false) {
    $ci =& get_instance();
    $language  = $ci->session->userdata('language');
    $direction = $ci->session->userdata('direction');
    $lng       = $ci->session->userdata('lng');

    $data = array();
    $ci->db->where("is_active", '1');
    $ci->db->where("is_active", '1');
    if($id){
        $ci->db->where("id", $id);
    }
    if($type){
        $ci->db->where("type", $type);
    }
    $query = $ci->db->get('categories_tbl');
    foreach ($query->result_array() as $key => $value) {
        if($language == 'English'){
            $title = $value['title_en'];
        }
        else{
            $title = $value['title_ar'];
        }
        $value['title']  = $title;
        $data[$value['id']] = $value;
    }
    return $data;
}