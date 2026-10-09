<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading">
    <p class="eyebrow">Complete Schedule</p>
    <h1>All Tasks</h1>
    <p>Every task stored in the management system.</p>
</section>

<section class="content-section">
    <?php if (empty($tasks)): ?>
        <div class="empty-state">
            <h3>No tasks found</h3>
            <p>Add task records to the database to display them here.</p>
        </div>
    <?php else: ?>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Task Date</th>
                        <th>Created At</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['id']) ?></td>

                            <td class="task-title">
                                <?= esc($task['title']) ?>
                            </td>

                            <td>
                                <span class="status status-<?= esc($task['status'], 'attr') ?>">
                                    <?= esc(ucwords(str_replace('-', ' ', $task['status']))) ?>
                                </span>
                            </td>

                            <td>
                                <?= esc(date('M j, Y', strtotime($task['task_date']))) ?>
                            </td>

                            <td>
                                <?= esc(date('M j, Y g:i A', strtotime($task['created_at']))) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>

<?= view('templates/footer') ?>