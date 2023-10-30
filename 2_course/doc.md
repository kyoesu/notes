# Расширенные возможности запросов LINQ.

LINQ (Language-Integrated Query) представляет простой и удобный язык запросов к источнику данных. В качестве источника данных может выступать объект, реализующий интерфейс IEnumerable (например, стандартные коллекции, массивы), набор данных DataSet, документ XML. Но вне зависимости от типа источника LINQ позволяет применить ко всем один и тот же подход для выборки данных.

## Выборка сложных объектов

Допустим, у нас есть класс пользователя:

    class User
    {
        public string Name { get;set; }
        public int Age { get; set; }
        public List<string> Languages { get; set; }
        public User()
        {
            Languages = new List<string>();
        }
    }

Создадим набор пользователей и выберем из них тех, которым больше 25 лет:

    List<User> users = new List<User>
    {
        new User {Name="Том", Age=23, Languages = new List<string> {"английский", "немецкий" }},
        new User {Name="Боб", Age=27, Languages = new List<string> {"английский", "французский" }},
        new User {Name="Джон", Age=29, Languages = new List<string> {"английский", "испанский" }},
        new User {Name="Элис", Age=24, Languages = new List<string> {"испанский", "немецкий" }}
    };


    var selectedUsers = from user in users
                        where user.Age > 25
                        select user;
    foreach (User user in selectedUsers)
        Console.WriteLine("{0} - {1}", user.Name, user.Age);

Консольный вывод:

    Боб - 27
    Джон - 29

Сложные фильтры
Теперь рассмотрим более сложные фильтры. Например, в классе пользователя есть список языков, которыми владеет пользователь. Что если нам надо отфильтровать пользователей по языку:

var selectedUsers = from user in users
                    from lang in user.Languages
                    where user.Age < 28
                    where lang == "английский"
                    select user;
 Результат:
Том - 23
Боб - 27
Проекция
Проекция позволяет спроектировать из текущего типа выборки какой-то другой тип. Для проекции используется оператор select. Допустим, у нас есть набор объектов следующего класса, представляющего пользователя:
class User
{
    public string Name { get;set; }
    public int Age { get; set; }
}
Но нам нужен не весь объект, а только его свойство Name:

List<User> users = new List<User>();
users.Add(new User { Name = "Sam", Age = 43 });
users.Add(new User { Name = "Tom", Age = 33 });
 
var names = from u in users select u.Name;
 
foreach (string n in names)
     Console.WriteLine(n);
 Результат выражения LINQ будет представлять набор строк, поскольку выражение select u.Name выбирают в результирующую выборку только значения свойства Name.
Аналогично можно создать объекты другого типа, в том числе анонимного:
List<User> users = new List<User>();
users.Add(new User { Name = "Sam", Age = 43 });
users.Add(new User { Name = "Tom", Age = 33 });
 
var items = from u in users 
            select new
            { 
                FirstName = u.Name, 
                DateOfBirth = DateTime.Now.Year - u.Age 
            };
 
foreach (var n in items)
    Console.WriteLine("{0} - {1}", n.FirstName, n.DateOfBirth);
Здесь оператор select создает объект анонимного типа, используя текущий объект User. И теперь результат будет содержать набор объектов данного анонимного типа, в котором определены два свойства: FirstName и DateOfBirth.
Переменые в запросах и оператор let
Иногда возникает необходимость произвести в запросах LINQ какие-то дополнительные промежуточные вычисления. Для этих целей мы можем задать в запросах свои переменные с помощью оператора let:
List<User> users = new List<User>()
{
    new User { Name = "Sam", Age = 43 },
    new User { Name = "Tom", Age = 33 }
};
 
var people = from u in users
             let name = "Mr. " + u.Name
             select new
             {
                Name = name,
                Age = u.Age
             };
В данном случае создается переменная name, значение которой равно "Mr. " + u.Name.
Возможность определения переменных наверное одно из главных преимуществ операторов LINQ по сравнению с методами расширения.
Выборка из нескольких источников
В LINQ можно выбирать объекты не только из одного, но и из большего количества источников:
Например, возьмем классы:
class Phone
{
    public string Name { get; set; }
    public string Company { get; set; }
}
class User
{
    public string Name { get; set; }
    public int Age { get; set; }
}



Создадим два разных источника данных и произведем выборку:

List<User> users = new List<User>()
{
    new User { Name = "Sam", Age = 43 },
    new User { Name = "Tom", Age = 33 }
};
List<Phone> phones = new List<Phone>()
{
    new Phone {Name="Lumia 630", Company="Microsoft" },
    new Phone {Name="iPhone 6", Company="Apple"},
};
 
