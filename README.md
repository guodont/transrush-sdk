#transrush-sdk
[![Build Status](https://travis-ci.org/guodont/transrush-sdk.svg?branch=master)](https://travis-ci.org/guodont/transrush-sdk)

转运四方 php sdk

work in [ebuy365](http://www.ebuy365.com) .

## Installation

Add the following line to your `composer.json` file:

    "guodont/transrush-sdk": "dev-master"

Then run `composer update` to get the package.

Or
    composer require guodont/transrush-sdk

## Usage

```php

        $transRush = new \TransRush\TransRush([
            'Token' => 'YOUR-TOKEN', // Please use your Token .
            'Env' => 'DEV', // Or PRO
            'Key' => 'YOUR-KEY',
        ]);

        // 创建预报单
        $transRush->preAlertService->createPreAlert(CreatePreAlert $createPreAlert, Array $params = array());

        // 删除预报单
        $transRush->preAlertService->deletePreAlert(DeletePreAlert $deletePreAlert, Array $params = array());

        // 查询仓库地址
        $transRush->wareHouseService->getWareHouse();

        // 验证webhook通知是否合法
        $transRush->transRushWebHookUtil->isValidWebHook(array $body);

```

## License

This software is licensed under the [MIT License](LICENSE).