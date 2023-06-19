# Hangang API Wrapper

This is a PHP wrapper for the Hangang API, which provides information about the Hangang River and Nakdong River temperatures.

## Usage

### Installation

No installation is required for this wrapper. Simply include the `Hangang.php` file in your PHP project.

### Example

```php
<?php

require_once 'Hangang.php';

$hangang = new Hangang();
$hangang->request();
$info = $hangang->getInfo();

echo "Status: " . $info['STATUS'] . "\n";
echo "Message: " . $info['MSG'] . "\n";

if ($info['STATUS'] === "OK") {
    echo "Check UID: " . $info['Check_UID'] . "\n";
    echo "Hangang Temperature: " . $info['HANGANG']['TEMP'] . "\n";
    echo "Hangang Time: " . $info['HANGANG']['TIME'] . "\n";
    echo "Nakdong Temperature: " . $info['NAKDONG']['TEMP'] . "\n";
    echo "Nakdong Time: " . $info['NAKDONG']['TIME'] . "\n";
}
```
### API Response

The `getInfo()` method returns an array with the following structure:

- `STATUS`: The status of the API request. Possible values are "OK" or "ERR".
- `MSG`: A message indicating the result of the API request.
- `Check_UID`: The UID associated with the API response.
- `HANGANG`:
  - `TEMP`: The temperature of the Hangang River.
  - `TIME`: The time when the temperature was last updated for the Hangang River.
- `NAKDONG`:
  - `TEMP`: The temperature of the Nakdong River.
  - `TIME`: The time when the temperature was last updated for the Nakdong River.

### Dependencies

This wrapper has no external dependencies.

## License

This project is licensed under the MIT License
