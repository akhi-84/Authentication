<?php $this->load->view('admin/_header'); ?>
<?php $this->load->view('admin/_sidebar'); ?>
<head>
  <style>
    .header {
        margin-bottom: 100px;
      text-align: center;
      color:red;
    }

    .content {
      text-align: center
    }

    .content table {
      margin: 6px auto;
      text-align: left;
    }

  </style>
</head>

<body>
  <div class="header">
    <h3>Edit User</h3>
  </div>
  <div class="content">
    <?php echo anchor('','Back'); ?>
<form action="<?= base_url('users/update') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $user->id; ?>">

    <div>
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" value="<?php echo set_value('fname', $user->fname); ?>" required>
        <?php echo form_error('fname'); ?>
    </div>
    <br>

    <div>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" value="<?php echo set_value('lname', $user->lname); ?>" required>
        <?php echo form_error('lname'); ?>
    </div>
    <br>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo set_value('email', $user->email); ?>" required>
        <?php echo form_error('email'); ?>
    </div>
    <br>

    <div>
        <label for="mobile">Mobile Number</label>
        <input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile', $user->mobile); ?>" required>
        <?php echo form_error('mobile'); ?>
    </div>
    <br>

    <div>
        <label for="images">Upload New Images</label>
        <input type="file" name="images[]" id="images" multiple>
        <div>
            <?php if (!empty($user->images)) {
                $existing_images = json_decode($user->images, true);
                foreach ($existing_images as $image): ?>
                    <img src="<?php echo base_url('assets/upload/images/' . $image); ?>" alt="User Image" width="100">
                <?php endforeach; 
            } ?>
        </div>
    </div>

    <button type="submit">Submit</button>
</form>

</form>
</div>
</body>
<?php $this->load->view('admin/_footer'); ?>
