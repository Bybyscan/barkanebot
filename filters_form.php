# filters_form.php
# @Bybyscan 2024
<form action="events.php" method="get" id="filters-form">
    <div class="date-range">
        <input type="text" id="start_date" name="start_date" placeholder="Дата начала">
        <input type="text" id="end_date" name="end_date" placeholder="Дата окончания">
    </div>
    
    <div class="form-group">
        <label for="city">Город:</label>
        <select name="city" id="city"><?php include 'options/cities.php'; ?></select>
    </div>
    
    <!-- Остальные поля фильтров -->
    
    <div class="checkboxes">
        <?php include 'includes/checkboxes.php'; ?>
    </div>
    
    <button type="submit">Применить фильтры</button>
</form>
