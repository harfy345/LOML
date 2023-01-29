
let initialiser = (message) =>{

    let textToast = document.getElementById("textToast");
    let toastElList = [].slice.call(document.querySelectorAll('.toast'))
    let toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    if(message.length > 0){
        textToast.innerHTML = message;
        toastList[0].show();
    }
}