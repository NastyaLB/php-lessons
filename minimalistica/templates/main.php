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
		<?
            foreach ($titles['1']['inpages'] as $arkey => $arvalue) {
                require($arvalue);
            }
        ?>		
</div>