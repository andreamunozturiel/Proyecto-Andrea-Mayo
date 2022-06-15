<?php

spl_autoload_register(
    function ($class_name) {
        // Explode class name.
        $array = explode('\\', $class_name);    
        // Implode new class name.
        $new_class_name = implode(DIRECTORY_SEPARATOR, $array);    
        // Generate file path for new class name.
        $filepath =  str_replace(
            array('/', '\\'), 
            DIRECTORY_SEPARATOR, 
            __DIR__ . '\\' . $new_class_name . '.php');
        // Include filepath.
        if (file_exists($filepath)) {
            require $filepath;
        } else {
            $s  = '<p>';
            $s .= '<strong>AUTOLOAD ERROR</strong><br/>';
            $s .= 'No se puede cargar la clase "'.$class_name.'" ';
            $s .= ' ya que no se ha podido encontrar el fichero "' . $filepath . '".<br/>';
            $s .= '</p>';
            throw new \Exception($s);
        }
    }
);


?>