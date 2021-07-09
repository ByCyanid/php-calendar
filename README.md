# FullCalendar-BS4-PHP-MySQL-JSON

A drag & drop event calendar with data permanence.

![FullCalendar with data permanence](main.png)

## Purpose

MySQL/JSON integration with FullCalendar and event recurrence capabilities.

# Features

* **Repeating events (NEW!)**
    * Supports weekly recurrences
    * Supports regular, all-day, and multi-day events
    * Supports recurrence editing - deletion only
    * Available for JSON 
* Event scheduling
    * JSON scheduling added
* FC updated from v2.6.1 to v3.9.0
* BS3 to BS4 update
* Event title/description hover added
* Added description field

## Getting Started

MySQL

1. Copy files to localhost
2. Create a table in DB called *calendar*, and create the tables found in *calendar.sql*
3. Open *auth.php* and enter your DB credentials
4. Open *index.php* from browser

JSON

1. Copy files to localhost
2. Open *index-json.php* from browser

**Note:** If event editing not "sticking" on refresh, verify file permissions are sufficient. ``` ls -l ```

# Event Structure

JSON Object Event

```
[{"id":4,
  "rid":4,
  "eventType":"single event",
  "title":"Meeting",
  "description":"some text for meeting",
  "start":"2019-01-11 10:30:00",
  "end":"2019-01-11 12:30:00",
  "color":"#000"
}]
```

MySQL Event Schema

```
('id', 'title', 'description', 'color', 'start', 'end')
(5, 'Meeting', 'some text for meeting', '#000', '2019-01-11 10:30:00', '2019-01-11 12:30:00')
```



## Built With

* FC v3.9.0
* BS4
* PHP 5/7
* MySQL/JSON
* JavaScript/jQuery
* HTML/CSS

## Contributing

Submit a PR and I'll review. Look for untagged/unassigned issues to help with.

## Versioning

Version 1.2.0

