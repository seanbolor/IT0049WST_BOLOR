<?= view('templates/header', ['title' => $title]) ?>

<section class="hero">
    <p class="eyebrow">Daily Dashboard</p>

    <h1>Tasks for Today</h1>

    <p class="subtitle">
        <?= esc(date('F j, Y', strtotime($today))) ?>
    </p>
</section>

<section class="content-section">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Today</p>
            <h2>Your Current Tasks</h2>
        </div>

        <span class="task-count">
            <?= count($tasks) ?> task<?= count($tasks) === 1 ? '' : 's' ?>
        </span>
    </div>

    <?php if (empty($tasks)): ?>
        <div class="empty-state">
            <h3>No tasks scheduled for today</h3>
            <p>You are all caught up.</p>
        </div>
    <?php else: ?>
        <div class="task-grid">
            <?php foreach ($tasks as $task): ?>
                <article class="task-card">
                    <div class="task-card-top">
                        <span class="task-id">
                            Task #<?= esc($task['id']) ?>
                        </span>

                        <span class="status status-<?= esc($task['status'], 'attr') ?>">
                            <?= esc(ucwords(str_replace('-', ' ', $task['status']))) ?>
                        </span>
                    </div>

                    <h3><?= esc($task['title']) ?></h3>

                    <p class="task-date">
                        Due today
                    </p>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?= view('templates/footer') ?>