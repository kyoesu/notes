# Лабораторная работа №1

### Задание:   Разработать таблицу фактов для некоторой фирмы. Разработать программу для генерации псевдослучайных данных таблицы с записью в текстовый файл. Провести первичный анализ полученных данных в программе Deductor Studio.

## 1.	 Описание выбранного предприятия.
Для примера мной выбран интернет магазин, продающий небольшие партии товаров. Имеется 4 вида товаров в наличии. В магазине работают 4 менеджера и товар привозят 4 поставщика.  Дата обозначается в днях целым числом. Бывают случаи возврата товара, при этом 0 обозначает, что все нормально, а 1 – возврат товара.

## 2.	Предварительные задачи для анализа
    - Эффективность менеджеров, их объемы продаж и число претензий покупателей 
    -	Тренды по продажам  - рост или спад общих продаж в зависимости от времени
    - Популярность товаров, какие товары обеспечивают максимальный обьем продаж.
    - Сумма сделок по каждому из поставщиков

## 3.	Таблица фактов. Для хранения событий магазина и последующего их анализа разработана таблица фактов следующего вида:
 
## 4.	Для генерации значений в таблице и записи их в файл была разработана программа на языке C#. Текст программы прилагается. Значения генерировались псевдослучайными числами.
``` C#
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;
namespace ConsoleApp6
{
    class Program
    {
        static void Main(string[] args)
        {
            Random rnd=new Random();
            int[] pricegoods =new int[] { 10, 20, 30, 60, 90 };
            StreamWriter sw = new StreamWriter("myfile.txt");
            sw.WriteLine("Номер Товар Сумма Менеджер Поставщик Дата Жалобы");
            for (int c=0;c<1000;c++)
            {
                int Good = rnd.Next(0, 4);
                int quantity = rnd.Next(1, 400);
                int sum = quantity*pricegoods[Good];
                int manager = rnd.Next(0, 4);
                int supplier = rnd.Next(0, 4);
                int date = c;
                int Complains = rnd.Next(0, 100) / 90;
                sw.WriteLine("{0,5} {1,5} {2,5} {3,5} {4,5} {5,5} {6,5}", c, Good, sum, manager, supplier, date, Complains);

            }
           
        }
    }
}
```

## 5.	Первичный анализ данных проводился в программе Deductor. Получено следующее
    - Диаграмма зависимости суммы сделок от вемени
 
    - Гистограмма распределения продаж по менеджерам
 
    - Статистика по полям таблицы

 

## Прдварительные выводы:
Из полученных данных можно сделать предварительный вывод по заданным вопросам.
1.	Из 4-х менеджеров больший объем продаж имеет №0,  за ним №1, хуже всего дела идут у менеджера №2(см. гистограмму)
2.	По товарам наибольшим спросом пользуется товар №3 (см. статистику)
3.	Явного тренда продаж в зависимости от времени предварительный анализ не выявил.
