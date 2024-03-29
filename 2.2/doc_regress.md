# Реализация алгоритма построения дерева решений и логистическая регрессия

## Часть 1.  Дерево решений

### Основная цель

Изучить алгоритм «Построение дерева решений» и научиться обрабатывать с его помощью данные.

### Теоретическая часть

Своевременная разработка и принятие правильного решения - это одна    из    главных    задач    работы    управленческого    персонала
организации, т.к. необдуманное решение может дорого обойтись компании. Зачастую на практике результат  одного  решения заставляет нас принимать следующее решение и т. д. Когда же нужно принять несколько решений в условиях неопределенности, когда каждое решение зависит от исхода предыдущего, то применяют схему, называемую деревом решений.

Дерево решений это графическое изображение  процесса принятия решений, в котором отражены альтернативные решения, соответствующие вероятности, и выигрыши для любых комбинаций альтернатив.

Дерево решений представляет один из способов разбиения множества данных на классы или категории. Корень дерева неявно содержит все классифицируемые данные, а листья определенные классы после выполнения классификации. Промежуточные узлы дерева представляют пункты принятия решения о выборе.

![pic](pic/doc1.png)Структура дерева решений

#### Построение дерева решений

Пусть нам задано некоторое обучающее множество $T$, содержащее объекты, каждый из которых характеризуется `m` атрибутами, причем один из них указывает на принадлежность объекта к определенному классу.

Пусть через ${C_1, C_2, ... C_k}$ обозначены классы, тогда существуют 3 ситуации:

* множество $T$ содержит один или более примеров, относящихся к одному классу $C_k$. Тогда дерево решений для $Т$ – это лист, определяющий класс $C_k$ ;
* множество $T$ не содержит ни одного примера, т.е. пустое множество. Тогда это снова лист, и класс, ассоциированный с листом, выбирается из другого множества отличного от $T$, скажем, из множества, ассоциированного с родителем;
* множество $T$ содержит примеры, относящиеся к разным классам. В этом случае следует разбить множество $T$ на некоторые подмножества. Для этого выбирается один из признаков, имеющий два и более отличных друг от друга значений $O_1, O_2, ... O_n$. $T$ разбивается на подмножества $T_1, T_2, ... T_n$, где каждое подмножество $T_i$ содержит все примеры, имеющие значение $O_i$ для выбранного признака. Эта процедура будет рекурсивно продолжаться до тех пор, пока конечное множество не будет состоять из  примеров, относящихся к одному и тому же классу.

Вышеописанная процедура лежит в основе многих современных алгоритмов построения дерева решений, этот метод известен еще под названием «разделение и захват». Очевидно, что при использовании данной методики построение дерева решений будет происходить сверху вниз.

#### Области применения дерева решений

Дерево решений является прекрасным инструментом в системах поддержки принятия решений, интеллектуального анализа данных (Data Mining). В областях, где высока цена ошибки, они послужат отличным подспорьем аналитика или руководителя.

Дерево решений успешно применяется для решения практических задач в следующих областях:

* Банковское дело. Оценка кредитоспособности клиентов банка при выдаче кредитов.
* Промышленность. Контроль качества продукции (выявление дефектов), испытания без разрушений (например, проверка качества сварки) и т.д.
* Медицина. Диагностика различных заболеваний.
* Молекулярная биология. Анализ строения аминокислот.
Это далеко не полный список областей, где можно использовать дерево решений, т.к. еще многие потенциальные области применения не исследованы.

### Практическая часть

Для загрузки данных примера импортируйте файл `C:\Program Files\BaseGroup\Deductor\Samples\CreditSample.txt` в АП «Deductor» с помощью мастера импорта. Все параметры импорта примите установленными по умолчанию. В окне выбора способа отображения данных выберите «Таблица», если он не выбран по умолчанию.

В результате в основном окне появится таблица, заполненная из указанного файла.

![pic](pic/doc2.png) Итог импорта данных

Запустите *мастер обработки данных*. В появившемся окне в разделе Data Mining выберете метод обработки «Дерево решений» и нажмите «Далее».

![pic](pic/doc3.png) Мастер обработки данных

