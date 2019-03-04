<div class="post">
    <div class="details">
        <h2><a href="#">Используя только две переменные, поменяйте их значение местами</a></h2>
        <p class="info">
            <?echo $posted.' at year '.$fileyear;?><a href="/">general</a></p>

    </div>
    <div class="body">
        <p><?
            $a=2; $b=7; 
            echo '<b>a</b>='.$a.' and '.'<b>b</b>='.$b.';<br/>';
            $a+=+$b-$b=$a; /*сначала вычисляется $b ($b=$a), затем $a+= ($a+$b-новое$b)*/
            echo '$a+=+$b-$b=$a => '.'<b>a</b>='.$a.' and <b>b</b>='.$b.';<br/>';
            echo '<br/>Другие примеры:<br/>';
            $user = "GeekBrains user"; echo "Hello, $user!<br/>"; /*Т.к. в двойных кавычках переменные обрабатываются, $user заменяется её значением*//*
            echo '$a = 5 and $b = \'05\'; var_dump($a == $b); // true, потому что в этом случае числовая строка автоматически конвертируется в число;<br/>var_dump((int)\'012345\'); // равно \'12345\', потому что десятичные числа в типе данных \'integer\' выводятся без \'нуля\' вначале;<br/>var_dump((float)123.0 === (int)123.0); // false, потому что \'===\' сравнивает не только значение, но и тип данных;<br/>var_dump((int)0 === (int)\'hello, world\'); //true, потому что для числового типа данных \'hello, world\' равно \'нулю\'';*/
            
            $n=6;
            function f($n) {
                if($n==0)
                    return;
                echo $n.'<br/>';
                f($n-1);
            }
            ?>
        </p>
    </div>
    <div class="x"></div>
</div>
