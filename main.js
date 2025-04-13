// Оптимизированный JavaScript (js/main.js):
// @Bybyscan 2024
// Управление чекбоксами
function setupCheckboxes() {
    const checkboxes = {
        for_kids: document.querySelector('input[name="for_kids"]'),
        has_alcohol: document.querySelector('input[name="has_alcohol"]')
    };

    Object.entries(checkboxes).forEach(([name, checkbox]) => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                const other = name === 'for_kids' ? checkboxes.has_alcohol : checkboxes.for_kids;
                other.checked = false;
            }
        });
    });
}

// Инициализация datepicker
function initDatepickers() {
    const dateConfig = {
        dateFormat: 'dd-mm-yy',
        minDate: 0
    };

    $('#start_date').datepicker({
        ...dateConfig,
        onSelect: (date) => $('#end_date').datepicker('option', 'minDate', date)
    });

    $('#end_date').datepicker({
        ...dateConfig,
        onSelect: (date) => $('#start_date').datepicker('option', 'maxDate', date)
    });
}

// Валидация формы
function setupFormValidation() {
    document.getElementById('filters-form').addEventListener('submit', (e) => {
        const required = Array.from(document.querySelectorAll('[data-required]'));
        const invalid = required.filter(field => !field.value.trim());
        
        if (invalid.length) {
            e.preventDefault();
            invalid.forEach(field => field.classList.add('invalid'));
            alert('Заполните обязательные поля');
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    setupCheckboxes();
    initDatepickers();
    setupFormValidation();
});
