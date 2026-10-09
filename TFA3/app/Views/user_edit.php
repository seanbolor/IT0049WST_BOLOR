<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User | SwiftPOS</title>
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
        <h1>Edit User</h1>
        <p>Update account information and profile picture.</p>

        <form
            method="post"
            action="<?= site_url('users/' . $user['id']) ?>"
            enctype="multipart/form-data"
        >
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= esc(old('username', $user['username'])) ?>"
                >
                <div class="error">
                    <?= validation_show_error('username') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    value="<?= esc(old('full_name', $user['full_name'])) ?>"
                >
                <div class="error">
                    <?= validation_show_error('full_name') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="avatar">Profile Picture</label>
                <input
                    type="file"
                    id="avatar"
                    name="avatar"
                    accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                >
                <small>JPG or PNG only, maximum 2MB.</small>

                <div class="error">
                    <?= validation_show_error('avatar') ?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit">Update User</button>
                <a href="<?= site_url('users') ?>">Cancel</a>
            </div>
        </form>
    </main>
</body>
</html>