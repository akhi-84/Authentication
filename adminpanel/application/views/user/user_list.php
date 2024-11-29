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
      text-align: center;
    }

    .content table,
    th,
    td {
      border: 1px solid black;
      margin: 6px auto;
    }

  </style>
</head>

<body>
  <div class="header">
    <h3>List Data </h3>
  </div>
  <div class="content">
    <p><?=$this->session->flashdata('msg') ?></p>
    <?php echo anchor('user-add','Add New User'); ?>
    <table>
      <tr>
        <th>No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
      <?php
      $no=1;
      foreach($users as $user) { ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$user->fname?></td>
        <td><?=$user->lname?></td>
        <td><?=$user->email?></td>
        <td><?=$user->password?></td>
        <td>
          <img src="<?=base_url()?>assets/upload/images/<?=$user->image?>" width="50px" alt="<?=$user->image?>">
        </td>
        <td>
          <?php echo anchor('user/edit/'.$user->id,'Update'); ?> 
          <?php echo anchor('user/delete/'.$user->id,'Delete'); ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>
<?php $this->load->view('admin/_footer'); ?>

