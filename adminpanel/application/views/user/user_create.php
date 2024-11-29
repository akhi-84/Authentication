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
    <h3>Create Data</h3>
  </div>
  <div class="content">
    <?php echo anchor('','Back'); ?>
    <form action="<?=base_url('create')?>" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>First Name</td>
          <td><input type="text" name="fname" placeholder="Enter First Name"></td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td><input type="text" name="lname" placeholder="Enter Last Name"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="email" name="email" placeholder="Enter Email"></td>
        </tr>
        <tr>
          <td>password</td>
          <td><input type="password" name="password" placeholder="Enter password"></td>
        </tr>
        <tr>
          <td>Image</td>
          <td><input type="file" name="image"></td>
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

