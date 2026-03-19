<?php
$clean_description = '';
$board_selector_html = '';
$project_owner = '';

if (! empty($description)) {
    $decoded_description = html_entity_decode($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    if (preg_match('/Project owner:\s*<strong>(.*?)<\/strong>/i', $decoded_description, $matches)) {
        $project_owner = trim(preg_replace('/\s+/', ' ', strip_tags($matches[1])));
    }

    if (preg_match('/<p>(.*?)<\/p>/is', $decoded_description, $matches)) {
        $clean_description = trim(preg_replace('/\s+/', ' ', strip_tags($matches[1])));
    } else {
        $clean_description = trim(preg_replace('/\s+/', ' ', strip_tags($decoded_description)));
        $clean_description = trim(preg_replace('/^Project owner:\s*\S+\s*/i', '', $clean_description));
    }
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

<?php
$user_notifications = trim($this->render('header/user_notifications'));
$creation_dropdown = trim($this->render('header/creation_dropdown'));
$user_dropdown = trim($this->render('header/user_dropdown'));
?>

<header class="gcg-header-shell">
    <div class="gcg-header-inner">
        <div class="gcg-header-copy">
            <p class="gcg-kicker">Autonomous Coding Cloud</p>
            <div class="title-container">
                <?= $_title ?>
            </div>
            <?php if ($project_owner !== ''): ?>
                <div class="gcg-header-meta">
                    <span class="gcg-header-meta-label">Project owner</span>
                    <span class="gcg-header-meta-value"><?= $this->text->e($project_owner) ?></span>
                </div>
            <?php endif ?>
            <?php if ($clean_description !== ''): ?>
                <p class="gcg-header-description"><?= $this->text->e($clean_description) ?></p>
            <?php endif ?>
        </div>

        <div class="gcg-header-tools<?= $board_selector_html === '' ? ' gcg-header-tools-compact' : '' ?>">
            <?php if ($board_selector_html !== '' && trim(strip_tags(html_entity_decode($board_selector_html, ENT_QUOTES | ENT_HTML5, 'UTF-8'))) !== ''): ?>
                <div class="board-selector-container">
                    <?= $board_selector_html ?>
                </div>
            <?php endif ?>
            <div class="menus-container">
                <?php if ($user_notifications !== ''): ?>
                    <div class="gcg-menu-slot gcg-menu-slot-notifications">
                        <?= $user_notifications ?>
                    </div>
                <?php endif ?>
                <?php if ($creation_dropdown !== ''): ?>
                    <div class="gcg-menu-slot gcg-menu-slot-create">
                        <?= $creation_dropdown ?>
                    </div>
                <?php endif ?>
                <?php if ($user_dropdown !== ''): ?>
                    <div class="gcg-menu-slot gcg-menu-slot-user">
                        <?= $user_dropdown ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</header>
