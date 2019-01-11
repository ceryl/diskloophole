<?php

class Formr{

    public function input_text($data,$label='',$value='',$id='',$string='',$inline='') {

        if(!is_array($data)) {
            $data = array(
                'type'		=> 'text',
                'name'		=> $data,
                'id'		=> $id,
                'value'		=> $value,
                'string'	=> $string,
                'label'		=> $label,
                'inline'	=> $inline
            );
        } else {
            $data['type'] = 'text';
        }
        return  $data;
    }

    protected function _create_input($data){
        $return = '<input';
    }

}