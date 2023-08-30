 if (strpos($staff_number, '/') !== false) {
            //Contains the character   
            }else{
//Does not contain that character
                 redirect(base_url().'welcome/resetpassword?pesan=stffnumber');
            }
