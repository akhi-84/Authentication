<?php $this->load->view('admin/_header'); ?>
<?php $this->load->view('admin/_sidebar'); ?>
<head>
  <style>
    .header {
      text-align: center;
      color: #4A90E2;
      padding: 20px;
    }
    .content {
      margin: 30px auto;
      width: 80%;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #f7f9fc;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      margin-top: 20px;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
    }
    th {
      background-color: #4A90E2;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    img {
      border-radius: 5px;
    }
    .btn {
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      color: white;
      cursor: pointer;
      text-decoration: none;
      margin-right: 10px;
    }
    .btn-primary {
      background-color: #4A90E2;
    }
    .btn-primary:hover {
      background-color: #357ABD;
    }
    .btn-info {
      background-color: #17a2b8;
    }
    .btn-info:hover {
      background-color: #138496;
    }
    .btn-danger {
      background-color: #dc3545;
    }
    .btn-danger:hover {
      background-color: #c82333;
    }
    .no-data {
      text-align: center;
      color: #6c757d;
      font-weight: bold;
      padding: 20px;
    }
    .add-category-container {
      display: flex;
      justify-content: space-between; 
      align-items: center;
      margin-bottom: 10px;
    }
    .page-title {
      flex-grow: 1;
      text-align: center;
      font-size: 24px;
      color: #4A90E2;
      margin: 0;
    }
  </style>
</head>
<body>
  <div class="header"></div>
  <div class="content">
    <div class="add-category-container">
      <h2 class="page-title">Categories Management</h2>
      <a href="<?= base_url('admin/categories/add') ?>" class="btn btn-primary">Add</a>
    </div>
    <table>
      <thead>
        <tr>
          <th>Category Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="categoriesTableBody">
        <?php if (!empty($categories)): ?>
          <?php foreach ($categories as $category): ?>
            <tr data-id="<?= $category->id ?>">
              <td><?= htmlspecialchars($category->category_name) ?></td>
              <td><?= htmlspecialchars($category->description) ?></td>
              <td>
                <?php if ($category->image): ?>
                  <img src="<?= base_url('assets/upload/images/' . $category->image) ?>" width="100" alt="Category Image">
                <?php else: ?>
                  <span>No Image</span>
                <?php endif; ?>
              </td>
              <td>
                <a href="<?= base_url('admin/categories/edit/' . $category->id) ?>" class="btn btn-info btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm delete-category" data-id="<?= $category->id ?>">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="no-data">No categories found</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.delete-category').on('click', function(e) {
        e.preventDefault();
        const categoryId = $(this).data('id');
        if (confirm('Are you sure you want to delete this category?')) {
          $.ajax({
            url: '<?= base_url('admin/categories/delete/') ?>' + categoryId,
            type: 'POST',
            success: function(response) {
              $('tr[data-id="' + categoryId + '"]').remove();
              alert('Category deleted successfully!');
            },
            error: function() {
              alert('An error occurred while trying to delete the category.');
            }
          });
        }
      });
    });
  </script>
<?php $this->load->view('admin/_footer'); ?>