На вкладке «Настройка значения столбцов» необходимо задать назначения столбцов данных. Почти все столбцы автоматически получили значение «Входные». Значение поля «Выдать кредит», которое принимает только два значения «Да» или «Нет», необходимо установить  в  «Выходное».  Также  необходимо  обозначить  столбцы «Код» и «№ паспорта» как  «Неиспользуемые» (так как значения этих столбцов уникальны, а это не позволит их классифицировать).

![pic](pic/doc4.png)Окно настройки назначений столбцов 

Далее следует окно настройки разбиения исходного множества данных на подмножества. Оставьте это окно без изменений и нажмите кнопку «Далее».

Следующий этап – настройка параметров обучения дерева решений. Необходимо учитывать, что чем  больше  значение параметра «Уровень доверия, используемый при отсечении узлов дерева», тем больше будет дерево решений в итоге.

С помощью кнопки «Пуск» запускаем процесс построения дерева решений. По окончании процесса вы увидите график, отображающий уровень распознавания данных, количество узлов созданного дерева и правил, полученных в результате обработки.

![pic](pic/doc5.png)Процесс построения дерева решений 

В последующем окне выбора способа отображения данных выберите «Дерево решений». А в последнем окне мастера обработки, по желанию, укажите имя и метку.

Результатом всех вышеописанных действий будет построенное дерево решений, которое отобразится в основном окне программы. На основании этого метода можно ответить на вопрос «Давать ли человеку кредит и если да, то при каких условиях».

![pic](pic/doc6.png)Готовое дерево решений 

Из полученного дерева можно вывести правила выдачи кредитов.
Например:
* Если срок проживания в данной местности меньше 6,5 лет, то кредит не давать.
* Если срок проживания в данной местности больше 6,5 лет, займ обеспечен, возраст больше 20,5 лет, не имеется недвижимость, но имеется банковский счет, то кредит давать.

___
    Задание на проверку:
    1.	Постройте дерево решения для описанного выше примера. Попробуйте использовать различные значения параметров обучения дерева решения и сравните полученные деревья.
    2.	Выведите 5 правил из построенного дерева решений.
    3.	Приведите 4-5 примеров, для которых можно использовать метод обработки дерево решений, реализуйте один из них.
    4.	Составьте отчет.

## Логистическая регрессия и ROC-анализ

###	Основная цель

Научиться обрабатывать данные и прогнозировать события, используя возможности логистической регрессии и ROC-анализ.

###	Теоретическая часть

*Логистическая регрессия* — метод построения линейного классификатора, позволяющий оценивать апостериорные вероятности принадлежности объектов классам.

Вообще, регрессионная модель предназначена для решения задач предсказания значения непрерывной зависимой переменной, при условии, что эта зависимая переменная может принимать значения на интервале от 0 до 1. В силу такой специфики ее часто используют для предсказания вероятности наступления некоторого события в зависимости от значений некоторого числа предикторов.

При изучении линейной регрессии мы исследуем модели вида

$$y=a+b_1x_1 +b_2x_2+...+b_nx_n.$$

Здесь зависимая переменная y является непрерывной, и мы определяем набор независимых переменных $x_i$ и коэффициенты при них $b_i$, которые позволили бы нам предсказывать среднее значение y с учетом наблюдаемой ее изменчивости.

Во многих ситуациях, однако, $y$ не является непрерывной величиной, а принимает всего два возможных значения. Обычно единицей в этом случае представляют осуществление какого-либо события (успех), а нулем - отсутствие его реализации (неуспех).

Среднее значение $y$ - обозначенное через $p$, есть доля случаев, в которых $y$ принимает значение 1. Математически это можно записать как $p = P(y = 1)$ или $p = P("Успех")$.

*ROC-кривая или кривая ошибок* - показывает зависимость количества верно классифицированных положительных объектов (по оси y) от количества неверно классифицированных отрицательных объектов (по оси x).

