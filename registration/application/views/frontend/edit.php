<div class="container" style="max-width: 500px;" > <!-- float: left;" -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            User Editing Form
                            <a href="<?php echo base_url('users'); ?>" class="btn btn-danger float-right">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('users/update/'.$users->id) ?>" method="POST">
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" name="name" value="<?php echo $users->name ?>" class="form-control" required>
                                <!-- <small><?php echo form_error('name'); ?></small> -->
                            </div>

                            <div class="form-group">
                                <label for="">Email ID</label>
                                <input type="email" name="email" id="email" value="<?php echo $users->email ?>" 
                                    class="form-control" oninvalid="this.setCustomValidity('Email format : example@gmail.com')" 
                                    oninput="setCustomValidity('')"required>
                                <small><?php echo form_error('email', '<div class="error">', '</div>'); ?></small>
                                
                            </div>

                            <!-- <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" value="<?php echo $users->password ?>" 
                                    pattern="^(?=.*[!@#$%^&*()_+={}\[\]|\\:;'<>,.?/])(?=.*\d).{8,}$" 
                                    oninvalid="this.setCustomValidity('Password must be at least 8 characters long and contain at least one special character and one number.')"
                                    oninput="setCustomValidity('')" 
                                    class="form-control" required>
                                
                            </div>

                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm" id="confirm" oninput="checkPassword()"
                                    value="<?php echo $users->password ?>" class="form-control" required >
                                <small id="confirm_password_message"></small> 
                            
                            </div> -->
                            
                            <div class="form-group">
                                <label for="">Mobile No. +91</label>
                                <input type="text" name="mobile" id="mobile" value="<?php echo $users->mobile ?>" maxlength="10"
                                    pattern="[6-9]{1}[0-9]{9}"
                                    oninvalid="this.setCustomValidity('Phone number should start with 6,7,8 or 9 and have 10 digits overall')"
                                    oninput="setCustomValidity('')" class="form-control" required>
                                    <small><?php echo form_error('mobile', '<div class="error">', '</div>'); ?></small>

                            </div>

                            <!-- <div class="form-group">
                                <label for="">Gender</label>
                                <input type="text" name="gender" value="<?php echo $users->gender ?>" class="form-control" required>
                            </div> -->

                            <div class="form-group">
                                <?php  $gender =$users->gender; ?>
                                <p font-size=16px>Gender</p>
                                <label class="container">Female
                                <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked='checked'"; ?>>
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                <label class="container">Male
                                <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked='checked'"; ?>>
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                <label class="container">Do not wish to specify
                                <input type="radio" name="gender" value="Do not wish to specify" <?php if($gender=="Do not wish to specify") echo "checked='checked'"; ?>>
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                
                            </div>


                            <!-- <div class="form-group">
                                <label for="">Hobbies</label>
                                <input type="text" name="hobbies" value="<?php echo $users->hobbies ?>" class="form-control">
                            </div> -->

                            <div class="form-group">
                                <?php $hobbies = explode(',', $users->hobbies); ?>
                                <p font-size=16px>Hobbies</p>
                                <label class="container">Cricket
                                <input type="checkbox" name="hobbies[]" value="Cricket" <?php if(in_array("Cricket", $hobbies)) echo "checked='checked'"; ?>>
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                <label class="container">Chess
                                <input type="checkbox" name="hobbies[]" value="Chess" <?php if(in_array("Chess", $hobbies)) echo "checked='checked'"; ?>>
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                <label class="container">Swimming
                                <input type="checkbox" name="hobbies[]" value="Swimming" <?php if(in_array("Swimming", $hobbies)) echo "checked='checked'"; ?>>
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                
                            </div>

                             <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            
                        </form>
                        
                    </div>
            </div>
        </div>
    </div>
</div>
