<?php $this->load->view('admin/_header'); ?>
<?php $this->load->view('admin/_sidebar'); ?>
<head>
  <style>
    .header {
      text-align: center;
      background-color: #4A90E2; 
      padding: 20px;
      color: white;
    }
    .container {
      background-color: #f7f9fc;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
    }
    .form-control {
      border: 2px solid #4A90E2;
      border-radius: 8px;
      margin-top: 10px;
    } 
    .btn-primary {
      background-color: #4A90E2; /* Set a background color */
      border: none;
      padding: 10px;
    }
    .btn-primary:hover {
      background-color: #218838;
    }
    .btn-secondary {
      background-color: #6c757d; 
      border: none;
      padding: 10px;
    }
    .btn-secondary:hover {
      background-color: #5a6268;
    }
    .content {
      text-align: center;
    }
    #responseMessage {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Edit Category</h2>
  </div>
  <div class="container">
    <div class="content">
      <form id="editCategoryForm" 
            action="<?= base_url('admin/categories/update_category/' . $category->id) ?>" 
            method="post" 
            enctype="multipart/form-data">
        <div class="form-group">
          <label for="category_name">Category Name</label>
          <input type="text" class="form-control" name="category_name" value="<?= htmlspecialchars($category->category_name) ?>" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" rows="4" required><?= htmlspecialchars($category->description) ?></textarea>
        </div>
        <div class="form-group">
  <label for="current_image">Current Image</label>
  <?php if (!empty($category->image)): ?>
    <div class="mb-3">
      <img src="<?= base_url('assets/upload/images/' . $category->image) ?>" 
           alt="Category Image" 
           style="max-width: 150px; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    </div>
  <?php else: ?>
    <p>No image available.</p>
  <?php endif; ?>
</div>

<div class="form-group">
  <label for="image">Upload New Image</label>
  <input type="file" class="form-control" name="image">
</div>

        <button type="submit" class="btn btn-primary mt-3">Update Category</button>
        <a href="<?= base_url('admin/categories/list') ?>" class="btn btn-secondary mt-3">Back</a>
      </form>
      <div id="responseMessage" class="mt-3"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#editCategoryForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: $(this).attr('action'),
          type: 'POST',
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function (response) {
            const result = JSON.parse(response);
            $('#responseMessage').empty();
            if (result.error) {
              $('#responseMessage').html('<div class="alert alert-danger">' + result.error + '</div>');
            } else {
              $('#responseMessage').html('<div class="alert alert-success">Category updated successfully!</div>');
            }
          },
          error: function () {
            $('#responseMessage').html('<div class="alert alert-danger">Error occurred while updating category!</div>');
          }
        });
      });
    });
  </script>
</body>
<?php $this->load->view('admin/_footer'); ?>




