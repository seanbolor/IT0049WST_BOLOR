<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer | SwiftPOS</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('about') ?>">About</a>
        <a href="<?= base_url('customers') ?>">Customers</a>
        <a href="<?= base_url('users') ?>">Users</a>
    </nav>

    <main class="form-container">
        <h1>Edit Customer</h1>
        <p>Update the customer's information.</p>

        <form method="post"
              action="<?= site_url('customers/' . $customer['id']) ?>">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    value="<?= esc(old('full_name', $customer['full_name'])) ?>"
                >
                <div class="error">
                    <?= validation_show_error('full_name') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= esc(old('email', $customer['email'])) ?>"
                >
                <div class="error">
                    <?= validation_show_error('email') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>"
                >
                <div class="error">
                    <?= validation_show_error('phone') ?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit">Update Customer</button>
                <a href="<?= site_url('customers') ?>">Cancel</a>
            </div>
        </form>
    </main>
</body>
</html>