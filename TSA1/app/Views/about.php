<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading">
    <p class="eyebrow">About the Project</p>
    <h1>Tasks for Today</h1>

    <p>
        A CodeIgniter 4 task-management application that separates today's
        tasks from the complete task schedule.
    </p>
</section>

<section class="content-section">
    <article class="about-card">
        <p class="eyebrow">Developer</p>

        <h2><?= esc($developer) ?></h2>

        <p>
            This system was developed for IT0049 Web System Technologies.
            It demonstrates MVC organization, CodeIgniter Models, Query
            Builder filtering, routing, reusable views, and MySQL integration.
        </p>
    </article>
</section>

<?= view('templates/footer') ?>