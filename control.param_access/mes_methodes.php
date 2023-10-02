<?php
    
    function deserialiser($post){
         
        $split_parameters = explode('&', $post);
        $split_complete=array();

        for($i = 0; $i < count($split_parameters); $i++) {
            $final_split = explode('=', $split_parameters[$i]);
            if(isset($final_split[1])){
            $split_complete[$final_split[0]] = $final_split[1];
            }
        }
        return $split_complete;


    }

      function deserialiserUrlComplet($post){
         
        $remove_http = str_replace('http://', '', $url);
        $split_url = explode('?', $remove_http);
        $get_page_name = explode('/', $split_url[0]);
        $page_name = $get_page_name[1];

        $split_parameters = explode('&', $split_url[1]);

        for($i = 0; $i < count($split_parameters); $i++) {
            $final_split = explode('=', $split_parameters[$i]);
            $split_complete[$final_split[0]] = $final_split[1];
        }
        return $split_complete;
  

    }
?>