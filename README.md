Тестовое задание для PHP-программиста
Задание:
1.1. Обработчик событий
Написать обработчик событий для файла init.php. который по добавлению элемента в инфоблоке (ИБ) с символьным кодом IBLOCK_TRANSACTIONS и названием с вхождением подстроки “Ручное пополнение”, начисляет +100 к значению свойства у пользователя UF_BALANCE.

1.2. Реорганизация функций
	Есть набор функций, которые нужно реорганизовать в пользовательский класс, расширяющий функционал CUser. Функции не несут смысловой нагрузки и функционала, поэтому тело функций можно оставить пустым. 

Исходные функции:
function authenticateUser($login, $password) { /* ... */ }
function registerUser($userData) { /* ... */ }
function changeUserPassword($userId, $newPassword) { /* ... */ }
function getUserInfo($userId) { /* ... */ }

Указанные функции должны быть инкапсулированы в пользовательский класс. расширяющий функционал класса CUser. Также требуется показать пример создания экземпляра класса и вызова одной из указанных функций. 

1.3. Написание SQL-запроса

	Дано 2 таблицы: google_ads_logs и b_user из которых требуется вывести следующее: 
Временную метку (дату d-m-y)
Логин пользователя
Название метода
Количество обращений к данному методу в указанный день

Структура таблицы b_user 


ID
LOGIN
INT
CHAR


Структура таблицы google_ads_logs 


ID
DATE
USER_ID
METHOD
INT
DATE
INT
CHAR


USER_ID в таблице google_ads_logs  соответствует ID в b_user 

Достаточно написать запрос к БД на чистом SQL, без обертывания в синтаксис PHP.
Оформление результатов:
	Результат можно оформить либо в виде архива с файлами, либо в виде репозитория на Github.
Сроки выполнения:
	Прогнозное время выполнения тестового задания: Ограничений нет, но ожидается фидбек по таймингам на каждую задачу.
Критерии оценки:
Чистота и читаемость кода.
Использование функций API Битрикс (для 1.1)
Следование принципам ООП (для 1.2)
Рациональный подход к написанию SQL-запроса (1.3)
