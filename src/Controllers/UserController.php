<?php 

    class UserController{

        private $modelAddUser;
        private $data = [

            'name' => '',
            'email' => '',
            'phone' => '',

        ];

        
        private $errors = ['name'=>'', 'email'=>'', 'phone'=>'',];

        public function connectModel($modelAddUser)
        {
            $this->modelAddUser = $modelAddUser;
        }

        public function getData(){
            return $this->data;
        }

        public function getErrors(){
            return $this->errors;
        }

        //SET
        public function setData($post){
          
            if(isset($post['submit'])){
                $this->data = [
                    'name' => $post['name'],
                    'email' => $post['email'],
                    'phone' => $post['phone'],
                ];
                if(empty($this->data['name'])){
                    $this->errors['name'] = "Name field is required*";
                }
                if(empty($this->data['email'])){
                    $this->errors['email'] = "Email field is required*";
                }elseif(!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)){
                    $this->errors['email'] = "Should be a valid email*";
                }
                if(empty($this->data['phone'])){
                    $this->errors['phone'] = "Phone field is required*";
                }elseif(!is_numeric($this->data['phone'])){
                    $this->errors['phone'] = "Should be a valid number*";
                }
                if(empty($this->errors)){
                    if($this->modelAddUser->insertUser($this->data)){
                        header('Location: users-db/src/');
                    }else{
                        echo 'Insert error';
                    }
                }
            }
        }    

      
    }

?>