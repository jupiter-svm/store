/**
 * Функция добавления товара в корзину
 * 
 * @param {type} itemId - идентификатор товара
 * @returns {undefined}
 */
function addToCart(itemId) {
    console.log("js - addToCart()");
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/addtocart/"+itemId+'/',
        dataType: 'json',
        success: function(data) {
            if(data['success']) {
                $('#cartCntItems').html('('+data['cntItems']+')');
                $('#addCart_'+itemId).hide();
                $('#removeCart_'+itemId).show(); 
            }        
        }
    });
}

/**
 * Удаление продукта из корзины
 * 
 * @param {type} itemId
 * @returns {undefined}
 */
function removeFromCart(itemId) {
    console.log("js - removeFromCart("+itemId+")");
    
    $.ajax({
       type: 'POST',
       async: false,
       url: "/cart/removefromcart/"+itemId+"/",
       dataType: 'json',
       success: function(data) {
           if(data['success']) {
               $('#cartCntItems').html('('+data['cntItems']+')');
               $('#addCart_'+itemId).show();
               $('#removeCart_'+itemId).hide();
           }
       }
    });
}

/**
 * Функция подсчёта купленного товара
 * 
 * @param {type} itemId
 * @returns {undefined}
 */
function conversionPrice(itemId) {
    var newCnt=$('#itemCnt_'+itemId).val();
    var itemPrice=$('#itemPrice_'+itemId).attr('value');
    var itemRealPrice=newCnt*itemPrice;

    $('#itemRealPrice_'+itemId).html(itemRealPrice);
}

/**
 * Получение данных с форм
 * 
 * @returns {undefined}
 */
function getData(obj_form) {
    var hData={};
    
    $('input, textarea, select', obj_form).each(function() {
        if(this.name && this.name!='') {
            hData[this.name]=this.value;
            console.log('hData['+this.name+']='+hData[this.name]);
        }
    });
    
    return hData;
}

/**
 * Функция регистрации нового пользователя
 * 
 * @returns {undefined}
 */
function registerNewUser() {
    var postData=getData('#registerBox');
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/register/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if(data['success']) {
                alert('Регистрация прошла успешно');
                
                //>Блок в левом столбце
                $('#registerBox').hide();
                
                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                //<
                
                //>Страница заказа
                $('#loginBox').hide();
                $('#btnSaveOrder').show();
                //<
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Логин пользователя
 * 
 * @returns {undefined} * 
 */
function login() {
    var email=$('#loginEmail').val();
    var pwd=$('#loginPwd').val();
    
    var postData="email="+email+"&pwd="+pwd;
    
    $.ajax({
       type: 'POST',
       async: false,
       url: "/user/login/",
       data: postData,
       dataType: 'json',
       success: function(data) {
           if(data['success']) {
               $('#registerBox').hide();
               $('#loginBox').hide();

               $('#userLink').attr('href', '/user/');
               $('#userLink').html('<i class="icon-user"></i>&nbsp;'+data['displayName']);
               $('#userBox').show();
               
               //>Заполняем поля на странице заказа
               $('#name').val(data['name']);
               $('#phone').val(data['phone']);
               $('#address').val(data['address']);
               //<
               
               $('#btnSaveOrder').show();  
               
               //Показываю ссылку на админку
               if(data['role']==1) {
                   $('#admLink').html('<a href="/admin/">Админка</a>');
               }
           } else {
               alert(data['message']);
           }
       } 
    });
}

/**
 * Показывать или прятать форму регистрации
 * 
 * @returns {undefined}
 */
function showRegisterBox() {
    if($("#registerBoxHidden").css('display')!='block') {
        $("#registerBoxHidden").show();
    } else {
        $("#registerBoxHidden").hide();
    }
}


/**
 * Функция обновления данных пользователя
 * 
 * @returns {undefined}
 */
function updateUserData() {
    console.log("js - updateUserData()");    
    
    var postData=getData('#userProfTable');    
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/update/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if(data['success']) {
                $('#userLink').html(data['userName']);
                alert(data['message']);
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Сохранение заказа
 * 
 * @returns {undefined}
 */
function saveOrder() {
    var postData=getData('form');
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/saveorder/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if(data['success']) {
                alert(data['message']);
                document.location='/';
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Показать или спрятать данные о заказе
 * 
 * @param {type} id
 * @returns {undefined}
 */
function showProducts(id) {
    var objName="#purchaseForOrderId_"+id; 
    
    if($(objName).css('display')!='table-row') {
        $(objName).show();
    } else {
        $(objName).hide();
    }
}