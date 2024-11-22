<?php

namespace cefiiproject\Core;

class Form {
    private $formElements;

    public function getFormElements(){
        return $this->formElements;
    }

    private function addAttributes(array $attributes):string {
        $att = "";

        foreach ($attributes as $attribute => $value) {
            $att.="$attribute=\"$value\"";
        }
        return $att;
    }
    //opening tag for form
    public function startForm(string $action="#", string $method = "POST", array $attributes = []):self{
        $this->formElements="<form action='$action' method='$method'";

        $this->formElements .=isset($attributes)?$this->addAttributes($attributes) . ">":">";
        return $this;
    }

    //function that adds a label
    public function addLabel(string $for, string $text, array $attributes =[]):self {
        //adds form elements
        $this->formElements.="<label for='$for'";
        $this->formElements.= isset($attributes) ? $this->addAttributes($attributes). ">" : ">";
        $this->formElements.="$text</label>";
        return $this;
    }


    public function addInput(string $type, string $name, array $attributes =[]):self {
        //adds form elements
        $this->formElements.="<input type='$type' name='$name'";
        $this->formElements.= isset($attributes) ? $this->addAttributes($attributes). ">" : ">";
        return $this;
    }


        //function that adds a text area
    public function addTextarea(string $name, string $text = '', array $attributes = []):self 
    {
        //adds textarea tag
        $this->formElements.="<textarea name='$name'";
        $this->formElements.= isset($attributes) ? $this->addAttributes($attributes). ">" : ">";
        $this->formElements.="$text</textarea>";
        return $this;
    }

        //adds a dropdown menu
        public function addSelect(string $name, array $options, array $attributes = []) : self {

            //adds select tag
            $this->formElements.="<select name='$name'";
            $this->formElements.= isset($attributes) ? $this->addAttributes($attributes). ">" : ">";
            
            //adds the list of options
            foreach ($options as $key => $value) {
                $this->formElements.="<option value='$key'>$value</option>";
            }
            $this->formElements.="</select>";
            return $this;
        }

        //closes the form tag
        public function endForm() : self {
            $this->formElements.="</form>";
            return $this;
        }
        //validates fields in form
        public static function validatePost(array $post, array $fields) : bool {
            foreach ($fields as $field) {
                if (empty($post[$field]) || !isset($post[$field])) {
                    return false;
                }
                return true;
            }            
        }
        //validates fields in files
        public static function validateFiles(array $files, array $fields) : bool {
            foreach ($fields as $field) {
                if (isset($files[$field]) && $files[$field]["error"]==0) {
                    return true;
                }
                return false;
            }   
        }
}

?>