<h3>Provide the Required Information</h3>
<div id="form-block">
<form method="POST" action="processes/process.user.php?action=update">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" value="<?php echo $user->get_user_firstname($id);?>" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" value="<?php echo $user->get_user_lastname($id);?>" placeholder="Your last name..">

            <label for="access">Access Level</label>
            <select id="access" name="access">
              <option value="Admin" <?php if($user->get_user_access($id) == "Admin"){ echo "selected";};?>>Admin</option>
              <option value="Checker" <?php if($user->get_user_access($id) == "Checker"){ echo "selected";};?>>Checker</option>
            </select>

            <label for="nickname">Nick Name</label>
            <input type="text" id="nickname" class="input" name="nickname" placeholder="Your Nickname..">
        </div>
        <div id="form-block-half">
            <label for="status">Account Status</label>
            <select id="status" name="status" disabled>
              <option <?php if($user->get_user_status($id) == "0"){ echo "selected";};?>>Deactivated</option>
              <option <?php if($user->get_user_status($id) == "1"){ echo "selected";};?>>Active</option>
            </select>
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" disabled value="<?php echo $user->get_user_email($id);?>" placeholder="Your email..">
            
            
            <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
            <a href="#">Change Email</a> | 
            <a href="#">Change Password</a> | 
            <?php
            if($user->get_user_status($id) == "1"){
              ?>
                <a href="#">Disable Account</a>
              <?php
            }else{
            ?>
                <a href="#">Activate Account</a>
            <?php
            }
            ?>
            
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

        <div id="button-block">
            <input type="submit" value="Update">
            <a href="processes/process.user.php?action=delete&id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete User</a>
        </div>
</form>
</div>