В терминологии ROC - анализа первые называются истинно положительным, вторые – ложно отрицательным множеством. При этом   предполагается, что у классификатора имеется   некоторый параметр, варьируя который, мы будем получать то или иное разбиение на два класса. Этот параметр часто называют порогом, или точкой отсечения. В зависимости от него будут получаться различные величины ошибок $I$ и $II$ рода.

В логистической регрессии порог отсечения изменяется от 0 до 1
–	это и есть расчетное значение уравнения регрессии. Будем называть его рейтингом.

Введём ещё несколько определений:
* *TP (True Positives)* – верно классифицированные положительные примеры (так называемые истинно положительные случаи);
* *TN (True Negatives)* – верно классифицированные отрицательные примеры (истинно отрицательные случаи);
* *FN (False Negatives)* – положительные примеры, классифицированные как отрицательные (ошибка $I$ рода). Это так называемый «ложный пропуск» – когда интересующее нас событие ошибочно не обнаруживается (ложно отрицательные примеры);
* *FP (False Positives)* – отрицательные примеры, классифицированные как положительные (ошибка $II$ рода). Это ложное обнаружение, т.к. при отсутствии события ошибочно выносится решение о его присутствии (ложно положительные случаи).

Что является положительным событием, а что – отрицательным, зависит от конкретной задачи. Например, если мы прогнозируем вероятность наличия заболевания, то положительным исходом будет класс «Больной пациент», отрицательным – «Здоровый пациент». И наоборот, если мы хотим определить вероятность того, что человек здоров, то положительным исходом будет класс «Здоровый пациент», и так далее.

При анализе чаще оперируют не абсолютными показателями, а относительными – долями, выраженными в процентах:

Доля истинно положительных примеров *(True Positives Rate)*:

$$TPR=\frac {TP}{TP+FN}*100\% $$

Доля ложно положительных примеров *(False Positives Rate)*:

$$ FPR= \frac {TP}{TN+FP}*100\%$$

Введем еще два определения: чувствительность и специфичность
модели. Ими определяется объективная ценность любого бинарного классификатора.

*Чувствительность (Sensitivity)* – доля истинно положительных случаев:

$$Se=TPR=\frac {TP}{TP+FN}*100\%$$

*Специфичность	(Specificity)*	–	доля	истинно	отрицательных
случаев, которые были правильно идентифицированы моделью:

$$Sp=\frac {TN}{TN+FP}*100\%$$

Модель  с  высокой  чувствительностью  часто  дает  истинный
результат при наличии положительного исхода (обнаруживает положительные примеры). Наоборот, модель с высокой специфичностью чаще дает истинный результат при наличии отрицательного исхода (обнаруживает отрицательные примеры).

ROC-кривая получается следующим образом:

1.	Для каждого значения порога отсечения, которое меняется от 0 до 1 с шагом $dx$ (например, 0,01), рассчитываются значения чувствительности $Se$ и специфичности $Sp$. В качестве альтернативы порогом может являться каждое последующее значение примера в выборке.
2.	Строится график зависимости: по оси y откладывается чувствительность $Se$, по оси $x – (100 \%–Sp)$ (сто процентов минус специфичность), или, что то же самое, $FPR$ – доля ложно положительных случаев.

Численный показатель площади под кривой называется $AUC$ *(Area Under Curve)*. С большими допущениями можно считать, что чем больше показатель $AUC$, тем лучшей прогностической силой обладает модель. Однако следует знать, что:

* показатель $AUC$ предназначен скорее для сравнительного анализа нескольких моделей;
* $AUC$ не содержит никакой информации о чувствительности и специфичности модели.
В литературе иногда приводится следующая экспертная шкала для значений $AUC$, по которой можно судить о качестве модели:
* отличное качество модели – интервал $AUC$ 0,9-1,0;
* очень хорошее качество модели – интервал $AUC$ 0,8-0,9;
* хорошее качество модели – интервал $AUC$ 0,7-0,8;
* среднее качество модели – интервал $AUC$ 0,6-0,7;
* неудовлетворительное качество модели – интервал $AUC$ 0,5-0,6.

