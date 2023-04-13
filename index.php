<?php
class Person{
  // property declaration
  public $firstName;
  public $secondName;

  // method declaration

  public function __construct( $fn = 'Ivan', $sn = 'Ivanov') {
    $this->firstName = $fn;
    $this->secondName = $sn;
  }
  public function fullName() {
    return $this->firstName . ' ' . $this->secondName;
  }
}

class Student extends Person {
  public $schoolName;
  public $isAwarded = false;
  public function __construct($fn = 'Ivan', $sn = 'Ivanov', $schoolName = 'random school') {
    parent::__construct($fn, $sn);
    $this->schoolName = $schoolName;
  }

  function award() {
    $this->isAwarded = true;
  }

  public function fullInfo() {
    return "Студент " . $this->fullName() . ' навчається в ' . $this->schoolName . ($this->isAwarded ? ' та був нагороджений за відмінне навчання.' : '.');
  }
}

class GovernmentOfUkraine {
  public static $instance = null;

  // The constructor is private
  // to prevent initiation with outer code.
  public function __construct()  {
    // підключення до БД або інші затратні операції
  }

  public static function getInstance()  {
    if (self::$instance == null)
    {
      self::$instance = new GovernmentOfUkraine();
    }

    return self::$instance;
  }

  public function awardStudent(Student $student) {
    $student->award();
  }
}


$ukraine = new GovernmentOfUkraine();

$person1 = new Person();
$person2 = new Person('Mark', 'Hudzovskyi');
$student1 = new Student( 'Maxxxx', 'Dzyuba', 'Lyceum #100');
$student2 = new Student( 'Olya', 'Ivanova', 'Lyceum #145');
$ukraine->awardStudent($student1);

//

$studentNumbers = [
  $student1->firstName => '06731421342',
  $student2->firstName => '06631214213',
];

$kyivstarStudents = [];

foreach ($studentNumbers as $name => $number ) {
  if (substr($number, 3) === '067') {
    $kyivstarStudents[] = $name;
  }
}

//

$stringPizzas = "pizza1 pizza2 pizza3 pizza4 pizza5";
$arrayPizzas = explode(' ', $stringPizzas);
echo $arrayPizzas[3];

$page = $_GET['page'];
if($page == "news") {
  echo "Новини";
  //Можете сразу выводить html, или же делать редирект на другую страницу
} else {
  echo "Сторінки не існує";
}

?>

<div style="align-content: center">
  <h1>Lab4</h1>
  <p><?php echo $person1->fullName(); ?></p>
  <p><?php echo $person2->fullName(); ?></p>
  <p><?php echo $student1->fullInfo(); ?></p>
</div>


<?php

?>
