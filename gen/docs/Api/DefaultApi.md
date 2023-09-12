# OpenAPI\Client\DefaultApi

All URIs are relative to http://0.0.0.0, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**apiHelloNameGet()**](DefaultApi.md#apiHelloNameGet) | **GET** /api/hello/{name} | Hello |


## `apiHelloNameGet()`

```php
apiHelloNameGet($name): \OpenAPI\Client\Model\ApiHelloNameGet200Response
```

Hello

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = 'name_example'; // string | name

try {
    $result = $apiInstance->apiHelloNameGet($name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->apiHelloNameGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **name** | **string**| name | |

### Return type

[**\OpenAPI\Client\Model\ApiHelloNameGet200Response**](../Model/ApiHelloNameGet200Response.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
