<?php
# events_functions.php
# @Bybyscan 2024
function loadEvents($filePath = 'data/events.json') {
    if (!file_exists($filePath) {
        throw new Exception("Events file not found");
    }
    return json_decode(file_get_contents($filePath), true) ?? [];
}

function applyFilters($events, $filters) {
    return array_filter($events, function($event) use ($filters) {
        foreach ($filters as $key => $value) {
            if ($value === null || $value === '') continue;
            
            if (in_array($key, ['for_kids', 'is_free', 'has_food', 'has_alcohol', 'has_transfer'])) {
                if ($value && !$event[$key]) return false;
            } elseif ($key === 'start_date' && isset($event['date'])) {
                if (strtotime($event['date']) < strtotime($value)) return false;
            } elseif ($key === 'end_date' && isset($event['date'])) {
                if (strtotime($event['date']) > strtotime($value)) return false;
            } elseif (in_array($key, ['venue', 'theme'])) {
                if (stripos($event[$key], $value) === false) return false;
            } elseif (isset($event[$key])) {
                if ($event[$key] != $value) return false;
            }
        }
        return true;
    });
}

function displayEvent($event) {
    $html = "<div class='event-card'>";
    foreach ($event as $key => $value) {
        if ($key === 'description') continue;
        $html .= "<p><strong>" . ucfirst($key) . ":</strong> " 
               . (is_bool($value) ? ($value ? 'Да' : 'Нет') : htmlspecialchars($value))
               . "</p>";
    }
    $html .= "</div>";
    return $html;
}
?>
