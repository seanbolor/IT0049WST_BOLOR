<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts | SwiftPOS</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('about') ?>">About</a>
        <a href="<?= base_url('customers') ?>">Customers</a>
        <a href="<?= base_url('users') ?>">Users</a>
    </nav>

    <h1>User Accounts</h1>
    <p>User records retrieved from the MySQL database.</p>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-message">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <div class="page-actions">
        <a class="primary-button" href="<?= site_url('users/new') ?>">
            + Add User
        </a>
    </div>

    <?php if (empty($users)): ?>
        <p>No user records found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                    <?php
                        $avatarName = ! empty($user['avatar'])
                            ? basename($user['avatar'])
                            : 'default-avatar.svg';

                        $avatarUrl = base_url('uploads/' . $avatarName);
                    ?>

                    <tr>
                        <td>
                            <img
                                class="avatar-image"
                                src="<?= esc($avatarUrl, 'attr') ?>"
                                alt="<?= esc($user['full_name'], 'attr') ?>"
                            >
                        </td>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><?= esc($user['created_at']) ?></td>
                        <td>
                            <a
                                class="edit-button"
                                href="<?= site_url('users/' . $user['id'] . '/edit') ?>"
                            >
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>