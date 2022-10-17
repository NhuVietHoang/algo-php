# OOP IN PHP
* người thực hiện: Nhữ Việt Hoàng.
* Dowload và run code tại đường dẫn: https://github.com/NhuVietHoang/algo-php.

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
## cấu trúc:
 - Phần thực hành tạo repo algo-php với cấu trúc thư mục tham khảo:
   - Question.php
   - Collection.php
   - QuestionsList.php extent Collection
   - test.php/index.php
 - Question.php có các thuộc tính sau: câu số mấy (number), tiêu đề (title), nội dung câu hỏi (content), câu trả lời. 
 - Trong QuestionsList.php phải có hàm parse($path) để đọc file questions.md, hàm all() để trả về danh sách các Question parse được từ file md
 - QuestionList extend Collection (có các hàm all(), filter(), first(), last(), map(), pluck(), push(), add(), sortBy())

## Question.php
class question sẽ lưu câu hỏi có các thuộc tính Number ,title,content,answer
```php
namespace  module;
class Question{
	public $number;
	public $title;
	public $content;
    public  $answer;
    public  function __construct($number,$title,$content,$answer){
		$this->number = $number;
		$this->title = $title;
        $this->content = $content;
        $this->answer = $answer;
    }
}

```
## QuestionList.php kế thừa từ Collection 
class QuestionList sẽ đọc và lưu câu hỏi file question.md 
```php
    namespace module;

class QuestionsList extends Collection{
    public  function parse($path)
    {
        $contents = file_get_contents($path);
        $arrayQuestions = explode("######",$contents);
        array_shift($arrayQuestions);
        foreach ($arrayQuestions as $questions)
        {
              [$question,$answer]  = explode("####",$questions);
			  [$titles,$content]   = explode('?',$question);
			  [$number,$title]     = explode('.',$titles);
               $this->listsQuestion[] = new Question($number,$title,$content,$answer);
        }
        return $this;
    }
}

```
kết quả trả về
```php
   array(156) {
  [0]=>
  object(module\Question)#2 (4) {
    ["number"]=>
    string(6) "số n"
    ["title"]=>
    string(13) "toán lớp 1"
    ["content"]=>
    string(5) "1+1=?"
    ["answer"]=>
    string(1) "2"
  }
  [1]=>
  object(module\Question)#4 (4) {
    ["number"]=>
    string(2) " 1"
    ["title"]=>
    string(15) " Output là gì"
    ["content"]=>
    string(335) "

```javascript
function sayHi() {
  console.log(name);
  console.log(age);
  var name = "Lydia";
  let age = 21;
}

sayHi();
```

- A: `Lydia` và `undefined`
- B: `Lydia` và `ReferenceError`
- C: `ReferenceError` và `21`
- D: `undefined` và `ReferenceError`

Đáp án


---

```


