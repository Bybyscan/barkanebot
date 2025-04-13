```markdown
# @Bybyscan 2024
# Система управления мероприятиями

MVP - Проект для поиска и фильтрации мероприятий с использованием PHP, JavaScript и JSON-хранилища.


## Основные возможности

- Фильтрация мероприятий по 15+ параметрам
- Взаимоблокирующиеся чекбоксы (например, "Для детей" и "Алкоголь")
- Валидация форм на клиенте
- Динамический интерфейс с jQuery UI Datepicker
- Хранение данных в JSON-формате
- Поиск мероприятий через GET-параметры
- Адаптивный дизайн

## Требования

- PHP 7.4+
- Веб-сервер (Apache/Nginx)
- JavaScript в браузере
- Доступ к файловой системе для записи

## Установка

1. Клонировать репозиторий:
```bash
git clone https://github.com/barkanebot.git
```

2. Настроить права доступа:
```bash
chmod 755 data/
chmod 644 data/events.json
```

3. Убедиться что существует файл данных:
```bash
mkdir -p data
touch data/events.json
```

## Запуск

1. Разместить проект в корне веб-сервера
2. Открыть в браузере:
```
http://localhost/path/to/project/index.php
```

## Структура проекта

```
.
├── data/                  # Хранение данных
│   ├── events.json        # Основная база мероприятий
│   └── getData.json       # Лог запросов
├── includes/              # PHP модули
│   ├── events_functions.php
│   └── header.php
├── js/                    # JavaScript
│   └── main.js
├── styles/                # Стили
│   └── main.css
├── index.php              # Главная страница
├── events.php             # Страница мероприятий
└── README.md
```

## Примеры использования

### Фильтрация через интерфейс
1. Открыть /events.php
2. Выбрать параметры:
   - Диапазон дат
   - Город
   - Тип мероприятия
3. Нажать "Применить фильтры"

### Прямые запросы через API
```bash
# Все мероприятия в Ялте
/eventsget.php?city=Ялта

# Бесплатные мероприятия с фуршетом
/eventsget.php?is_free=1&has_food=1

# Мероприятия для детей в Симферополе
/eventsget.php?for_kids=1&city=Симферополь
```

## Особенности реализации

1. **Взаимоблокирующиеся чекбоксы**
```javascript
checkboxes.for_kids.addEventListener('change', () => {
    if (checkboxes.for_kids.checked) {
        checkboxes.has_alcohol.checked = false;
    }
});
```

2. **Динамическая валидация дат**
```javascript
$("#start_date").datepicker({
    dateFormat: 'dd-mm-yy',
    onSelect: (date) => {
        $("#end_date").datepicker("option", "minDate", date);
    }
});
```

3. **Фильтрация на PHP**
```php
$filteredEvents = array_filter($events, function($event) use ($filters) {
    foreach ($filters as $key => $value) {
        // ... логика фильтрации ...
    }
    return true;
});
```

## Лицензия

MIT License. Смотри файл [LICENSE](LICENSE).

---


