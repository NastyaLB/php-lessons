window.onload=function(){
    document.querySelector('a.spinnerblock').onclick = function(){
        var doc=document,
            spinnerblock=doc.getElementsByClassName('spinnerblock'),
            hideGallery=doc.getElementsByClassName('hideGallery');
        
        if(hideGallery.length>1){
            for(var i=0;i<1;i++){
                console.log(hideGallery[i]);
                hideGallery[i].setAttribute('class','mainGallery');
            }
        } else {
            if(hideGallery.length===1) {
                hideGallery[0].parentNode.replaceChild(hideGallery[0],spinnerblock[0].parentNode);
                hideGallery[0].setAttribute('class','mainGallery');
            } 
        }
        
        return false;
    };
};
/*
if(itemHide.length>5) {
            for(var i=0;i<5;i++) {                
                //console.log(itemHide[i]);                
                console.log(i+" = первое условие");
                itemHide[i].setAttribute('class','item');
                //console.log(itemHide.length);
            }
        } else {
            if(itemHide.length<=5) {
                for(var i=0;i<lengTH;i++) {
                    console.log(itemHide[i]);
                    console.log(i+" = второе условие");
                    itemHide[i].setAttribute('class','item');
                    //console.log(itemHide.length);
                }
                itemHide[lengTH].parentNode.replaceChild(itemHide[lengTH],spinnerblock[0].parentNode);
                itemHide[lengTH].setAttribute('class','item');
            } else {
                itemHide[0].parentNode.replaceChild(itemHide[0],spinnerblock[0].parentNode);
                itemHide[0].setAttribute('class','item');
            } 
        }
        */