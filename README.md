## Hangang API Wrapper

### Introduction

This repository contains a simple PHP class for fetching and processing data from the Hangang API. The `Hangang` class provides methods to request data from the API, parse the response, and retrieve specific information about the Hangang.

### Features

- Uses the `file_get_contents` function to fetch data from the Hangang API.
- Decodes the JSON response and provides a method to extract relevant information.
- Ensures that the data fetched from the API is in the expected format before processing.

### Usage

1. **Initialization**
   
   First, instantiate the `Hangang` class.
   
   ```php
   $hangang = new Hangang();
   ```

2. **Request Data**
   
   Use the `request` method to fetch data from the Hangang API.
   
   ```php
   $hangang->request();
   ```

3. **Retrieve Information**
   
   The `getInfo` method can be used to get parsed data from the Hangang API. This method returns an associative array containing the status, a message, cache metadata, and detailed data for different locations in Hangang.
   
   ```php
   $info = $hangang->getInfo();
   print_r($info);
   ```

### Error Handling

The `getInfo` method ensures that the fetched data is in the expected format. If there's an issue with the API response, the method returns an error status and an error message.

### License

This project is licensed under the MIT License
