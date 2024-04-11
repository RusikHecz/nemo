1) Скачайте проект
2) скачайте докер
3) docker-compose up --build -d в терминале, путь должен быть нахождение проекта с докером файлом
4) composer install
5) php artisan l5-swagger:generate в терминал для генерации openApi, путь: {host}/api/documentation#/
6) done

Описание проблемы
Необходимо разработать сервис автокомплита для поиска аэропортов по части названия. Исходные данные представлены в виде JSON-файла, расположенного по адресу https://github.com/NemoTravel/nemo.travel.geodata/blob/master/airports.json.

Требования к сервису:

<p>●	Сервис должен предоставлять как минимум один метод — поиск аэропортов по части названия.</p>
<p>●	Сервис должен быть готов к работе в условиях высокой нагрузки.</p>
<p>●	Протокол API может быть любым - REST, GraphQL, Soap...</p>
<p>●	Дополнительные методы сервиса, использование готовых библиотек, фреймворков, способ запуска сервиса, документирование, наличие авто-тестов — на усмотрение исполнителя.</p>
<p>●	Решение необходимо предоставить в виде ссылки на git-репозиторий.</p>


Для чего это надо?
<p>Тестовое задание, нужно было сохранить все данные из json в таблицу, а позже сделать get запрос для показания всех этих данных в json формате.</p>
<p>Было использовано кеширование всех данных, так же дать возможность поиску по наименованию аэропорта на русском языке (airport_name_ru)</p>


<p>Конечный результат</p>
<p>Был поднят докер файл, с php 8.2, mysql 5,7, laravel 10, nginx, redis, rabbit (часа 3)</p>
<p>mysql root: admin12345678 and pass: nemo</p>
<p>После этого создал новый laravel проект с 10 версией (10 минут)</p>
<p>Был создан репозитории и залит выше указанные файлы (10 мин)</p>
<p>Был настроен pipelines в github(actions)для проверки phpcs, psalm, AutoUnitTests, Swagger valid, в целом проекта на поднятие (полтора часа)</p>
<p>Был установлен swagger, путь: {host}/api/documentation#/ (час)</p>

<p>Далее сама логика ТЗ.</p>
<p>Разместил json file, path: laravel/storage/files/airports.json (10 мин)</p>
<p>Далее была создана команда CreateAirportsFromJsonFileCommand, которая проходила по всем json, сохраняя ее в таблице airports, так же из за использование кеширования, идет очистка данного кеша для того чтобы юзер мог его увидеть (2 часа)</p>
<p>Был создан airport.php в папке routes, там расположен get запрос для получения всех аэропортов (часа 2)</p>

<p>Так же был написан тесты для добавления и получения аэропортов (AirportTest.php) (30 мин)</p>
