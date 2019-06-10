function showAdd(str,vstr)   {
    
       var itemOperand = str,
           itemId = vstr.replace(/num/gi, ''),
           trId = itemId+'tr',
           tdId = itemId+'sum',
           tdMoney = document.getElementById(vstr).parentNode.nextSibling,
           Money = Number(document.getElementById(vstr).parentNode.nextSibling.innerHTML.replace(/ руб./gi, '')),
           ttlCostTd = document.getElementById("totalSum"),
           ttlCost = Number(document.getElementById("totalSum").innerHTML.replace(/Итого: /gi,'').replace(/ руб./gi,'')),
           idCost = Number(document.getElementById(vstr).parentNode.previousSibling.innerHTML.replace(/ руб./gi, ''));

       $.ajax({
           type: "POST",
           url: "m/addToCart.php",   
           data: {itemOperand: itemOperand, itemId: itemId},                                       
           success: function(msg)   {
               var newIdCost = msg * idCost,
                   newMoney = newIdCost - Money,
                   newTotal = 'Итого: ' + Number(ttlCost + newMoney) + ' руб.';
               
               $("#basketCount").html('!').show();
               
               if( msg == 'delete' ) {
                   $('#'+trId).remove();
                   $('#totalSum').html('Итого: ' + (ttlCost - idCost) + ' руб.').show();
               }
               else {
                   $('#'+vstr).html(msg).show();
                   $('#'+tdId).html(newIdCost+' руб.').show();
                   $('#totalSum').html(newTotal).show();
               }
           },
           error: function () {
               console.log('error');
               alert('error');
        }   
    });
};