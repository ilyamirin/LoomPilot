<?php
$clean_description = '';
$board_selector_html = '';

if (! empty($description)) {
    $decoded_description = html_entity_decode($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $clean_description = trim(preg_replace('/\s+/', ' ', strip_tags($decoded_description)));
    $clean_description = trim(preg_replace('/^Project owner:\s*\S+\s*/i', '', $clean_description));
}

if (! empty($board_selector)) {
    $board_selector_html = trim($this->render('header/board_selector', array('board_selector' => $board_selector)));
}

$_title = $this->render('header/title', array(
    'project' => isset($project) ? $project : null,
    'task' => isset($task) ? $task : null,
    'description' => null,
    'title' => $title,
));
?>

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
            <?php if ($clean_description !== ''): ?>
                <p class="gcg-header-description"><?= $this->text->e($clean_description) ?></p>
            <?php endif ?>
        </div>

        <div class="gcg-header-tools">
            <?php if ($board_selector_html !== '' && trim(strip_tags(html_entity_decode($board_selector_html, ENT_QUOTES | ENT_HTML5, 'UTF-8'))) !== ''): ?>
                <div class="board-selector-container">
                    <?= $board_selector_html ?>
                </div>
            <?php endif ?>
            <div class="menus-container">
                <?= $_top_right_corner ?>
            </div>
        </div>
    </div>
</header>
