<?php
$gcg_normalize_title = static function ($title) {
    $title = trim((string) $title);
    return function_exists('mb_strtolower') ? mb_strtolower($title, 'UTF-8') : strtolower($title);
};

$gcg_terminal_titles = array('done', 'failed');
$gcg_active_titles = array('planning', 'coding', 'testing', 'deploy', 'work in progress');
$gcg_entry_titles = array('backlog', 'ready');
?>

<!-- task row -->
<tr class="board-swimlane board-swimlane-tasks-<?= $swimlane['id'] ?><?= $swimlane['task_limit'] && $swimlane['nb_tasks'] > $swimlane['task_limit'] ? ' board-task-list-limit' : '' ?>">
    <?php foreach ($swimlane['columns'] as $column): ?>
        <?php
        $gcg_title = $gcg_normalize_title($column['title']);
        $gcg_cell_classes = array('board-column-'.$column['id'], 'gcg-board-column-cell');

        if ($column['task_limit'] > 0 && $column['column_nb_open_tasks'] > $column['task_limit']) {
            $gcg_cell_classes[] = 'board-task-list-limit';
        }

        if (in_array($gcg_title, $gcg_terminal_titles, true)) {
            $gcg_cell_classes[] = 'gcg-column-terminal';
        } elseif (in_array($gcg_title, $gcg_active_titles, true)) {
            $gcg_cell_classes[] = 'gcg-column-active';
        } elseif (in_array($gcg_title, $gcg_entry_titles, true)) {
            $gcg_cell_classes[] = 'gcg-column-entry';
        } else {
            $gcg_cell_classes[] = 'gcg-column-neutral';
        }
        ?>
        <td class="<?= implode(' ', $gcg_cell_classes) ?>">

            <!-- tasks list -->
            <div
                class="board-task-list board-column-expanded <?= $this->projectRole->isSortableColumn($column['project_id'], $column['id']) ? 'sortable-column' : '' ?>"
                data-column-id="<?= $column['id'] ?>"
                data-swimlane-id="<?= $swimlane['id'] ?>"
                data-task-limit="<?= $column['task_limit'] ?>">

                <?php foreach ($column['tasks'] as $task): ?>
                    <?= $this->render($not_editable ? 'board/task_public' : 'board/task_private', array(
                        'project' => $project,
                        'task' => $task,
                        'board_highlight_period' => $board_highlight_period,
                        'not_editable' => $not_editable,
                    )) ?>
                <?php endforeach ?>
            </div>

            <!-- column in collapsed mode (rotated text) -->
            <div class="board-column-collapsed board-task-list sortable-column"
                data-column-id="<?= $column['id'] ?>"
                data-swimlane-id="<?= $swimlane['id'] ?>"
                data-task-limit="<?= $column['task_limit'] ?>">
                <div class="board-rotation-wrapper">
                    <div class="board-column-title board-rotation board-toggle-column-view" data-column-id="<?= $column['id'] ?>" title="<?= $this->text->e($column['title']) ?>">
                        <i class="fa fa-plus-square" title="<?= t('Show this column') ?>" role="button" aria-label="<?= t('Show this column') ?>"></i> <?= $this->text->e($column['title']) ?>
                    </div>
                </div>
            </div>
        </td>
    <?php endforeach ?>
</tr>