var people = from user in users
             from phone in phones
             select new { Name = user.Name, Phone = phone.Name };
 
foreach (var p in people)
    Console.WriteLine("{0} - {1}", p.Name, p.Phone);
 Консольный вывод:
Sam - Lumia 630
Sam - iPhone 6
Tom - Lumia 630
Tom - iPhone 6
Таким образом, при выборке из двух источников каждый элемент из первого источника будет сопоставляться с каждым элементом из второго источника. То есть получиться 4 пары.

Для сортировки набора данных по возрастанию используется оператор orderby:
int[] numbers = { 3, 12, 4, 10, 34, 20, 55, -66, 77, 88, 4 };
var orderedNumbers = from i in numbers
                     orderby i
                     select i;
foreach (int i in orderedNumbers)
    Console.WriteLine(i);
 Оператор orderby принимает критерий сортировки. В данном случае в качестве критерия выступает само число.
Возьмем посложнее пример. Допустим, надо отсортировать выборку сложных объектов. Тогда в качестве критерия мы можем указать свойство класса объекта:
List<User> users = new List<User>()
{
    new User { Name = "Tom", Age = 33 },
    new User { Name = "Bob", Age = 30 },
    new User { Name = "Tom", Age = 21 },
    new User { Name = "Sam", Age = 43 }
};
 
var sortedUsers = from u in users
                  orderby u.Name
                  select u;
 
foreach (User u in sortedUsers)
    Console.WriteLine(u.Name);
По умолчанию оператор orderby производит сортировку по возрастанию. Однако с помощью ключевых слов ascending (сортировка по возрастанию) и descending (сортировка по убыванию) можно явным образом указать направление сортировки:
var sortedUsers = from u in users
                  orderby u.Name descending
                  select u;
 Множественные критерии сортировки
В наборах сложных объектов иногда встает ситуация, когда надо отсортировать не по одному, а сразу по нескольким полям. Для этого в запросе LINQ все критерии указываются в порядке приоритета через запятую:
List<User> users = new List<User>()
{
    new User { Name = "Tom", Age = 33 },
    new User { Name = "Bob", Age = 30 },
    new User { Name = "Tom", Age = 21 },
    new User { Name = "Sam", Age = 43 }
};
var result = from user in users
             orderby user.Name, user.Age, user.Name.Length
             select user;
foreach (User u in result)
    Console.WriteLine("{0} - {1}", u.Name, u.Age);
Результат программы:
Alice - 28
Bob - 30
Sam - 43
Tom - 21
Tom - 33


Кроме методов выборки LINQ имеет несколько методов для работы с множествами: разность, объединение и пересечение.
Разность множеств
С помощью метода Except можно получить разность двух множеств:

string[] soft = { "Microsoft", "Google", "Apple"};
string[] hard = { "Apple", "IBM", "Samsung"};
 
// разность множеств
var result = soft.Except(hard);
 
foreach (string s in result)
    Console.WriteLine(s);
 В данном случае из массива soft убираются все элементы, которые есть в массиве hard. Результатом операции будут два элемента:
Microsoft
Google




Пересечение множеств
Для получения пересечения множеств, то есть общих для обоих наборов элементов, применяется метод Intersect:
string[] soft = { "Microsoft", "Google", "Apple"};
string[] hard = { "Apple", "IBM", "Samsung"};
 
// пересечение множеств
var result = soft.Intersect(hard);
 
foreach (string s in result)
    Console.WriteLine(s);
 Так как оба набора имеют только один общий элемент, то соответственно только он и попадет в результирующую выборку:
Apple
Объединение множеств
Для объединения двух множеств используется метод Union. Его результатом является новый набор, в котором имеются элементы, как из одного, так и из второго множества. Повторяющиеся элементы добавляются в результат только один раз:
string[] soft = { "Microsoft", "Google", "Apple"};
string[] hard = { "Apple", "IBM", "Samsung"};
 
// объединение множеств
var result = soft.Union(hard);
 
foreach (string s in result)
    Console.WriteLine(s);
 Результатом операции будет следующий набор:
Microsoft
Google
Apple
IBM
Samsung
Если же нам нужно простое объединение двух наборов, то мы можем использовать метод Concat:
var result = soft.Concat(hard);
Те элементы, которые встречаются в обоих наборах, дублируются.
Удаление дубликатов
Для удаления дублей в наборе используется метод Distinct:
var result = soft.Concat(hard).Distinct();
Последовательное применение методов Concat и Distinct будет подобно действию метода Union.
