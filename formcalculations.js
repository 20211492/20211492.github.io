
 var menu_prices = {
    "아이스 아메리카노": 2200,
    "바닐라 라떼": 4600,
    "레몬에이드": 5800,
    "아이스 티": 2500
};
 
 
var flavor_prices = {
    "None": 0,
    "cheese": 5600,
    "Chocolate": 6000,
    "basic": 5600,
    "Tiramisu": 6300
};
 
	 
function getMenuPrice() {
    var menuPrice = 0;
    var theForm = document.forms["cafemenu"];
    var selectedMenu = theForm.elements["selectedmenu"];
    for (var i = 0; i < selectedMenu.length; i++) {
        if (selectedMenu[i].checked) {
            menuPrice = menu_prices[selectedMenu[i].value];
            break;
        }
    }
    return menuPrice;
}

function getFlavorPrice() { 
    var cakeFlavorPrice = 0;
    var theForm = document.forms["cafemenu"]; 
    var selectedFlavor = theForm.elements["flavor"];
    
    cakeFlavorPrice = flavor_prices[selectedFlavor.value];

    return cakeFlavorPrice;
}

function showOrderConfirmation() {
    var theForm = document.forms["cafemenu"];
    var name = theForm.elements["name"].value;
    var address = theForm.elements["address"].value;
    var phoneNumber = theForm.elements["phonenumber"].value;
    var selectedMenu = '';
    var selectedFlavor = '';

    var selectedMenuElements = theForm.elements["selectedmenu"];
    for (var i = 0; i < selectedMenuElements.length; i++) {
        if (selectedMenuElements[i].checked) {
            selectedMenu = selectedMenuElements[i].value;
            break;
        }
    }
    var selectedFlavorElement = theForm.elements["flavor"];
    selectedFlavor = selectedFlavorElement.options[selectedFlavorElement.selectedIndex].text;

    var orderDetails = "<br/><strong>주문 내역:</strong><br/>" +
                    "음료: " + selectedMenu + "<br/>" +
                    "조각 케이크: " + selectedFlavor + "<br/>" +
                    "주문자명: " + name + "<br/>" +
                    "배송지: " + address + "<br/>" +
                    "휴대폰 번호: " + phoneNumber + "<br/>";

    var totalPrice = getMenuPrice() + getFlavorPrice(); 
    orderDetails += "총 가격: " + totalPrice + "원<br/>"; 

    var orderConfirmationDiv = document.getElementById('orderConfirmation');
    orderConfirmationDiv.style.display = 'block';
    orderConfirmationDiv.innerHTML = orderDetails + "<br/>주문 완료되었습니다.";
}

        
function calculateTotal() {
    var totalPrice = getMenuPrice() + getFlavorPrice();
    var divobj = document.getElementById('totalPrice');
    divobj.style.display = 'block';
    divobj.innerHTML = "총 가격: " + totalPrice + "원";
    showOrderConfirmation();
}

function hideTotal()
{
    var divobj = document.getElementById('totalPrice');
    divobj.style.display='none';
}