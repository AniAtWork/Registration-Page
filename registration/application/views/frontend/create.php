
<div class="container" style="max-width: 500px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" >
                        <h5>
                            Registration Form
                            <a href="<?php echo base_url('users'); ?>" class="btn btn-danger float-right">Back</a>
                        </h5>
                    </div>
                    <div class="card-body" >
                        <form action="<?php echo base_url('users/store') ?>" method="POST">
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                                <!-- <small><?php echo form_error('name'); ?></small> -->
                            </div>

                            <div class="form-group">
                                <label for="">Email ID</label>
                                <input type="email" name="email" id="email" class="form-control" 
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                    oninvalid="this.setCustomValidity('Email format : example@gmail.com')" 
                                    oninput="setCustomValidity('')" required>
                                <span id="email_result"></span>    <!-- new -->
                                <!-- <small><?php echo form_error('email', '<div class="error">', '</div>'); ?></small> -->
                                
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" pattern="^(?=.*[!@#$%^&*()_+={}\[\]|\\:;
                                    '<>,.?/])(?=.*\d).{8,}$" oninvalid="this.setCustomValidity('Password must be at least 8 characters long and contain at least one special character and one number.')" 
                                    class="form-control" oninput="setCustomValidity('')" required>
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm" id="confirm" class="form-control" oninput="checkPassword()" required > 
                                <small id="confirm_password_message"></small>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Mobile No. +91</label>
                                <input type="text" name="mobile" id="mobile" maxlength="10" 
                                    pattern="[6-9]{1}[0-9]{9}" 
                                    oninvalid="this.setCustomValidity('Phone number should start with 6,7,8 or 9 and have 10 digits overall')" 
                                    class="form-control" oninput="setCustomValidity('')" required>
                                    <span id="mobile_result"></span>
                                    <!-- <small><?php echo form_error('mobile', '<div class="error">', '</div>'); ?></small> -->
                            </div>

                            <!-- <div class="form-group">
                                <label for="">Gender</label>
                                <input type="text" name="gender" class="form-control" required>
                            </div> -->

                            <div class="form-group">
                                <p font-size=16px>Gender</p>
                                <label class="container">Female
                                <input type="radio" name="gender" value="Female" checked="checked">
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                <label class="container">Male
                                <input type="radio" name="gender" value="Male">
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                <label class="container">Do not wish to specify
                                <input type="radio" name="gender" value="Do not wish to specify">
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                
                            </div>

                            <!-- <div class="form-group">
                                <label for="">Hobbies</label>
                                <input type="text" name="hobbies" class="form-control">
                            </div> -->

                            

                            <div class="form-group">
                                <p font-size=16px>Hobbies</p>
                                <label class="container">Cricket
                                <input type="checkbox" name="hobbies[]" value="Cricket" >
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                <label class="container">Chess
                                <input type="checkbox" name="hobbies[]" value="Chess">
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                <label class="container">Swimming
                                <input type="checkbox" name="hobbies[]" value="Swimming">
                                <!-- <span class="checkmark"></span> -->
                                </label>
                                
                            </div>

                            <div class="form-group">
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Submit</button> <!--disabled-->

                            </div>
                            
                        </form>
                        
                    </div>
            </div>
        </div>
    </div>
</div>

