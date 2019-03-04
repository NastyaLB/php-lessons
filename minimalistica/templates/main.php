<div class="post">
			<div class="details">
				<h2><a href="#">№7:Написать функцию для грамматически верного вывода времени</a></h2>
				<p class="info"><?echo $posted.' at year '.$fileyear;?><a href="index.php?page=general">general</a></p>
			
			</div>
			<div class="body">
				<p>Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:</p>
				<ul>
                    <li>22 часа 15 минут</li>
                    <li>21 час 43 минуты</li>
				</ul>
				<p>
				    <?
                        /*echo date('G:i').'<br/';*/
                        function declen() {
                            $Hours=(int)(date('G',time()));
                            $Minutes=(int)(date('i',time()));
                                $h10=$Hours%10;
                                if ($Hours == 1 || $Hours==21) {    
                                    $hname = "$Hours час";
                                }
                                elseif ($Hours == 2 || $Hours == 3 || $Hours == 4 || $Hours == 22 || $Hours == 23 || $Hours == 24) {
                                    $hname = "$Hours часа";
                                }
                                elseif ($Hours==0) {
                                    $hname = "0 часов";
                                }
                                else {  $hname = "$Hours часов";    }
                            
                                $m10=$Minutes%10;
                                if($m10 ==1 && $Minutes<>11) {
                                    $mname= "$Minutes минута";
                                }
                                elseif ($m10==2 || $m10==3 || $m10==4 && $Minutes<>12 && $Minutes<>13 && $Minutes<>14) {
                                    $mname= "$Minutes минуты";
                                }
                                elseif ($m10==0 && $Minutes<9) {
                                    $mname= "0 минут";
                                }
                                else {  $mname= "$Minutes минут";   }
                          
                            return $hname.' '.$mname;
                        }
                        echo '<br/>Текущее время: '.declen();
                    ?>
				</p>
			</div>
			<div class="x"></div>
</div>
<div class="cols">	
		<div class="col">
			<h3><a href="#">№1:Объявить $a и $b, вывести их разность, произведение или сумму</a></h3>
			<p>Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:</p>
				<ul>
                    <li>если $a и $b положительные, вывести их разность;</li>
                    <li>если $а и $b отрицательные, вывести их произведение;</li>
                    <li>если $а и $b разных знаков, вывести их сумму;</li>
				</ul>
            <p>
                <? 
                    function speCalc($a,$b) {
                        if ($a>=0 && $b>=0) 
                            echo "\$a=$a и \$b=$b положительные, их разность = ".$x=$a-$b.'<br/>';
                        else if ($a<0 && $b<0) 
                            echo "\$a=$a и \$b=$b отрицательные, их произведение = ".$x=$a*$b.'<br/>';
                        else 
                            echo "\$a=$a и \$b=$b разных знаков, их сумма = ".$x=$a+$b.'<br/>';
                    }
                    echo '<br/>';
                    speCalc(8,5);
                    speCalc(-2,-10);
                    speCalc(7,-3);
                ?>
            </p>
			<p>&not; <a href="index.php?page=general">read more</a></p>
		</div>
		<div class="col">
			<h3><a href="#">№2:С помощью switch организовать вывод $а до 15. Return обязателен</a></h3>
			<p>Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.</p>
			<p>
                <?
			    $a=6;
                echo "\$a=$a<br/>";
                switch ($a){
                    case 0: echo $a++.', ';
                    case 1: echo $a++.', ';
                    case 2: echo $a++.', ';
                    case 3: echo $a++.', ';
                    case 4: echo $a++.', ';
                    case 5: echo $a++.', ';
                    case 6: echo $a++.', ';
                    case 7: echo $a++.', ';
                    case 8: echo $a++.', ';
                    case 9: echo $a++.', ';
                    case 10: echo $a++.', ';
                    case 11: echo $a++.', ';
                    case 12: echo $a++.', ';
                    case 13: echo $a++.', ';
                    case 14: echo $a++.', ';
                    default: echo $a++.'<br/>'; 
                            break;
                }
                ?>
			</p>
			<p>&not; <a href="index.php?page=general">read more</a></p>
		</div>
		<div class="col last">
			<h3><a href="#">№3:4 основные арифметические операции в виде функций</a></h3>
			<p>Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.</p>
			<p>
			<? 
                function basicSum($x,$y){
                    return $x+$y;
                    } 
                function basicSub($x,$y){
                    return $x-$y;
                    } 
                function basicMult($x,$y){
                    return $x*$y;
                    } 
                function basicDeg($x,$y){
                    if($y<>0) { return $x/$y;}
                        return 'На ноль делить нельзя';
                    } ;
                echo 'basicSum(2,5)='.basicSum(2,5).'<br/>'.'basicSub(2,5)='.basicSub(2,5).'<br/>'.'basicMult(2,5)='.basicMult(2,5).'<br/>'.'basicDeg(2,5)='.basicDeg(2,5).'<br/>';
                
                ?>
            </p>
			<p>&not; <a href="index.php?page=general">read more</a></p>
		</div>	
		<div class="col">
			<h3><a href="#">№4:Сделать функцию с использованием switch и функции из №3.</a></h3>
			<p>Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).</p>
			<p>
			    <?
                    function mathOperation($arg1, $arg2, $operation) {
                        switch($operation) {
                            case Sum: return basicSum($arg1,$arg2); break;
                            case Sub: return basicSub($arg1,$arg2); break;
                            case Mult: return basicMult($arg1,$arg2); break;
                            case Deg: return basicDeg($arg1,$arg2); break;
                            default: return 'Неверное название операции: Сложение=Sum, Вычитание=Sub, Умножение=Mult, Деление=Deg'; break;
                        }
                    }
                    echo 'Числа 3 и 5, сумма = '.mathOperation(3, 5, Sum).' <br/> Числа 7 и 2, разность = '.mathOperation(7, 2, Sub).' <br/> Числа 4 и 2.5, произведение = '.mathOperation(4, 2.5, Mult).' <br/> Числа 3 и 3, деление = '.mathOperation(3, 3, Deg).' <br/> Числа 1 и 1, операция не задана - '.mathOperation(1, 1, ' ').' <br/> Числа 0 и 0, операция деление - '.mathOperation(0, 0, Deg).'<br/>';
                ?>
			</p>
			<p>&not; <a href="index.php?page=general">read more</a></p>
		</div>
		<div class="col">
			<h3><a href="#">№5:Использовать встроенную функцию для вывода года в подвале шаблона</a></h3>
			<p>Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.</p>
			<p>
			    <?
                    $Year=date('Y');
                ?>
			</p>
			<p>&not; <a href="index.php?page=general">read more</a></p>
		</div>
		<div class="col last">
			<h3><a href="#">№6:использовать рекурсию для возведения числа в степень</a></h3>
			<p>С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.</p>
			<p>
			    <?
                    function power($val, $pow) {
                        if($pow>1) {
                            return $val=$val*power($val, $pow-1);
                        }
                        else return $val;
                    }
                echo '5 в 3-ей степени = '.power(5,3).', 2 в 4-ой степени = '.power(2,4).', 4 в 3-ей степени = '.power(4,3).', 6 в 2-ой степени = '.power(6,2);
                ?>
			</p>
			<p>&not; <a href="index.php?page=general">read more</a></p>
		</div>		
</div>