<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Accounts | SwiftPOS</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('about') ?>">About</a>
        <a href="<?= base_url('customers') ?>">Customers</a>
        <a href="<?= base_url('users') ?>">Users</a>
    </nav>

    <h1>Customer Accounts</h1>

    <p>Customer records retrieved from the MySQL database.</p>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="success-message">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>

<div class="page-actions">
    <a class="primary-button" href="<?= site_url('customers/new') ?>">
        + Add Customer
    </a>
</div>

    <?php if (empty($customers)): ?>
        <p>No customer records found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['id']) ?></td>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone'] ?? '') ?></td>
                        <td><?= esc($customer['created_at']) ?></td>
<td>
    <a
        class="edit-button"
        href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>"
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