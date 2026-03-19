<?php $_title = $this->render('header/title', array(
    'project' => isset($project) ? $project : null,
    'task' => isset($task) ? $task : null,
    'description' => isset($description) ? $description : null,
    'title' => $title,
)) ?>

<?php $_top_right_corner = implode('&nbsp;', array(
    $this->render('header/user_notifications'),
    $this->render('header/creation_dropdown'),
    $this->render('header/user_dropdown')
)) ?>

<header class="gcg-header-shell">
    <div class="gcg-header-inner">
        <div class="gcg-header-copy">
            <p class="gcg-kicker">Autonomous Coding Cloud</p>
            <div class="title-container">
                <?= $_title ?>
            </div>
            <?php if (! empty($description)): ?>
                <p class="gcg-header-description"><?= $this->text->e($description) ?></p>
            <?php endif ?>
        </div>

        <div class="gcg-header-tools">
            <div class="board-selector-container">
                <?php if (! empty($board_selector)): ?>
                    <?= $this->render('header/board_selector', array('board_selector' => $board_selector)) ?>
                <?php endif ?>
            </div>
            <div class="menus-container">
                <?= $_top_right_corner ?>
            </div>
        </div>
    </div>
</header>
