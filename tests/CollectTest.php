<?php

use PHPUnit\Framework\TestCase;
use Collect\Collect;

class CollectTest extends TestCase
{
    protected Collect $collection;

    protected function setUp(): void
    {
        // Создание нового экземпляра класса Collect с массивом значений
        $this->collection = new Collect([1, 2, 3, 4, 5]);
    }

    public function testKeys(): void
    {
        // Вызов метода keys() на коллекции и конвертация результата в массив
        $keys = $this->collection->keys()->toArray();

        // Ожидаемый результат: массив ключей [0, 1, 2, 3, 4]
        $expected = [0, 1, 2, 3, 4];

        // Проверка того, что фактический результат соответствует ожидаемому
        $this->assertEquals($expected, $keys);
    }

    public function testValues(): void
    {
        // Вызов метода values() на коллекции и конвертация результата в массив
        $values = $this->collection->values()->toArray();

        // Ожидаемый результат: массив значений [1, 2, 3, 4, 5]
        $expected = [1, 2, 3, 4, 5];

        // Проверка того, что фактический результат соответствует ожидаемому
        $this->assertEquals($expected, $values);
    }

    public function testGet(): void
    {
        // Получение значения по ключу (в данном случае ключ 2 со значением 3)
        $this->assertEquals(3, $this->collection->get(2));

        // Получение значения по несуществующему ключу (в данном случае ключ 5), ожидаемый результат - null
        $this->assertNull($this->collection->get(5));

        // Получение значения по несуществующему ключу с значением по умолчанию (в данном случае ключ 6 с значением по умолчанию "default")
        $defaultValue = "default";
        $this->assertEquals($defaultValue, $this->collection->get(6, $defaultValue));
    }

    public function testExcept(): void
    {
        // Создание нового экземпляра класса Collect с массивом ключей и значений
        $collection = new Collect(['a' => 1, 'b' => 2, 'c' => 3]);

        // Исключение одного ключа ('a') из коллекции
        $this->assertEquals(['b' => 2, 'c' => 3], $collection->except('a')->toArray());

        // Исключение нескольких ключей (['a', 'c']) из коллекции
        $this->assertEquals(['b' => 2], $collection->except(['a', 'c'])->toArray());
    }
}
