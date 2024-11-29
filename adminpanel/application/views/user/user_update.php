
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
    <h3>Update Data</h3>
  </div>
  <div class="content">
    <?php echo anchor('','Back'); ?>
    <form action="<?=base_url('user/update')?>" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Fitst Name</td>
          <td><input type="text" name="fname" value="<?=$upload->fname?>"></td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td><input type="text" name="lname" value="<?=$upload->lname?>"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="email" name="email" value="<?=$upload->email?>"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" value="<?=$upload->password?>"></td>
        </tr>
        <tr>
          <td>Image</td>
          <td>
            <input type="file" name="image">
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <img src="<?=base_url()?>assets/upload/images/<?=$upload->image?>" width="160px" alt="<?=$upload->image?>">
          </td>
        </tr>
        <tr>
          <input type="hidden" name="id" value="<?=$upload->id?>">
          <td></td>
          <td><input type="submit" value="Submit"></td>
        </tr>
      </table>
    </form>
  </div>
</body>
<?php $this->load->view('admin/_footer'); ?>