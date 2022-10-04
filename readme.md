# OOP IN PHP
* người thực hiện: Nhữ Việt Hoàng.
* Dowload và run code tại đường dẫn: https://github.com/NhuVietHoang/algo-php
Lập trình hướng đối tượng là lập trình hỗ trợ công nghệ đối tượng (OOP) giúp tăng năng xuất và đơn giản hóa công việc xây dựng phần mềm, bảo trì phần mềm, cho phép lập trình viên tập trung vào các đối tượng giống như trong thực tế.

Có một vài ý kiến cho rằng lập trình hướng đối tượng dễ tiếp thu cho những người mới bắt đầu vì nó rất giống với thực tế nhưng bản thân tôi thì cho rằng phải nắm các phương pháp lập trình truyền thống thì lúc qua lập trình hướng đối tượng sẽ rất dễ.

# Từ Khóa
* SOLID
đơn giản nó nói về 5 quy tắc 
1. Single responsibility principle
mỗi class chỉ nên mang 1 chức năng.

2. Open/closed principle
có thể thoai mái mở rộng 1 class bằng cách kế thừa nhưng không được sửa đổi bên trong class đó.

3. Liskov Substitution Principle
Trong một chương trình, các object của class con có thể thay thế class cha mà không làm thay đổi tính đúng đắn của chương trình

4. Interface Segregation Principle
nên dùng nhiều internface với nhiều mục đích cụ thể hơn là dùng 1 interface với nhiều method.

5. Dependency inversion principle
- Các module cấp cao không nên phụ thuộc vào các modules cấp thấp. 
   Cả 2 nên phụ thuộc vào abstraction.
- Interface (abstraction) không nên phụ thuộc vào chi tiết, mà ngược lại.
( Các class giao tiếp với nhau thông qua interface, 
không phải thông qua implementation.

# Magic methods
1. __Construct
medthod này sẽ được tự động gọi khi 1 ojbject tự khởi tạo, điều đó có nghĩa là có thể chèn các parammetter và dependancies khi khởi tạo object.

```php
    public function __construct($id,$text){
        $this->id = $id;
        $this->text = $text;
    }

    $book = new book($id,$text);
```
2. __Destruct
Destruct method sẽ cho phép bạn xóa sạch bất cứ thứ gì không cần thiết một lần đối với object bị destroy. Ví dụ bạn có thể ngắt kết nối tới một dịch vụ bên ngoài hoặc database:
```php
    public function __destruct()
    {
        $this->connection->destroy();
    }

```
3. __Set
nó sẽ tự động được gọi khi ta chuyền giữ liệu này vào thuộc tính không tồn tại hoặc thuộc tính private trong đối tượng

4. __callstatic
Được kích hoạt khi ta gọi một phương thức không được phép truy cập trong phạm vi của một phương thức tĩnh.

# Thực Hành

## Question.php
class question sẽ lưu câu hỏi
```php
    namespace  module;
    class Question{
        public  $question;
        public  $answer;
        public  function __construct($question,$answer){
            $this->question = $question;
            $this->answer = $answer;
        }
    }

```
## QuestionList.php
class QuestionList sẽ đọc và lưu câu hỏi file question.md 
```php
    namespace module;

class QuestionsList{
    private  $listsQuestion = [];
    public  function __construct($listsQuestion = [])
    {
        $this->listsQuestion = $listsQuestion;
    }
    public function Test($path){
        $contents = file_get_contents($path);
        return var_dump($contents);
    }
    public  function parse($path)
    {
        $contents = file_get_contents($path);
        $arrayQuestions = explode("######",$contents);
        array_shift($arrayQuestions);
        foreach ($arrayQuestions as $questions)
        {
              [$question,$answer]  = explode("####",$questions);
               $this->listsQuestion[] = new Question($question,$answer);
        }
     
        return $this;
    }
    public function getAll()
    {
     return $this->listsQuestion;
    }
    public  function insertQuestion(Question  $question)
    {
        array_push($this->listsQuestion,$question);
        return $this;
    }

}
$itemQuestionList= new QuestionsList();


var_dump($itemQuestionList->parse('question.md')->getAll());

```
kết quả trả về
```php
    array(156) { [0]=> object(module\Question)#1 (2) { ["question"]=> string(13) "Khabanhsdasda" ["answer"]=> string(15) "Hoaádasangbanh" } [1]=> object(module\Question)#3 (2) { ["question"]=> string(333) " 1. Output là gì? ```javascript function sayHi() { console.log(name); console.log(age); var name = "Lydia"; let age = 21; } sayHi(); ``` - A: `Lydia` và `undefined` - B: `Lydia` và `ReferenceError` - C: `ReferenceError` và `21` - D: `undefined` và `ReferenceError`
Đáp án
--- " } [2]=> object(module\Question)#4 (2) { ["question"]=> string(314) " 2. Output sẽ là gì? ```javascript for (var i = 0; i < 3; i++) { setTimeout(() => console.log(i), 1); } for (let i = 0; i < 3; i++) { setTimeout(() => console.log(i), 1); } ``` - A: `0 1 2` and `0 1 2` - B: `0 1 2` and `3 3 3` - C: `3 3 3` and `0 1 2`
Đáp án
--- " } [3]=> object(module\Question)#5 (2) { ["question"]=> string(353) " 3. Output sẽ là gì? ```javascript const shape = { radius: 10, diameter() { return this.radius * 2; }, perimeter: () => 2 * Math.PI * this.radius }; shape.diameter(); shape.perimeter(); ``` - A: `20` and `62.83185307179586` - B: `20` and `NaN` - C: `20` and `63` - D: `NaN` and `63`
Đáp án
--- " } [4]=> object(module\Question)#6 (2) { ["question"]=> string(177) " 4. Output là gì? ```javascript +true; !"Lydia"; ``` - A: `1` and `false` - B: `false` and `NaN` - C: `false` and `false`
Đáp án
--- " } [5]=> object(module\Question)#7 (2) { ["question"]=> string(341) " 5. Cái nào đúng? ```javascript const bird = { size: "small" }; const mouse = { name: "Mickey", small: true }; ``` - A: `mouse.bird.size` không hợp lệ - B: `mouse[bird.size]` không hợp lệ - C: `mouse[bird["size"]]` không hợp lệ - D: Tất cả đều hợp lệ
Đáp án
--- " } [6]=> object(module\Question)#8 (2) { ["question"]=> string(263) " 6. Output là gì? ```javascript let c = { greeting: "Hey!" }; let d; d = c; c.greeting = "Hello"; console.log(d.greeting); ``` - A: `Hello` - B: `Hey` - C: `undefined` - D: `ReferenceError` - E: `TypeError`
Đáp án
--- " } [7]=> object(module\Question)#9 (2) { ["question"]=> string(312) " 7. Output là gì? ```javascript let a = 3; let b = new Number(3); let c = 3; console.log(a == b); console.log(a === b); console.log(b === c); ``` - A: `true` `false` `true` - B: `false` `false` `true` - C: `true` `false` `false` - D: `false` `true` `true`
Đáp án

```