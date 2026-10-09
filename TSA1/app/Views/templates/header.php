<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?> | DailyTask</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="navbar">
            <a class="brand" href="<?= base_url('/') ?>">
                DailyTask
            </a>

            <nav>
                <a href="<?= base_url('/') ?>">Today</a>
                <a href="<?= base_url('tasks') ?>">All Tasks</a>
                <a href="<?= base_url('profile') ?>">Profile</a>
                <a href="<?= base_url('about') ?>">About</a>
            </nav>
        </div>
    </header>

    <main class="page-container">