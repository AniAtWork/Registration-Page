<?php
//echo "this should link with the view Users";
?>


    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php if($this->session->flashdata('status')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('status');?>
                        </div>
                        <?php endif; ?>
                        <h5>
                            User Registration Database
                            <a href="<?php echo base_url('users/add'); ?>" class="btn btn-primary float-right">Add User</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="usertable" class="table table-bordered"> <!-- id is new to create pages for table -->
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email ID</th>
                                    <!-- <th>Password</th> -->
                                    <th>Mobile No.</th>
                                    <th>Gender</th>
                                    <th>Hobbies</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $row)  : ?>
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <!-- <td><?php echo $row->password; ?></td> -->
                                    <td><?php echo $row->mobile; ?></td>
                                    <td><?php echo $row->gender; ?></td>
                                    <td><?php echo $row->hobbies; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('users/edit/'.$row->id) ?>" class="btn btn-success btn-sn">Edit</a>
                                    </td>
                                    <!-- made a better delete button <td>
                                         <a href="<?php echo base_url('users/delete/'.$row->id) ?>" class="btn btn-danger btn-sn">Delete</a>
                                    </td> -->
                                    <td>
                                        <button type="button" class= "btn btn-danger confirm-delete" value="<?= $row->id; ?>">Delete</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   