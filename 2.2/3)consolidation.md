# Консолидация данных и отчетность аптечной сети

## Задание:
Компания, владеющая небольшой аптечной сетью, занимается розничной продажей лекарственных препаратов. Руководство компании приняло решение о внедрении системы аналитической OLAP-отчетности, в которой его интересует информация о динамике продаж, загруженности торговых точек, самых продаваемых товарах в различных разрезах. Так как существующая учетная система испытывает нагрузки (компания постоянно расширяет свою сеть), было решено создать единый консолидированный источник – хранилище данных, которое послужит базой для OLAP-отчетности.

Предварительно программисты компании создали процедуру выгрузки данных из учетной системы в структурированные текстовые файлы (в качестве пробы сформирована «пачка» данных за несколько месяцев).

### Требуется:
* спроектировать структуру реляционного хранилища данных (ХД);
* наполнить ХД первичной информацией;
* разработать процедуры пополнения ХД и контроль непротиворечивости содержащихся в нем данных;
* предложить набор OLAP-отчетов

## Ход работы
### Загрузка таблиц в deductor studio:

![pic](pic/3.1.png)

### Создание базы данных: 

![pic](pic/3.2.png)

### Структура базы данных:

![pic](pic/3.3.png)

### Привязка таблиц из «процесса» к базе данных (к измерениям): 

![pic](pic/3.4.png)

### Гистограмма получившейся таблицы:

![pic](pic/3.5.png)

### OLAP-анализ (Куб) 

![pic](pic/3.6.png)![pic](pic/3.7.png)

На скриншоте сверху показан OLAP-анализ, исходя из которого понятно, что самый продаваемый товар – антиконгестанты.

![pic](pic/3.8.png)

На последнем скриншоте, на кросс-диаграмме представлены данные аптек, аптека 1 – красный цвет, аптека 2 – зеленый цвет и, соответственно, аптека 3 – синий цвет. Исходя из этих данных, мы видим, что самая успешная аптека №2.