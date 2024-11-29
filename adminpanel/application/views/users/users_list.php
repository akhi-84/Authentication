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
    <h3>User List</h3>
  </div>
  <div class="content">
    <p><?=$this->session->flashdata('msg') ?></p>
    <?php echo anchor('users-add','Add New User'); ?>
<table>
    <tr>
        <th>No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mobile No</th>
        <th>Images</th>
        <th>Action</th>
    </tr>
    <?php $no = 1; 
    foreach ($users as $user): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?=$user->fname?></td>
        <td><?=$user->lname?></td>
        <td><?=$user->email?></td>
        <td><?=$user->mobile?></td>
        <td>
            <?php
            $images = json_decode($user->images);
            if (!empty($images)) {
                foreach ($images as $image) {
                    echo '<img src="' . base_url('assets/upload/images/' . $image) . '" width="50" alt="User Image">';
                }
            }
            ?>
        </td>
        <td>
          <?php echo anchor('users/edit/'.$user->id,'Edit'); ?> 
          <?php echo anchor('users/delete/'.$user->id,'Delete'); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</body>
<?php $this->load->view('admin/_footer'); ?>
