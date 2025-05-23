<?php
function getMenu($mode, $sort) {
    $active = fn($m) => $m === $mode ? 'style="color:red;"' : '';
    $html = '<div class="submenu">';
    $html .= "<a href='?mode=view' {$active('view')}>Просмотр</a>";
    $html .= "<a href='?mode=add' {$active('add')}>Добавление записи</a>";
    $html .= "<a href='?mode=edit' {$active('edit')}>Редактирование</a>";
    $html .= "<a href='?mode=delete' {$active('delete')}>Удаление</a>";
    $html .= '</div>';

    if ($mode === 'view') {
        $activeSort = fn($s) => $s === $sort ? 'style="color:red;"' : '';
        $html .= '<div class="submenu">';
        $html .= "<a href='?mode=view&sort=added' {$activeSort('added')}>По добавлению</a>";
        $html .= "<a href='?mode=view&sort=surname' {$activeSort('surname')}>По фамилии</a>";
        $html .= "<a href='?mode=view&sort=birthday' {$activeSort('birthday')}>По дате рождения</a>";
        $html .= '</div>';
    }

    return $html;
}