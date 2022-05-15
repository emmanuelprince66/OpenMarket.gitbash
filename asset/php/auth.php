<?php 
require_once 'config.php';

class Auth extends Database {

     //Register new user..
     public function register ($name , $email ,$password,) {
      $sql = "INSERT INTO users(name , email , password) VALUES(:name , :email, :password)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["name"=>$name , "email"=>$email,"password"=> $password]);
      return true;
    }
       //check if user is already registered..
   public function user_exist($email)  {
    $sql = "SELECT email FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email'=> $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

    //Edit product of a user
    public function edit_note($id) {
      $sql = "SELECT * FROM postss WHERE id = :id ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id'=>$id]);
      
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $result;
    }

    //Edit product of a user
    public function edit_snote($id) {
      $sql = "SELECT * FROM skill WHERE id = :id ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id'=>$id]);
      
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $result;
    }

      //Update goods of a user
    public function update_note($id,$address,$pdesc,$phone,$title) {
      $sql = "UPDATE postss SET address= :address , pdesc = :pdesc , phone = :phone , 
      title = :title WHERE id = :id ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['address' => $address,'pdesc' => $pdesc,'phone' => $phone,'title'=> $title,'id'=> $id]);
      
      return true;
    }

      //Update skill of a user
      public function update_skill($id,$address,$info,$phone,$name) {
        $sql = "UPDATE skill SET address= :address , info = :info , phone = :phone , 
        name = :name
        WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['address' => $address,'info' => $info,'phone' => $phone,'name'=> $name,'id'=> $id]);
        
        
        return true;
      }
      //Update profile of current user
      public function update_profile($id) {
        $sql = "SELECT * from  users 
        WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=> $id]);
        
        
        return true;
      }

        //Delete goods of a user
    public function delete_note($id) {
      $sql = "DELETE FROM postss WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return true;
    }
        //Delete skill of a user
    public function delete_skill($id) {
      $sql = "DELETE FROM skill WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return true;
    }

  //login Existing  User
  public function login($email) {
    $sql = "SELECT email , password FROM users WHERE email = :email ";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
  }
   //current user in session
   public function currentUser($email) {
    $sql = " SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["email" => $email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $row;
  }

   //Reset Password  User Auth 
   public function reset_pass_auth($email , $token) {
    $sql = "SELECT id FROM users WHERE 
    email = :email AND token = :token AND token_expire > NOW() AND deleted != 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["email" => $email , "token" => $token]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;   
  }
  
  //update new password
  public function update_new_pass($pass , $email) {
    $sql = "UPDATE users SET token = '' , password = :pass WHERE email = :email AND deleted != 0 ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email' => $email , 'password' => $pass]);
    return true;
  }

    //forgot 
    public function forgot_Password ($token , $email) {
      $sql = "UPDATE users SET token = :token, token_expire = DATE_ADD(NOW() , INTERVAL 10 MINUTE ) WHERE email = :email";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['token'=>$token , 'email'=>$email]);

      return true;
    }


     //sellg
     public function sell_g($uid,$title,$pdesc,$photo,$address,$phone) {
        $sql = "INSERT INTO postss (uid,title,pdesc,photo,address,phone) VALUES (:uid, :title , :pdesc,:photo,:address,:phone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid , 'title'=> $title , 'pdesc' => $pdesc, 'photo' => $photo , 'address' => $address , 'phone' => $phone]);
        return true;

      }
     //sellk
     public function sell_k($sid,$name,$info,$photo2,$address,$phone) {
        $sql = "INSERT INTO skill (sid,name,info,photo2,address,phone) VALUES (:sid, :name , :info, :photo2,:address,:phone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['sid'=>$sid , 'name'=> $name , 'info' => $info, 'photo2' => $photo2 , 'address' => $address , 'phone' => $phone]);
        return true;

      }
   //get all goods created
    public function get() {
      $sql = "SELECT * FROM postss ORDER BY created_at ASC ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
      
    }
   //get all skills created
    public function get_s() {
      $sql = "SELECT * FROM skill ORDER BY created_at ASC ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
      
    }
   //current seller in postss session
    public function currentSeller($id) {
      $sql = "SELECT * FROM postss  WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
      
    }

   //current skill seller in session
    public function currentSkSeller($id) {
      $sql = "SELECT * FROM skill  WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
      
    }
    //get current user id
    public function currentUserId($id) {
      $sql = "SELECT id FROM users  WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
      
    }
    //set not available data frim database 
    public function det_id($id) {
      $sql = "UPDATE postss SET available = '1' WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute((['id' => $id]));
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }
    //set available data frim database 
    public function dett_id($id) {
      $sql = "UPDATE postss SET available = '0' WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute((['id' => $id]));
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }
 
}
?>