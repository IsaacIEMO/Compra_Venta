<?php
    function getCategoryRules(){
        return array(
            array(
                'field' => 'categoy',
                'label' => 'Categoria',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'La %s es obligatorio',
                ),
            )
        );
    }
?>