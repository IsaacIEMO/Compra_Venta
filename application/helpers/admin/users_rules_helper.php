<?php
    function getUsersRules(){
        return array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es obligatorio',
                ),
            ),
            array(
                'field' => 'apellido',
                'label' => 'Apellido',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es obligatorio',
                ),
            ),
            array(
                'field' => 'user',
                'label' => 'Usuario',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es obligatorio',
                ),
            ),
            array(
                'field' => 'pass',
                'label' => 'Contraseña',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es obligatorio',
                ),
            ),
            array(
                'field' => 'password',
                'label' => 'Repetir Contraseña',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es obligatorio',
                ),
            )
        );
    }
?>