<?php
use Bitrix\Main\EventManager;

// Вешаем обработчик событий
$eventManager = EventManager::getInstance();
$eventManager->addEventHandler(
    'iblock',
    'OnAfterIBlockElementAdd',
    ['CIBlockEventsHandler', 'OnAfterIBlockElementAdd']
);

class CIBlockEventsHandler {
    // Обработчик события
    public static function OnAfterIBlockElementAdd(&$arFields) {
        $arSelect = Array("ID", "NAME", "PROPERTY_USER_ID");
        $arFilter = Array("IBLOCK_CODE "=> "IBLOCK_TRANSACTIONS", 'ID' => $arFields['ID'], '%NAME' => 'Ручное пополнение');
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
        $Result = $res->fetch();

        // Получаем текущий баланс пользователя
        $userInfo = CUser::GetByID($Result['PROPERTY_USER_ID_VALUE'])->Fetch();
        $currentBalance = $userInfo['UF_BALANCE'];

        // Обновляем значение свойства UF_BALANCE
        $newBalance = $currentBalance + 100;

        // Обновляем баланс пользователя в одном запросе
        $user = new CUser;
        $userFields = array('UF_BALANCE' => $newBalance);
        $userUpdateResult = $user->Update($userInfo['ID'], $userFields);

        // Проверяем результат обновления
        if ($userUpdateResult) {
            // Логируем результат только при успешном обновлении
            $filename =   $_SERVER["DOCUMENT_ROOT"] .'/example1.log';
            $data = print_r($Result, true);
            file_put_contents($filename, $data);
        } else {
            // Логирование или другие действия в случае ошибки обновления
        }
    }
}

