<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading">
    <p class="eyebrow">Demo Account</p>
    <h1>User Profile</h1>
    <p>Information retrieved from the users table.</p>
</section>

<section class="content-section">
    <?php if ($user === null): ?>
        <div class="empty-state">
            <h3>No user found</h3>
            <p>The users table does not contain a demo record.</p>
        </div>
    <?php else: ?>
        <article class="profile-card">
            <div class="avatar">
                <?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?>
            </div>

            <div class="profile-details">
                <p class="eyebrow">System User</p>

                <h2><?= esc($user['full_name']) ?></h2>

                <dl>
                    <div>
                        <dt>Username</dt>
                        <dd><?= esc($user['username']) ?></dd>
                    </div>

                    <div>
                        <dt>Email</dt>
                        <dd><?= esc($user['email']) ?></dd>
                    </div>

                    <div>
                        <dt>Member Since</dt>
                        <dd>
                            <?= esc(date('F j, Y', strtotime($user['created_at']))) ?>
                        </dd>
                    </div>
                </dl>
            </div>
        </article>
    <?php endif; ?>
</section>

<?= view('templates/footer') ?>