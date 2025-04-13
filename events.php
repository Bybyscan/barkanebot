# events.php
# @Bybyscan 2024
<?php
require_once 'includes/events_functions.php';

try {
    $events = loadEvents();
    $filters = array_filter($_GET, fn($v) => $v !== '');
    $filteredEvents = applyFilters($events, $filters);
} catch (Exception $e) {
    $error = $e->getMessage();
}

$title = "Результаты поиска";
include 'includes/header.php';
?>

<?php if (!empty($error)): ?>
    <div class="alert error"><?= $error ?></div>
<?php endif; ?>

<?php if (!empty($filteredEvents)): ?>
    <div class="events-list">
        <?php foreach ($filteredEvents as $event): ?>
            <?= displayEvent($event) ?>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p class="no-results">Мероприятий не найдено</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
