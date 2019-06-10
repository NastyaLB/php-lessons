function chngStatus(str,vstr)   {
    
       var iDem = str.replace(/sbmt/gi, ''),
           iValue = vstr,
           itemStyle = document.getElementById(str).style;
    
    console.log(iDem);
    console.log(iValue);
    
    
    $.ajax({
           type: "POST",
           url: "m/chgStats.php",   
           data: {iDem: iDem, iValue: iValue},                                       
           success: function(msg)   {
               itemStyle.background='red';
               itemStyle.color='white';
           },
           error: function () {
               console.log('error');
               alert('error');
        }   
    });
    
};

function chngGood(itID, itName, itPrice, itChar, itFiles)   {
    
       var itID = itID,
           itName = itName,
           itPrice = Number(itPrice),
           itChar = itChar;
    
    
    //console.log(itID+'=Айди'); console.log(itName+'=Название'); console.log(itPrice+'=Цена/'+typeof(itPrice)); console.log(itChar+'=Описание'); 
    if(itFiles != undefined) {
        var itFiles = itFiles[0]
        //console.log(itFiles+'=файл');
    }
    
    
    if(isNaN(itPrice)) {
        alert('Введите цену цифрами');
    } else {
        
        if(itID === 'newsbmt') {
            if (itName === '' || itPrice  === '' || itChar === '' || itFiles === undefined)
                alert('Требуются все данные:\nимя товара, цена, описание и фото!');
            else {
                chngGoodProcess(itID, itName, itPrice, itChar, itFiles); 
                
            }
        } else {
            console.log('Не новый товар');
            chngGoodProcess(itID, itName, itPrice, itChar, itFiles);
        }
        
    } 
};


// ОТПРАВКА ДАННЫХ НА СЕРВЕР, ПОЛУЧЕНИЕ ID
function chngGoodProcess(itID, itName, itPrice, itChar, itFiles) {
    
    $.ajax({
        type: "POST",
        url: "m/chgGoods.php", 
        data: {itID: itID, itName: itName, itPrice: itPrice, itChar: itChar},  
        
        success: function(msg)   {
            if(itID === 'newsbmt') {
                createGoodLine(msg, itName, itPrice, itChar);
                fileUPchange(itFiles,msg);
            }
            console.log(msg+'=ID chanGEDgood');
        },
        error: function () {
            alert('Не удалось загрузить');
        }   
    });
};

// СОЗДАНИЕ СТРОКИ ТАБЛИЦЫ с НОВЫМ ТОВАРОМ
function createGoodLine(itID, itName, itPrice, itChar) {
    
    var elemTR = document.createElement('tr'),
        elemTD = document.createElement('td'),
        elemForm = document.createElement('form'),
        elemInputName = document.createElement('input'),
        elemInputPrice = document.createElement('input'),
        elemInputChar = document.createElement('input'),
        elemInputIMG = document.createElement('input'),
        elemAhref = document.createElement('a'),
        elemAtext = document.createTextNode('send'),
        elemTxt1 = document.createTextNode('Новый ID: '+itID+' | название: '),
        elemTxt2 = document.createTextNode(' | Цена: '),
        elemTxt3 = document.createTextNode(' руб. '),
        elemIMG = document.createElement('img'),
        parElem = document.getElementsByClassName('stringTR')[0];
    
    elemInputName.setAttribute('type','text');
    elemInputName.setAttribute('name','good_name');
    elemInputName.setAttribute('value',itName);
    elemInputPrice.setAttribute('type','text');
    elemInputPrice.setAttribute('name','price');
    elemInputPrice.setAttribute('value',itPrice);
    elemInputChar.setAttribute('type','text');
    elemInputChar.setAttribute('name','charact');
    elemInputChar.setAttribute('value',itChar);
    elemInputIMG.setAttribute('type','file');
    elemInputIMG.setAttribute('name','ingUp');
    elemInputIMG.setAttribute('accept','image/jpeg');
    
    
    elemIMG.setAttribute('src','data/files/Plush-'+itID+'.jpg');
    elemAhref.setAttribute('href','#');
    elemAhref.setAttribute('class','newSbmt');
    elemAhref.setAttribute('id',itID+'sbmt');
    elemAhref.setAttribute('onclick',itID+'chngGood(this.id, this.previousElementSibling.value, this.previousElementSibling.previousElementSibling.value, this.nextElementSibling.value);return false;');
    elemAhref.appendChild(elemAtext);
    //console.log(elemInputName); console.log(elemInputPrice); console.log(elemInputChar); console.log(elemAhref);   
    
    
    elemForm.appendChild(elemIMG);
    elemForm.appendChild(elemTxt1);
    elemForm.appendChild(elemInputName );
    elemForm.appendChild(elemTxt2);
    elemForm.appendChild(elemInputPrice);
    elemForm.appendChild(elemTxt3);
    elemForm.appendChild(elemAhref);
    elemForm.appendChild(elemInputChar);
    elemForm.appendChild(elemInputIMG);
    
            
    elemTD.appendChild(elemForm);
    elemTR.appendChild(elemTD);
    console.log(elemTR);
    
    parElem.parentNode.insertBefore(elemTR,parElem);
    //console.log(parElem);
};


// ЗАГРУЗКА КАРТИНКИ
function fileUPchange(itFiles,itID) {
    var upFile = new FormData();
    
    upFile.append('photo',itFiles);
    upFile.append('photoName',itID);
    
    //for(var value of upFile.values()) console.log(value); 
    
    
    var requeSt = new XMLHttpRequest();
    requeSt.addEventListener('load', function(){
        console.log(requeSt.responseText+'=JPG name');
    });
    requeSt.open('POST','m/upImg.php');
    requeSt.send(upFile); 
    //console.log(itFiles+'=itFiles in imgFUNC');
    //console.log(itID+'=itID in imgFUNC');
}