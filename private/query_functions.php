<?php

function find_all_contents() {
    global $db;
    
    $sql = "SELECT * FROM content ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  
function find_content_by_id($id) { 
    global $db;
    
    
    
    $sql = "SELECT * FROM content ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $content = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $content; // returns assoc array;
}

function count_all_content() {
    global $db;
    
    $sql = "SELECT COUNT(id) FROM content";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function count_visible_content() {
    global $db;
    
    $sql = "SELECT COUNT(id) FROM content WHERE visible = 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }


//////Projects Queries

function find_all_projects() {
    global $db;
    
    $sql = "SELECT * FROM projects ";
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_all_visible_projects() {
    global $db;
    
    $sql = "SELECT * FROM projects WHERE visible = 1 ";
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

function count_all_projects() {
    global $db;
    
    $sql = "SELECT COUNT(id) FROM projects";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function count_visible_projects() {
    global $db;
    
    $sql = "SELECT COUNT(id) FROM projects WHERE visible = 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  
  
  function find_project_by_id($id) { 
    global $db;
    
    
    
    $sql = "SELECT * FROM projects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $project = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $project; // returns assoc array;
}

function validate_subject($subject) {

  $errors = [];
  
  // menu_name
  if(is_blank($subject['menu_name'])) {
    $errors[] = "Name cannot be blank.";
  } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }

  // position
  // Make sure we are working with an integer
  $postion_int = (int) $subject['position'];
  if($postion_int <= 0) {
    $errors[] = "Position must be greater than zero.";
  }
  if($postion_int > 999) {
    $errors[] = "Position must be less than 999.";
  }

  // visible
  // Make sure we are working with a string
  $visible_str = (string) $subject['visible'];
  if(!has_inclusion_of($visible_str, ["0","1"])) {
    $errors[] = "Visible must be true or false.";
  }

  return $errors;
}


function insert_project($project) {
    global $db;
    
    

    $sql = "INSERT INTO projects ";
    $sql .= "(project_name, position, technology, description, github_front, github_back, live_url, image_url, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $project['project_name']) . "',";
    $sql .= "'" . db_escape($db, $project['position']) . "',";
    $sql .= "'" . db_escape($db, $project['technology']) . "',";
    $sql .= "'" . db_escape($db, $project['description']) . "',";
    $sql .= "'" . db_escape($db, $project['github_front']) . "',";
    $sql .= "'" . db_escape($db, $project['github_back']) . "',";
    $sql .= "'" . db_escape($db, $project['live_url']) . "',";
    $sql .= "'" . db_escape($db, $project['image_url']) . "', ";
    $sql .= "'" . db_escape($db, $project['visible']) . "' ";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_project($project) {
    global $db;
    

    
    $sql = "UPDATE projects SET ";
    $sql .= "project_name='" . db_escape($db, $project['project_name']) . "', ";
    $sql .= "position='" . db_escape($db, $project['position']) . "', ";
    $sql .= "technology='" . db_escape($db, $project['technology']) . "', ";
    $sql .= "description='" . db_escape($db, $project['description']) . "', ";
    $sql .= "github_front='" . db_escape($db, $project['github_front']) . "', ";
    $sql .= "github_back='" . db_escape($db, $project['github_back']) . "', ";
    $sql .= "live_url='" . db_escape($db, $project['live_url']) . "', ";
    $sql .= "image_url='" . db_escape($db, $project['image_url']) . "', ";
    $sql .= "visible='" . db_escape($db, $project['visible']) . "' ";








    $sql .= "WHERE id='" . db_escape($db, $project['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        //update failed
        echo mysqli_error($db);
          db_disconnect($db);
          exit;
    }
} 


function update_content($content) {
    global $db;
    

    
    $sql = "UPDATE content SET ";
    $sql .= "content='" . db_escape($db, $content['content']) . "', ";
    $sql .= "visible='" . db_escape($db, $content['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $content['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        //update failed
        echo mysqli_error($db);
          db_disconnect($db);
          exit;
    }
}



function delete_project($id) {
    global $db;

    
    
    
    $sql = "DELETE FROM projects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    
    $result = mysqli_query($db, $sql);
    
    if($result) {
        return true;
    } else {
        //Delete failed
        echo mysqli_error($db);
          db_disconnect($db);
          exit;
    }
}


  
 



function find_content_by_location($location) {
      
    global $db;
    $sql = "SELECT * ";
    $sql .= "FROM pages ";
    $sql .= "WHERE location='" . db_escape($db, $location) . "'";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $content = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $content; // returns assoc array;
}

function find_pages_by_subject($id) {
      
    global $db;
    $sql = "SELECT *";
    $sql .= "FROM pages ";
    $sql .= "WHERE subject_id='" . db_escape($db, $id) . "'";

    $results = mysqli_query($db, $sql);
    confirm_result_set($results);
    $pages = mysqli_fetch_assoc($results);
    mysqli_free_result($results);
    return $pages; // returns assoc array;
}


function find_pages_by_subject_id($subject_id, $options=[]) {
      
    global $db;
    
    $visible = $options['visible'] ?? false;
    
    $sql = "SELECT *";
    $sql .= "FROM pages ";
    $sql .= "WHERE subject_id='" . db_escape($db, $subject_id) . "' ";
    if($visible) {
        $sql .= "AND visible = true ";
    }
    $sql .= "ORDER BY position ASC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    return $result; 
}


  
 
 
function validate_page_update($page) {
  global $db;  

  $errors = [];
  
  // menu_name
  if(is_blank($page['menu_name'])) {
    $errors[] = "Name cannot be blank.";
  } elseif(!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  } 
  
  
 
  

  // position
  // Make sure we are working with an integer
  $postion_int = (int) $page['position'];
  if($postion_int <= 0) {
    $errors[] = "Position must be greater than zero.";
  }
  if($postion_int > 999) {
    $errors[] = "Position must be less than 999.";
  }

  // visible
  // Make sure we are working with a string
  $visible_str = (string) $page['visible'];
  if(!has_inclusion_of($visible_str, ["0","1"])) {
    $errors[] = "Visible must be true or false.";
  }
  
  // Checks content length
  if(!has_length($page['content'], ['min' => 0, 'max' => 60000])) {
    $errors[] = "Name must be less than 60,000 characters.";
  } 
  
  

  return $errors;
}
  
 

function delete_page($id) {
    global $db;
    
    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    
    $result = mysqli_query($db, $sql);
    
    if($result) {
        return true;
    } else {
        //Delete failed
        echo mysqli_error($db);
          db_disconnect($db);
          exit;
    }
}

/////////////////////////////////
///// Admin Functions
/////////////////////////////////

function find_all_admins() {
    global $db;
    
    
    $sql = "SELECT * FROM admins ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  
function find_admin_by_id($id) { 
    global $db;
    
    
    
    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin; // returns assoc array;
}

function find_admin_by_username($username) {
      
    global $db;
    $sql = "SELECT *";
    $sql .= "FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin; // returns assoc array;
}

function insert_admin($admin) {
    global $db;
    
    $errors = validate_admin($admin);
    if(!empty($errors)) {
        return $errors;
    }
    
    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['email']) . "',";
    $sql .= "'" . db_escape($db, $admin['username']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  
function update_admin($admin) {
    global $db;
    
    $errors = validate_admin_update($admin);
    if(!empty($errors)) {
        return $errors;
    }
    
   
    
    $sql = "UPDATE admins SET ";
    $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
    $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
    //$sql .= "hashed_password='" . db_escape($db, $admin['hashed_password']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        //update failed
        echo mysqli_error($db);
          db_disconnect($db);
          exit;
    }
}  

function delete_admin($id) {
    global $db;
    
    $sql = "DELETE FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    
    $result = mysqli_query($db, $sql);
    
    if($result) {
        return true;
    } else {
        //Delete failed
        echo mysqli_error($db);
          db_disconnect($db);
          exit;
    }
}

function validate_admin($admin) {
  global $db;  

  $errors = [];
  
  // menu_name
  if(is_blank($admin['first_name'])) {
    $errors[] = "First name cannot be blank.";
  } elseif(!has_length($admin['first_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "First name must be between 2 and 255 characters.";
  } 
  
  if(is_blank($admin['last_name'])) {
    $errors[] = "Last name cannot be blank.";
  } elseif(!has_length($admin['last_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Last name must be between 2 and 255 characters.";
  } 
  
  if(is_blank($admin['email'])) {
    $errors[] = "Email cannot be blank.";
  } elseif(!has_length($admin['email'], ['min' => 2, 'max' => 255])) {
    $errors[] = "email name must be between 2 and 255 characters.";
  } 
  
  if(!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must have valid email format.";
  }
  
  if(is_blank($admin['username'])) {
    $errors[] = "Username cannot be blank.";
  } elseif(!has_length($admin['username'], ['min' => 8, 'max' => 255])) {
    $errors[] = "username must be between 8 and 255 characters.";
  } 
  
  if(!has_unique_username($admin['username'])) {
      $errors[] = "An admin already exists with this username.";
  }
  
  if(is_blank($admin['password'])) {
    $errors[] = "Password cannot be blank.";
  } elseif(!has_length($admin['password'], ['min' => 12, 'max' => 255])) {
    $errors[] = "Password must be between 12 and 255 characters.";
  } 
  
  if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $admin['password'])){
$errors[] = "Password must contain at least one number, one lowercare character, one uppercase character, and one special character ( [*.!@#$%^&(){}[]:;<>,.?/~_+-=|\] ).";
}
  
if($admin['password'] !== $admin['confirm_password'] ) {
    $errors[] ="Please make sure your passwords match."; 
}
  
  
  
  

  return $errors;
}

function validate_admin_update($admin) {
  global $db;  

  $errors = [];
  
  // menu_name
  if(is_blank($admin['first_name'])) {
    $errors[] = "First name cannot be blank.";
  } elseif(!has_length($admin['first_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "First name must be between 2 and 255 characters.";
  } 
  
  if(is_blank($admin['last_name'])) {
    $errors[] = "Last name cannot be blank.";
  } elseif(!has_length($admin['last_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Last name must be between 2 and 255 characters.";
  } 
  
  if(is_blank($admin['email'])) {
    $errors[] = "Email cannot be blank.";
  } elseif(!has_length($admin['email'], ['min' => 2, 'max' => 255])) {
    $errors[] = "email name must be between 2 and 255 characters.";
  } 
  
  if(!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must have valid email format.";
  }
  
  if(is_blank($admin['username'])) {
    $errors[] = "Username cannot be blank.";
  } elseif(!has_length($admin['username'], ['min' => 8, 'max' => 255])) {
    $errors[] = "username must be between 8 and 255 characters.";
  } 
  
  if(!has_unique_username($admin['username'])) {
      $errors[] = "An admin already exists with this username.";
  }
  
   
  
  
  
  

  return $errors;
}


function update_admin_password($admin) {
    global $db;
    
    $errors = validate_admin_password_change($admin);
    if(!empty($errors)) {
        return $errors;
    }
    
   $hashed_password = password_hash($admin['new_password'], PASSWORD_BCRYPT);
    
    $sql = "UPDATE admins SET ";
    $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        //update failed
        echo mysqli_error($db);
          db_disconnect($db);
          exit;
    }
}  

function validate_admin_password_change($admin) {
    
    global $db;  

  $errors = [];
    
    $account = find_admin_by_id($admin['id']);
    $old_pass = $account['hashed_password'];
    
    
    if (!password_verify($admin['current_password'], $old_pass)) {
        $errors[] = 'Your current password is incorrect' . ' ' . $admin['current_password'];
    }
      if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $admin['new_password'])){
$errors[] = "Password must contain at least one number, one lowercare character, one uppercase character, and one special character ( [*.!@#$%^&(){}[]:;<>,.?/~_+-=|\] ).";
}
  
if($admin['new_password'] !== $admin['confirm_password'] ) {
    $errors[] ="Please make sure your passwords match." ; 
}
    
    return $errors;
}

?>