Идеальная модель обладает 100 % чувствительностью и специфичностью. Однако на практике добиться этого невозможно, более того, невозможно одновременно повысить и чувствительность, и специфичность модели. Компромисс находится с помощью порога отсечения, т.к. пороговое значение влияет на соотношение $Se$ и $Sp$. Можно говорить о задаче нахождения оптимального  порога отсечения.

### Практическая часть

Используя мастер импорта и файл с данными, например, `C:\ProgramFiles\BaseGroup\Deductor\Samples\CreditSample.txt`,
создайте новый сценарий и импортируйте данные.

В *мастере	обработки* выберите	способ обработки «Логистическая регрессия».

![pic](pic/doc7.png)Выбор метода «Логистическая регрессия» 

Прежде чем начнется обработка данных, необходимо провести нормализацию полей и настроить обучающую выборку.

*Нормализация полей* проводится с цель преобразования данных к виду, подходящему для обработки средствами АП «Deductor». Например, при построении нейронной сети, линейной модели прогнозирования или самоорганизующихся карт «Входящие» данные должны иметь числовой тип (т.е. непрерывный характер), а их значения должны быть распределены в определенном диапазоне. В этом случае при нормализации дискретные данные преобразуются в набор непрерывных значений.

Настройка нормализации полей вызывается с помощью кнопки
«Настройка нормализации» в нижней левой части окна «Настройка назначения столбцов».

![pic](pic/doc8.png)Вызов окна настройки нормализации

В окне «Настройка нормализации данных» слева приведен полный список входных и выходных полей. При этом каждое поле помечено значком, обозначающим вид нормализации:

* линейная - линейная нормализация исходных значений;
* уникальные значения - преобразование уникальных значений в их индексы;
* битовая маска - преобразование дискретных значений в битовую маску.

В правой части окна для выделенного поля отображаются параметры нормализации.

![pic](pic/doc9.png)Окно настройки нормализации данных

Для *числовых (непрерывных)* полей с линейной нормализацией дополнительные  параметры  недоступны.  В  полях  «Минимум»  и
«Максимум»	секции	«Диапазон	значений»	можно	посмотреть минимальное и максимальное значения этого поля.

Для *дискретных полей* могут быть использованы два вида нормализации - уникальные значения и битовая маска.

Если дискретные значения преобразуются в битовую маску (т.е. каждому уникальному значению ставится в соответствие уникальная битовая комбинация), то возможны два способа такого преобразования, выбираемые из списка «Способ кодирования»:

1.	Позиция бита - поле в этом случае представляется в виде $n$ битов, где $n$ - число уникальных значений в поле. Каждый бит соответствует одному значению. В 1 устанавливается только бит, соответствующий текущему значению, принимаемому полем, все остальные биты равны 0. Этот способ кодирования используется при малом числе уникальных значений.
2.	Комбинация битов - каждому уникальному значению соответствует своя комбинация битов в двоичном виде.

*Настройка обучающей выборки* - разбиение обучающей выборки на два множества - обучающее и тестовое - для построения линейной модели.

![pic](pic/doc10.png)Пример настройки обучающей выборки 

*Обучающее множество* - включает записи, которые будут использоваться в качестве входных данных, а также соответствующие желаемые выходные значения.

*Тестовое множество* - также включает записи, содержащие входные и желаемые выходные значения, но используемое не для обучения модели, а для проверки его результатов.

*Примечание*. Oбучение может с большой долей вероятности считаться успешным, если процент распознанных примеров на обучающем и тестовом множествах достаточно велик.

*Следующий этап* – настройка параметров остановки обучения, которая включает определение максимального числа итераций (заданная точность), задание функции правдоподобия, порога отсечения и допустимость ошибки.

![pic](pic/doc11.png)Настройка параметров остановки обучения

Итогом проведения регрессионного анализа будет построенная ROC-кривая.

___
    Задание на проверку:
    1.	С помощью мастера импорта откройте файл (например, `C:\ProgramFiles\BaseGroup\Deductor\Samples\ CreditSample.txt)`.
    2.	В мастере обработки выберите «Логистическая регрессия».
    3.	Проведите настройку нормализации полей.
    4.	Настройте обучающую выборку.
    5.	Проанализируйте полученные данные.
    6.	Создайте отчет.























