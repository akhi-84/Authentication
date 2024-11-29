<?php $this->load->view('admin/_header'); ?>
<?php $this->load->view('admin/_sidebar'); ?>

<div>
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
    <h3>Add New User</h3>
  </div>
  <div class="content">
    <?php echo anchor('','Back'); ?>
    <form action="<?= base_url('users/create') ?>" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>First Name</td>
         <td><input type="text" name="fname" id="fname" value="<?php echo set_value('fname'); ?>" required></td>
        <?php echo form_error('fname'); ?>
        </tr>
        <tr>
          <td>Last Name</td>
          <td><input type="text" name="lname" id="lname" value="<?php echo set_value('lname'); ?>" required></td>
          <?php echo form_error('lname'); ?>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" required></td>
        <?php echo form_error('email'); ?>
        </tr>
        <tr>
          <td>Mobile No</td>
          <td><input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile'); ?>" required></td>
        <?php echo form_error('mobile'); ?>
        </tr>
        <tr>
          <td>Image</td>
          <td><input type="file" name="images[]" multiple></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Submit"></td>
        </tr>
      </table>
    </form>
  </div>
</body>
</div>
<?php $this->load->view('admin/_footer'); ?>
